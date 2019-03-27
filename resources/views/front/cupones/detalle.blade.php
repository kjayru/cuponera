@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">
    <div class="layout__header">
        <div class="section1">
            <div class="section1__align">
                <div class="section1__header">
                    <div class="navigation">
                        <ul>
                            <li> <a href="/cupones">Inicio</a></li>
                            <li>/</li>
                            <li><a href="/cupones/{{$categoria}}">{{ \Illuminate\Support\Str::title($cupon->cupcategoria->cat_nombre) }}</a></li>
                            <li>/</li>
                            <li>{{ \Illuminate\Support\Str::title($cupon->cupempresa->emp_nombre) }}</li>
                        </ul>
                    </div>
                    @guest
                    @else
                    <div class="sesion">
                       
                      <button class="exit" 
                         onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
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
    <div class="layout__main">
        <div class="page3">
            <div class="page3__main">
                <section class="section1">
                    <div class="section1__align">
                        <div class="section1__main">

                            <div class="links"><a href="{{ url()->previous() }}">< Volver</a></div>
                            <div class="content">
                                <div class="content__header">
                                    <div class="image"><img src="{{ $cupon->cup_imagen }}" alt=""/></div>
                                    <div class="info">
                                        <h3>{{ $cupon->cup_titulo }}</h3>
                                        <h4>{{ $cupon->cup_descripcion_corta }}</h4><br/>
                                        <p>
                                            {!! $cupon->cup_descripcion_larga !!}
                                            </p><br/>
                                        <h5>{{ $cupon->cupempresa->emp_nombre }}</h5>
                                        <p>{!! $cupon->cupempresa->emp_direccion !!} <br/>{{ $cupon->cupempresa->emp_telefono }}<br/>
                                            <a href="{{ $cupon->cupempresa->emp_url }}" target="_blank">{{ $cupon->cupempresa->emp_url }}</a>
                                        </p>
                                    </div>
                                </div>
                                <div class="content__main">
                                    <div class="buttons">
                                        <button class="button" onclick="javascript:window.print();">Descargar Cupón</button>
                                       <!-- <button class="button">Enviar por e-mail</button>-->
                                    </div>
                                    <div class="info">
                                        <h5>Cupón valido: del {{ $cupon->cup_vigencia_inicio }} al {{ $cupon->cup_vigencia_fin }}</h5>
                                        <p>{!! $cupon->cup_legal   !!} </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>



                <section class="section2">
                    <div class="section2__align">
                        <div class="section2__main">
                            <div class="title">
                                <h3>Recomendados para ti</h3>
                            </div>
                            <div class="info">
                                <div class="info__list" id="list2">
                                    @foreach($recomendados as $reco)
                                    @if(!empty($reco->cupcupon->cupcategoria) && $reco->cupcupon->cup_estado==1)

                                        <div class="element"><a href="/cupones/{{$reco->cupcupon->cupcategoria->cat_alias}}/{{$reco->cupcupon->cup_id}}/{{ \Illuminate\Support\Str::slug($reco->cupcupon->cup_titulo, '-') }}">
                                                <div class="element__image">
                                                    <div class="logo"><img src="{{@$reco->cupcupon->cupempresa->emp_logo}}" alt=""/></div>
                                                    <img src="{{ $reco->cupcupon->cup_imagen }}" alt=""/>
                                                    <div class="content">
                                                        <figure><img src="assets/pg1_ico_comida.svg" alt=""/></figure>
                                                        <figcaption>
                                                            <p> {{ $reco->cupcupon->cup_titulo }}</p>
                                                        </figcaption>
                                                    </div>
                                                </div>
                                                <div class="element__info">
                                                    <div class="content">
                                                        
                                                    </div>
                                                </div></a>
                                        </div>

                                    @endif
                                @endforeach
                                            <div class="element__image">
                                                <div class="logo"><img src="/assets/pg1_ima1.png" alt=""/></div><img src="assets/pg1_ima8.png" alt=""/>
                                                <div class="content">
                                                    <figure><img src="/assets/pg1_ico_ropa.svg" alt=""/></figure>
                                                    <figcaption>
                                                        <p>-20%</p>
                                                    </figcaption>
                                                </div>
                                            </div>
                                            <div class="element__info">
                                                <div class="content">
                                                    <p> <strong>20% dscto. </strong>en escalada de prueba</p>
                                                </div>
                                            </div></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
