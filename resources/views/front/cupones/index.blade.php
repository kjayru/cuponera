@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">



    <div class="layout__main">
        <div class="page2">
            <div class="page2__header">
                <section class="section1">
                    <div class="section1__align">
                        <div class="section1__header">
                            <div class="search">
                                <form class="form">
                                    <div class="form__row1">
                                        <div class="form__info">
                                            <h3>
                                                Bienvenido</h3>
                                        </div>
                                    </div>
                                    <div class="form__row2">
                                        <div class="form__fields">
                                            <dl>
                                                <dt>
                                                    <input class="form__text1" type="text" name="search" placeholder="Buscar"/>
                                                </dt>
                                            </dl>
                                        </div>
                                    </div>
                                    <div class="form__row1">
                                        <div class="form__info">
                                            <p>Mostrar cupones disponibles en  {{ $departamento->dep_nombre }}<a>Cambiar</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="page2__main">
                <section class="section1">
                    <div class="section1__align">
                        <div class="section1__header">
                            <div class="title">
                                <h3>Selecciona la categoría de tu interés</h3>
                            </div>
                            <div class="list" id="list3">

                                 @foreach($categorias as $k => $cat)
                                    <a href="/cupones/{{ $cat->cat_alias }}" class="list__item type{{$k+1}}">

                                    <figure></figure>

                                    <figcaption>
                                        <p>{{ $cat->cat_nombre }}</p>
                                    </figcaption>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </section>
                <section class="section2">
                    <div class="section2__align">
                        <div class="section2__main">
                            <div class="title">
                                <h3>Lo más nuevo</h3>
                            </div>
                            <div class="info">
                                <div class="info__list" id="list1">
                                 @foreach($cupones as $cupon)



                                        <div class="element">
                                            <a href="/cupones/{{$cupon->cupcategoria->cat_alias}}/{{$cupon->cup_id}}/{{ \Illuminate\Support\Str::slug($cupon->cup_titulo, '-') }}">
                                                <div class="element__image">
                                                    <div class="logo"><img src="{{@$cupon->cupempresa->emp_logo}}" alt=""/></div>
                                                    <img src="{{ @$cupon->cup_imagen }}" alt=""/>
                                                    <div class="content">
                                                        <figure><img src="assets/pg1_ico_comida.svg" alt=""/></figure>
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
                            </div>
                        </div>
                    </div>
                </section>
                <section class="section3">
                    <div class="section3__align">
                        <div class="section3__main">
                            <div class="title">
                                <h3>Recomendados para ti</h3>
                            </div>
                            <div class="info">
                                <div class="info__list" id="list2">
                                    @foreach($recomendados as $reco)
                                        @if(!empty($reco->cupcupon))



                                            <div class="element"><a href="/cupones/{{$reco->cupcupon->cupcategoria->cat_alias}}/{{$reco->cupcupon->cup_id}}/{{ \Illuminate\Support\Str::slug($reco->cupcupon->cup_titulo, '-') }}">
                                                    <div class="element__image">
                                                        <div class="logo"><img src="{{$reco->cupcupon->cupempresa->emp_logo}}" alt=""/></div>
                                                        <img src="{{ $reco->cupcupon->cup_imagen }}" alt=""/>
                                                        <div class="content">
                                                            <figure><img src="assets/pg1_ico_comida.svg" alt=""/></figure>
                                                            <figcaption>
                                                                <!-- <p>S/ 24.90</p>-->
                                                            </figcaption>
                                                        </div>
                                                    </div>
                                                    <div class="element__info">
                                                        <div class="content">
                                                            <p> {{ $reco->cupcupon->cup_titulo }}</p>
                                                        </div>
                                                    </div></a>
                                            </div>

                                        @endif
                                    @endforeach
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
