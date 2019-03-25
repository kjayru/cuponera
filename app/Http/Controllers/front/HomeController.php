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
use App\User;
use App\CupCupon;
use App\CupSegmentoCupon;
use App\Support\Collection;

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
        if(Auth::user()){
            return redirect('cupones');
        }else{
            return redirect('login');
        }

    }

    

    public function cupones(Request $request){

        if(!$request->session()->get('user_ndoc')) {
            $request->session()->put('user_ndoc', old('user_ndoc'));
            $request->session()->put('departamento', old('departamento'));
        }


        $ndoc = $request->session()->get('user_ndoc');
        $dpto = $request->session()->get('departamento');

        $usuario = CupUsuario::where('user_ndoc',$ndoc)->first();

        $segmento = $usuario->cupsegmento->seg_id;





            //$cupones = CupSegmentoCupon::where('seg_id',$segmento)->OrderBy('sc_orden','desc')->get();

           /* foreach($cupons as $k => $cupon){
                if(!empty($cupon->cupcupon->dep_id)) {
                    if ($cupon->cupcupon->dep_id == $dpto) {
                        $cupones[] = $cupon->cupcupon;
                    }
                }
            }


           dd($cupones);*/

            $cupones = CupSegmentoCupon::where('seg_id',$segmento)->OrderBy('sc_orden','desc')->limit(30)->get();

            $recomendados = CupSegmentoCupon::where('seg_id',$segmento)->inRandomOrder()->limit(30)->get();

            $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();
            $departamento = CupDepartamento::where('dep_id',$dpto)->first();
            $departamentos = CupDepartamento::all();


            return view('front.cupones.index',['categorias'=>$categorias,'recomendados'=>$recomendados,'cupones'=>$cupones,'departamento'=>$departamento,'departamentos'=>$departamentos]);


    }


    public function categorias($categoria){

       $id = Auth::id();

        $user = User::find($id);

        $segmento = $user->cupusuario->cupsegmento->seg_id;


        $categoria = CupCategoria::where('cat_alias',$categoria)->first();

        $cat_id = $categoria->cat_id;

        $nombre = $categoria->cat_nombre;
        //$cupones = CupCupon::where('cat_id',$categoria->cat_id)->paginate(6);

        $cupones = CupSegmentoCupon::where('seg_id',$segmento)->OrderBy('sc_orden','asc')->get();


        foreach($cupones as $cupon){

            if(!empty($cupon->cupcupon)) {

                if($cupon->cupcupon->cat_id==$cat_id && $cupon->cupcupon->cup_estado=1){
                    $matriz[] = $cupon->cupcupon;
                }
            }
        }


        $collection = (new Collection($matriz))->paginate(9);



        $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

        return view('front.cupones.categoria',['cupones'=>$collection,'categorias'=>$categorias,'categoria_id'=>$categoria->cat_id,'cat_nombre'=>$nombre]);
    }



    public function detalle($categoria,$id,$slug){

        $cupon = CupCupon::where('cup_id',$id)->first();
        return view('front.cupones.detalle',['cupon'=>$cupon,'categoria'=>$categoria]);
    }


    public function buscar(Request $request){

        $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

        $cupons = CupCupon::where('cup_titulo','like','%'.$request->search.'%')->get();
        $resultados = CupCupon::where('cup_titulo','like','%'.$request->search.'%')->count();

        return view('front.cupones.buscar',['cupones'=>$cupons,'categorias'=>$categorias,'resultados'=>$resultados]);
    }

    public function salir(){
        return view('front.home.salir');
    }

    
}
