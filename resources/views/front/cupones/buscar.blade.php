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
                                                            <figure><img src="/assets/pg1_ico_comida.svg" alt=""/></figure>
                                                            <figcaption>
                                                                <!-- <p>S/ 24.90</p>-->
                                                            </figcaption>
                                                        </div>
                                                    </div>
                                                    <div class="element__info">
                                                        <div class="content">
                                                            <p> {{ @$cupon->cup_titulo }}</p>
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
