<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\CupUsuario;
use App\CupDepartamento;
use App\CupDepartamentoCupon;
use App\CupCupon;
use App\User;
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
        
        $rules = ['captcha' => 'required|captcha',
            'user_ndoc' => 'required|string',
            'departamento' => 'required|string'];

        $validator = Validator::make($request->all(), $rules);
       
        if ($validator->fails())
        {
            return redirect()->route('login')->with('info','Complete los campos correctamente');
        }

        $cupusuario = CupUsuario::where('user_ndoc',$request->user_ndoc)->first();

        $user = null;
        $success = true;

        $check = User::where('user_ndoc',$cupusuario->user_ndoc)->first();

        
        if($check) {
            $user = $check;
        } else {
            \DB::beginTransaction();
            try {
                $user = User::create([
                    "name" => $cupusuario->user_nombres,
                    "user_ndoc" => $cupusuario->user_ndoc,
                    //"email" => $cupusuario->user_email
                ]);

            } catch (\Exception $exception) {
                $success = $exception->getMessage();
                
                \DB::rollBack();
            }
        }


        if($success === true) {
            \DB::commit();
            auth()->loginUsingId($user->id);
            
            return redirect(route('front.cupones'))->withInput($request->all);
        }


    }







}
