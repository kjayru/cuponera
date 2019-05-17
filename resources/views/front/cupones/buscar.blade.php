@extends('layouts.front.app')
@section('content')
    <div class="layout" id="app">


        <div class="layout__header">
            <div class="section1">
                <div class="section1__align">
                    <div class="section1__header">
                        <!--<div class="navigation">
                            <ul>
                                <li> <a href="/cupones">Inicio</a></li>

                            </ul>
                        </div>-->
                        
                        @guest
                        @else
                        <div class="sesion">
                           
                          <a class="dropdown-item exit" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                             {{ __('Cerrar sesión') }}
                         </a>
                     
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


                    <section class="section1">
                        <div class="section1__align" id="search_header">
                            <div class="section1__header" >
                                <div class="title">
                                    <a href="/cupones">
                                    <img src="/assets/search_arrow.svg" alt=""/>
                                    <h3>Volver</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>


                    <section class="section4">
                        <div class="section4__align">
                            <div class="section4__main" id="search">
                                <!--
                                <div class="title">
                                    <h5>Mostrando {{ $resultados }} resultados</h5>
                                </div>-->
                                <div class="info">
                                    <div class="info__list" id="list5">

                                        @foreach($cupones as $cupon)

                                            <div class="element"><a href="/cupones/{{$cupon->cupcategoria->cat_alias}}/{{$cupon->cup_id}}/{{ \Illuminate\Support\Str::slug($cupon->cup_titulo, '-') }}">
                                                    <div class="element__image">
                                                        <!--<div class="logo"><img src="{{@$cupon->cupempresa->emp_logo}}" alt=""/></div>-->
                                                        <div class="image">
                                                        <img src="{{ @$cupon->cup_imagen }}" alt=""/></div>

                                                        <div class="content">
                                                            
                                                          
                                                            @switch($cupon->cupcategoria->cat_id)
                                                                @case(3)
                                                                <figure><img src="/assets/pg1_categoria6_on.svg" alt=""/></figure>
                                                                @break
                                                        
                                                                @case(5)
                                                                    <figure><img src="/assets/pg1_categoria3_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(1)
                                                                    <figure><img src="/assets/pg1_categoria4_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(9)
                                                                    <figure><img src="/assets/pg1_categoria10_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(4)
                                                                    <figure><img src="/assets/pg1_categoria8_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(6)
                                                                    <figure><img src="/assets/pg1_categoria7_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(7)
                                                                    <figure><img src="/assets/pg1_categoria5_on.svg" alt=""/></figure>
                                                                @break
                                                                @case(2)
                                                                    <figure><img src="/assets/pg1_categoria9_on.svg" alt=""/></figure>
                                                                @break
                                                            @endswitch
                                                            <figcaption>
                                                                <h4>COMIDA RÁPIDA</h4>
                                                                <h3>Bembos</h3>
                                                                <p> {{ @$cupon->cup_titulo }}</p>
                                                            </figcaption>
                                                        </div>
                                                    </div>
                                                    <!--
                                                    <div class="element__info">
                                                        <div class="content">
                                                           
                                                        </div>
                                                    </div>-->
                                                </a>
                                            </div>

                                        @endforeach


                                    </div>

                                    <div class="info__paginator">

                                    </div>
                                </div>

                                <div class="title">
                                    <h5>Mostrando {{ $resultados }} resultados</h5>
                                </div>

                                <div class="without_products">
                                    <h3>No se han encontrado resultados</h3>
                                    <a href="/cuponera">
                                        <img src="/assets/atras.svg" alt=""/>
                                    </a>
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
                               
                            </div>
                        </div>
                    </section>

                    </section>
                </div>
            </div>
        </div>
        @include('layouts.front.partials.modal')
    </div>
@endsection
