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
                           
                          <a class="dropdown-item exit" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
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




                </div>
                <div class="page2__main">


                    <section class="section1">
                        <div class="section1__align">
                            <div class="section1__header">
                                <div class="title">
                                    <h3>Resultado de busqueda</h3>
                                </div>

                            </div>
                        </div>
                    </section>


                    <section class="section4">
                        <div class="section4__align">
                            <div class="section4__main">
                                <div class="title">

                                    <h5>Mostrando {{ $resultados }} resultados</h5>
                                </div>
                                <div class="info">
                                    <div class="info__list">

                                        @foreach($cupones as $cupon)



                                            <div class="element"><a href="/cupones/{{$cupon->cupcategoria->cat_alias}}/{{$cupon->cup_id}}/{{ \Illuminate\Support\Str::slug($cupon->cup_titulo, '-') }}">
                                                    <div class="element__image">
                                                        <div class="logo"><img src="{{@$cupon->cupempresa->emp_logo}}" alt=""/></div>
                                                        <img src="{{ @$cupon->cup_imagen }}" alt=""/>
                                                        <div class="content">
                                                            

                                                            @switch($cupon->cupcategoria->cat_id)
                                                                @case(3)
                                                                <figure><img src="/assets/pg1_categoria6_off.svg" alt=""/></figure>
                                                                @break
                                                        
                                                                @case(5)
                                                                    <figure><img src="/assets/pg1_categoria3_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(1)
                                                                    <figure><img src="/assets/pg1_categoria4_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(9)
                                                                    <figure><img src="/assets/pg1_categoria10_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(4)
                                                                    <figure><img src="/assets/pg1_categoria8_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(6)
                                                                    <figure><img src="/assets/pg1_categoria7_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(7)
                                                                    <figure><img src="/assets/pg1_categoria5_off.svg" alt=""/></figure>
                                                                @break
                                                                @case(2)
                                                                    <figure><img src="/assets/pg1_categoria9_off.svg" alt=""/></figure>
                                                                @break
                                                            @endswitch
                                                            <figcaption>
                                                                    <p> {{ @$cupon->cup_titulo }}</p>
                                                            </figcaption>
                                                        </div>
                                                    </div>
                                                    <div class="element__info">
                                                        <div class="content">
                                                           
                                                        </div>
                                                    </div></a>
                                            </div>

                                        @endforeach


                                    </div>

                                    <div class="info__paginator">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
