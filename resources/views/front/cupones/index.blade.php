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

    <div class="layout__main">
        <div class="page2">
            <div class="page2__header">
                <section class="section1">
                    <div class="section1__align">
                        <div class="section1__header">
                            <div class="search">
                                @include('front.cupones.form.search')
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="page2__main">
               @include('layouts.front.partials.categorias')
                <section class="section2">
                    <div class="section2__align">
                        <div class="section2__main">
                            <div class="title">
                                <h3>Descubre lo que tenemos para ti</h3>
                            </div>
                            <div class="info">
                                <div class="info__list" id="list1">
                                        @php $i = 0; @endphp
                                 @foreach($cupones as $cup)

                                    @if(!empty($cup->cupcupon->cupcategoria) && $cup->cupcupon->cup_estado==1)
                                   
                                    @if($i<6)
                                        
                                        <div class="element">
                                            <a href="/cupones/{{@$cup->cupcupon->cupcategoria->cat_alias}}/{{@$cup->cupcupon->cup_id}}/{{ \Illuminate\Support\Str::slug($cup->cupcupon->cup_titulo, '-') }}">
                                                <div class="element__image">
                                                    <!--<div class="logo"><img src="{{@$cup->cupcupon->cupempresa->emp_logo}}" alt=""/></div>-->
                                                    <div class="image">
                                                        <img src="{{ @$cup->cupcupon->cup_imagen }}" alt=""/>
                                                    </div>

                                                    <div class="content">
                                                        @switch($cup->cupcupon->cupcategoria->cat_id)
                                                            @case(3)
                                                                <figure><img src="assets/pg1_categoria6_off.svg" alt=""/></figure>
                                                                @break
                                                        
                                                            @case(5)
                                                                <figure><img src="assets/pg1_categoria3_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(1)
                                                                <figure><img src="assets/pg1_categoria4_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(9)
                                                                <figure><img src="assets/pg1_categoria10_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(4)
                                                                <figure><img src="assets/pg1_categoria8_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(6)
                                                                <figure><img src="assets/pg1_categoria7_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(7)
                                                                <figure><img src="assets/pg1_categoria5_off.svg" alt=""/></figure>
                                                            @break
                                                            @case(2)
                                                                <figure><img src="assets/pg1_categoria9_off.svg" alt=""/></figure>
                                                            @break
                                                        @endswitch
                                                        <figcaption>
                                                            <h4>COMIDA RÁPIDA</h4>
                                                            <h3>Bembos</h3>

                                                            <p> {{ @$cup->cupcupon->cup_titulo }}</p>
                                                        </figcaption>
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="element__info">
                                                    <div class="content">
                                                       
                                                    </div>
                                                </div>--></a>
                                        </div>
                                        
                                        @endif
                                        @php $i++; @endphp
                                    @endif
                                   
                                 @endforeach





                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section3">
                    <div class="section3__align">
                        <div class="section3__main">
                            <div class="title">
                                <h3>Lo nuevo del club</h3>
                            </div>
                            @include('layouts.front.partials.recomendado')
                        </div>
                    </div>
                </section>

                <section class="section5">
                    <div class="section5__align">
                        <div class="section5__main">
                            <div class="list">
                                <div class="item">
                                    <div class="image">
                                        <img  src="{{ url('assets/pg1_section5_celular.png')}}" alt="" />
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="title">
                                        <h3>¡Qué esperas!</h3>
                                        <span> Se parte del club, descarga la App en:</span>
                                    </div>
                                    <div class="link">
                                        <a href="#">
                                            <img  src="{{ url('assets/app_store.svg')}}" alt="" />
                                        </a>

                                        <a href="#">
                                            <img  src="{{ url('assets/play_store.svg')}}" alt="" />
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </duv>
                </section>
               
            </div>
        </div>
    </div>

    @include('layouts.front.partials.modal')
</div>
@endsection
