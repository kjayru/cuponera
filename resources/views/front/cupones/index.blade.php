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
                                <h3>Lo más nuevo</h3>
                            </div>
                            <div class="info">
                                <div class="info__list" id="list1">
                                 @foreach($cupones as $cup)

                                    @if(!empty($cup->cupcupon->cupcategoria) && $cup->cupcupon->cup_estado==1)

                                        <div class="element">
                                            <a href="/cupones/{{@$cup->cupcupon->cupcategoria->cat_alias}}/{{@$cup->cupcupon->cup_id}}/{{ \Illuminate\Support\Str::slug($cup->cupcupon->cup_titulo, '-') }}">
                                                <div class="element__image">
                                                    <div class="logo"><img src="{{@$cup->cupcupon->cupempresa->emp_logo}}" alt=""/></div>
                                                    <img src="{{ @$cup->cupcupon->cup_imagen }}" alt=""/>
                                                    <div class="content">
                                                        <figure><img src="assets/pg1_ico_comida.svg" alt=""/></figure>
                                                        <figcaption>
                                                           <!-- <p>S/ 24.90</p>-->
                                                        </figcaption>
                                                    </div>
                                                </div>
                                                <div class="element__info">
                                                    <div class="content">
                                                        <p> {{ @$cup->cupcupon->cup_titulo }}</p>
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
                <section class="section3">
                    <div class="section3__align">
                        <div class="section3__main">
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

    @include('layouts.front.partials.modal')
</div>
@endsection
