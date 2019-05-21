@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">


    <div class="layout__header">
        <div class="section1">
            <div class="section1__align">
                <div class="section1__header">


                    <div class="navigation">
                        <ul>
                            <li> <a href="/cupones">Volver</a></li>
                            <!--<li>/</li>
                            <li><a href="/cupones/{{$categoria}}">{{ \Illuminate\Support\Str::title($cupon->cupcategoria->cat_nombre) }}</a></li>
                            <li>/</li>
                            <li>{{ \Illuminate\Support\Str::title($cupon->cupempresa->emp_nombre) }}</li>-->
                        </ul>
                    </div>

                    @guest
                    @else
                    <div class="sesion">
                       
                      <button class="exit" 
                         onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                         {{ __('Cerrar sesión') }}
                    </button>
                 
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </div>
                 @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="content_detail_image">
        <img src="{{ $cupon->cup_imagen }}" alt=""/>
    </div>

    <div class="layout__main">
        <div class="page3">
            <div class="page3__main">
                <section class="section1">
                    <div class="section1__align">

                        <div class="bg_category">
                            <img src="../../../assets/detail_bg_1.svg" alt=""/>
                        </div>

                        <div class="share">
                            <img src="../../../assets/share.svg" alt=""/>
                            <img src="../../../assets/favorite.svg" alt=""/>
                        </div>

                        <div class="category_detail">
                            <span>{{ \Illuminate\Support\Str::title($cupon->cupcategoria->cat_nombre) }}</span>
                        </div>
                        <div class="section1__main">

                           <!-- <div class="links"><a href="{{ url()->previous() }}">< Volver</a></div>-->
                            <div class="content">
                                <div class="content__header">
                                    <!--
                                    <div class="image"><img src="{{ $cupon->cup_imagen }}" alt=""/></div>-->
                                    <div class="info">
                                        <h5>{{ $cupon->cupempresa->emp_nombre }}</h5>
                                        <h4>{{ $cupon->cup_descripcion_corta }}</h4>
                                        <h3>{{ $cupon->cup_titulo }}</h3>

                                        <div class="validate">
                                            <span>Vigencia:</span> {{ $cupon->cup_vigencia_inicio }} al {{ $cupon->cup_vigencia_fin }}
                                        </div>

                                        
                                        <p>{!! $cupon->cup_descripcion_larga !!}</p>
                                        

                                        

                                       
                                        <p class="address"><p>{!! $cupon->cupempresa->emp_direccion !!}</p></p>

                                        <p class="telephone">{{ $cupon->cupempresa->emp_telefono }}</p>

                                        <p class="link"><a href="{{ $cupon->cupempresa->emp_url }}" target="_blank">{{ $cupon->cupempresa->emp_url }}</a></p>

                                    </div>
                                </div>
                                <div class="content__main">
                                    <div class="buttons">
                                        <button class="button" onclick="javascript:window.print();">Lo quiero</button>
                                       <!-- <button class="button">Enviar por e-mail</button>-->
                                    </div>

                                    <!--
                                    <div class="info">
                                        <h5>Cupón valido: del {{ $cupon->cup_vigencia_inicio }} al {{ $cupon->cup_vigencia_fin }}</h5>
                                        <p>{!! $cupon->cup_legal   !!} </p>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                <section class="section2" id="bg_section2">
                    <div class="section2__align">
                        <div class="section2__main">
                            <div class="title">
                                <h3>El club tiene para ti</h3>
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
