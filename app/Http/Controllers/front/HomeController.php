<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\CupUsuario;
use App\CupDepartamento;
use App\CupDepartamentoCupon;
use App\CupCupon;
class HomeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = CupDepartamento::all();
        return view('front.home.index',['departamentos'=>$departamentos]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {


            $rules = ['captcha' => 'required|captcha'];
            $validator = Validator::make($request->all(), $rules);
            
            if ($validator->fails())
            {
                return redirect()->route('front.home')->with('info','Error de captcha');
            }
            else
            {
                $usuario = CupUsuario::where('user_ndoc',$request->user_ndoc)->first();
                if(!empty($usuario)){
                    $cupones = CupDepartamentoCupon::where('dep_id',$request->departamento)->get(); 

                   foreach($cupones as $cupon){
                       $gift = CupCupon::where('cup_id',$cupon->cup_id)->first();
                       if(!empty($gift)){
                           $matriz[] = $gift; 
                       }
                   }

                   echo "<pre>";

                   print_r($matriz);
                   echo "</pre>";

                }else{
                    dd("no existe man..");
                }
               
            }
        
    }

    
}
