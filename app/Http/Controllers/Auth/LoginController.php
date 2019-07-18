<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\CupUsuario;
use App\CupDepartamento;
use App\CupDepartamentoCupon;
use App\CupCupon;
use App\User;
use Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cupones';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        $departamentos = CupDepartamento::all();
        return view('auth.login',['departamentos'=>$departamentos]);
    }

    protected function verify(Request $request)
    {
       
        $rules = ['mathcaptcha' => 'required|mathcaptcha',
            'user_ndoc' => 'required|string',
            'departamento' => 'required|string'];

        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails())
        {
            return redirect()->route('login')->with('info','Complete los campos correctamente');
        }

        
       
        $user = null;
        $success = true;
        $negocio = false;
        $check = User::where('user_ndoc',$request->user_ndoc)->first();

            
        if($check) {
            $user = $check;
          
        } else {
            //$cupusuario = CupUsuario::where('user_ndoc',$request->user_ndoc)->first();
            $cupusuario = DB::connection('mysql2')->table('cup_usuarios')->where('user_ndoc',$request->user_ndoc)->first();
            
            $negocio=true;
            \DB::beginTransaction();
            try {
                $user = User::create([
                    "name" => $cupusuario->user_nombres,
                    "user_ndoc" => $cupusuario->user_ndoc,
                    "seg_nombre" => $cupusuario->seg_nombre
                ]);

            } catch (\Exception $exception) {
                $error = $exception->getMessage();
                dd($error);
                \DB::rollBack();
            }
        }

       
       
        if($success === true) {
           if($negocio===true){
            \DB::commit();
           }
          
            auth()->loginUsingId($user->id);
           
           // return redirect()->intended();
            //return redirect()->route('front.cupones')->withInput($request->all);
            return redirect()->route('front.cupones',['departamento'=>$request->departamento])->withInput($request->all);
        }


    }







}
