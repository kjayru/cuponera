<?php

namespace App\Http\Controllers\front;

use App\CupCategoria;
use App\CupCuponHome;
use App\Http\Controllers\CuponController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\CupUsuario;
use App\CupDepartamento;
use App\CupDepartamentoCupon;
use App\CupCupon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('login');
    }

    

    public function cupones(Request $request){

        if(!$request->session()->get('user_ndoc')) {
            $request->session()->put('user_ndoc', old('user_ndoc'));
            $request->session()->put('departamento', old('departamento'));
        }


        $ndoc = $request->session()->get('user_ndoc');
        $dpto = $request->session()->get('departamento');

        $usuario = CupUsuario::where('user_ndoc',$ndoc)->first();



        if(!empty($usuario)) {
            $cupones = CupDepartamentoCupon::where('dep_id',$dpto)->OrderBy('dc_id','desc')->limit(12)->get();
            foreach ($cupones as $cupon) {
                $gift = CupCupon::where('cup_id', $cupon->cup_id)->first();
                if (!empty($gift)) {
                    $matriz[] = $gift;
                }
            }


            $recomendados = CupCuponHome::all();

            $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

            $departamento = CupDepartamento::where('dep_id',$dpto)->first();
            $departamentos = CupDepartamento::all();


            return view('front.cupones.index',['categorias'=>$categorias,'recomendados'=>$recomendados,'cupones'=>$matriz,'departamento'=>$departamento,'departamentos'=>$departamentos]);

        }
    }


    public function categorias($categoria){

        $categoria = CupCategoria::where('cat_alias',$categoria)->first();



        $cupones = CupCupon::where('cat_id',$categoria->cat_id)->paginate(6);

        $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

        return view('front.cupones.categoria',['cupones'=>$cupones,'categorias'=>$categorias]);
    }



    public function detalle($categoria,$id,$slug){


        $cupon = CupCupon::where('cup_id',$id)->first();




        return view('front.cupones.detalle',['cupon'=>$cupon]);
    }

    public function salir(){
        return view('front.home.salir');
    }

    
}
