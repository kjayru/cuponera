@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">


    <div class="layout__header">
        <div class="section1">
            <div class="section1__align">
                <div class="section1__header">


                    <div class="navigation">
                        <ul>
                            <li> <a href="/cupones">
                                    <img  src="{{ url('assets/volver.svg')}}" alt="" />
                                </a>
                            </li>
                            <!--<li>/</li>
                            <li><a href="/cupones/{{$categoria}}">{{ \Illuminate\Support\Str::title($cupon->cupcategoria->cat_nombre) }}</a></li>
                            <li>/</li>
                            <li>{{ \Illuminate\Support\Str::title($cupon->cupempresa->emp_nombre) }}</li>-->
                        </ul>
                    </div>

                    @guest
                    @else
                    
                    <!-- <div class="sesion">
                       
                          <button class="exit" 
                             onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                             {{ __('Cerrar sesión') }}
                        </button>
                     
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                     </form>
                    </div>  -->
                 @endguest
                </div>
            </div>
        </div>
    </div>
   
    <div class="content_detail_image" style="background: url('{{$cupon->cupimagencupones[0]->ic_img}}') no-repeat center -270px;background-size:cover;">
        <!--<img src="{{ $cupon->cup_imagen }}" alt=""/>-->
    </div>

    <div class="layout__main">
        <div class="page3">
            <div class="page3__main">
                <section class="section1">
                    <div class="section1__align">
                       

                        <div class="category_detail">
                            <span>{{ \Illuminate\Support\Str::title($cupon->cupcategoria->cat_nombre) }}</span>
                        </div>
                        <div class="section1__main">

                          
                            <div class="content">
                                <div class="content__header">
                                    
                                    <div class="info">
                                        <h5>{{ $cupon->cupempresa->emp_nombre }}</h5>
                                        <h4>{{ $cupon->cup_descripcion_corta }}</h4>
                                        <h3>{{ $cupon->cup_titulo }}</h3>

                                        <div class="validate">
                                            <span>Vigencia:</span> {{ $cupon->cup_vigencia_inicio }} al {{ $cupon->cup_vigencia_fin }}
                                        </div>

                                        
                                        <p>{!! $cupon->cup_descripcion_larga !!}</p>
                                        

                                        

                                      @if(!empty($cupon->cupempresa->emp_direccion))
                                        <p class="address">{{ strip_tags($cupon->cupempresa->emp_direccion)}}</p>
                                      @endif
                                      @if(!empty($cupon->cupempresa->emp_telefono))
                                        <p class="telephone">{{ $cupon->cupempresa->emp_telefono }}</p>
                                      @endif
                                      @if(!empty($cupon->cupempresa->emp_url))
                                        <p class="link"><a href="{{ $cupon->cupempresa->emp_url }}" target="_blank">{{ $cupon->cupempresa->emp_url }}</a></p>
                                      @endif
                                    </div>
                                </div>
                                <div class="content__main">
                                    <div class="buttons">
                                        <button class="button" onclick="javascript:window.print();">Lo quiero</button>
                                      
                                    </div>

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="image_print">
                    <img src="/assets/claroclub.svg" alt=""/>
                </section>

                <section class="section2" id="bg_section2">
                    <div class="section2__align">
                        <div class="section2__main">
                            <div class="title">
                                <h3>El Club también tiene para ti </h3>
                            </div>
                            @include('layouts.front.partials.recomendado_detalle') 
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@endsection
