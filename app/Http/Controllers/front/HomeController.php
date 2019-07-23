<?php

namespace App\Http\Controllers\front;

use App\CupCategoria;
use App\CupCuponHome;
use App\Http\Controllers\CuponController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\CupUsuario;
use App\CupDepartamento;
use App\User;
use App\CupCupon;
use App\CupSegmentoCupon;
use App\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function cupones(Request $request){
        $user_id = Auth::id();
        $dpto=null;
        $url=null; 

        if(!empty($request->session()->get('url')['intended'])){
            return redirect($request->session()->get('url')['intended']);
        }

        if(!$request->session()->get('departamento')) {
            $request->session()->put('departamento', $request->departamento);
            $dpto = $request->departamento;
        }else{
            $dpto = $request->session()->get('departamento');

        }
      
        $usrlocal = User::find($user_id);       
        $usuario = User::where('user_ndoc',$usrlocal->user_ndoc)->first();      
        $segmento = $usuario->cupsegmento->seg_id;

            $cupones = CupSegmentoCupon::where('seg_id',$segmento)->OrderBy('sc_orden','desc')->take(6)->get();
               
            $recomendados = CupCuponHome::OrderBy('ch_orden','asc')->get();

            $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();
                 
            $departamento = CupDepartamento::where('dep_id',$dpto)->first();

            $departamentos = CupDepartamento::all();
           

            $url_slug = $_SERVER['REQUEST_URI'];
            $ur = explode("/",$url_slug);
            if(!empty($ur[2])){
                $url = $ur[2];
            }

        return view('front.cupones.index',['url_slug'=>$url,'categorias'=>$categorias,'recomendados'=>$recomendados,'cupones'=>$cupones,'departamento'=>$departamento,'departamentos'=>$departamentos]);

    }


    public function categorias($categoria){

       $id = Auth::id();
        $user = User::find($id);
        $segmento = $user->cupsegmento->seg_id;
        
        
        $categoria = CupCategoria::where('cat_alias',$categoria)->first();
        $cat_id = $categoria->cat_id;
        $nombre = $categoria->cat_nombre;

        $cupones = DB::table('cup_cupones')->where('cat_id',$cat_id)->where('cup_estado','1')->paginate(9);
      
        
        $url_slug = $_SERVER['REQUEST_URI'];
        $ur = explode("/",$url_slug);
        $url = $ur[2];
      
       // $collection = (new Collection($matriz))->paginate(9);
        $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

        return view('front.cupones.categoria',['url_slug'=>$url,'cupones'=>$cupones,'categorias'=>$categorias,'categoria_id'=>$categoria->cat_id,'cat_nombre'=>$nombre,'categoria'=>$categoria]);
    }



    public function detalle($categoria,$id,$slug){
        session()->forget('url');
        $ndoc = session()->get('user_ndoc');

        $usuario = CupUsuario::where('user_ndoc',$ndoc)->first();
        //$segmento = $usuario->cupsegmento->seg_id;

        $cupon = CupCupon::where('cup_id',$id)->first();
        //$recomendados = CupSegmentoCupon::where('seg_id',$segmento)->inRandomOrder()->limit(30)->get();
        $recomendados = CupCuponHome::OrderBy('ch_orden','asc')->get();

        return view('front.cupones.detalle',['cupon'=>$cupon,'categoria'=>$categoria,'recomendados'=>$recomendados]);
    }


    public function buscar(Request $request){
       
        $categorias = CupCategoria::where('cat_estado','1')->OrderBy('cat_orden','asc')->get();

        $cupons = CupCupon::where('cup_titulo','like','%'.$request->search.'%')
                            ->orWhere('cup_descripcion_larga','like','%'.$request->search.'%')->paginate(9);

        $resultados = count($cupons);

        $recomendados = CupCuponHome::OrderBy('ch_orden','asc')->get();

        $cupons->appends(['search' => $request->search]);
        return view('front.cupones.buscar',['recomendados'=>$recomendados,'cupones'=>$cupons,'categorias'=>$categorias,'resultados'=>$resultados]);
    }


    public function salir(){
        return view('front.home.salir');
    }

    
}
