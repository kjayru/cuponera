@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">
    <div class="layout__header">
        <div class="section1">
            <div class="section1__align">
                <div class="section1__header">
                    <div class="navigation">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout__main">
        <div class="page1">
            <div class="page1__header">
                <section class="section1">
                    <div class="section1__align">
                        <div class="section1__header">
                            <div class="content_login">
                                <div class="image">
                                    <img src="/assets/pg1_claro_icono.svg" alt=""/>
                                </div>
                                <div class="login">
                                    @if(session('info'))

                                        <div class="alert alert-success">
                                            {{ session('info')}}
                                        </div>

                                    @endif
                                    <form class="form" method="POST" action="{{ route('claro_auth') }}">
                                        @csrf
                                        <div class="form__row1">
                                            <div class="form__info">
                                                <h3>
                                                   <strong>Bienvenido al club.</strong></h3>
                                                <p>Un mundo de beneficios <br> para <b>disfrutarlos al máximo.</b> </p>
                                            </div>
                                        </div>

                                        <div class="form__row2">
                                            <div class="form__fields">
                                                <dl>

                                                    <dt class="content_input">
                                                        <select class="form__select1">
                                                            <option value="">Tipo de documento</option>
                                                            <option value="DNI">DNI</option>
                                                            <option value="RUC">RUC</option>
                                                            <option value="PASAPORTE">PASAPORTE</option>
                                                            <option value="CE">CE</option>
                                                        </select>
                                                    </dt>

                                                    <dd><span class="error">error</span></dd>
                                                </dl>

                                                <dl class="{{ $errors->has('user_ndoc') ? ' is-invalid' : '' }}">
                                                    <dt class="content_input">
                                                        <!--<label class="form__label1">Número de DNI</label>-->
                                                        <input class="form__text1" type="text" name="user_ndoc" placeholder="Número de DNI" required value="{{ old('user_ndoc') }}"/>
                                                    </dt>
                                                    @if ($errors->has('user_ndoc'))
                                                    <dd><span class="error">{{ $errors->first('user_ndoc') }}</span></dd>
                                                    @endif
                                                </dl>

                                                <dl class="{{ $errors->has('departamento') ? ' is-invalid' : '' }}">
                                                    <dt class="content_input">
                                                        <select class="form__select1" name="departamento" required>
                                                            <option value="">Departamento de residencia</option>
                                                            @foreach($departamentos as $depa)
                                                                <option value="{{ $depa->dep_id }}">{{ $depa->dep_nombre}}</option>
                                                            @endforeach
                                                        </select>
                                                    </dt>
                                                    @if ($errors->has('departamento'))
                                                    <dd><span class="error">{{ $errors->first('departamento') }}</span></dd>
                                                    @endif
                                                </dl> 
                                                <dl class="row1">
                                                    <dt>    
                                                        <label class="form__label1">No soy un robot <span>{{ app('mathcaptcha')->label() }}</span></label>
                                                        <!--<input class="form__text1" type="text" name="captcha" />-->
                                                        {!! app('mathcaptcha')->input() !!}
                                                    </dt>
                                                    @if ($errors->has('captcha'))
                                                    <dd><span  class="error">{{ $errors->first('captcha') }}</span></dd>
                                                    @endif
                                                </dl>

                                            </div>
                                        </div>

                                        <div class="form__row3">
                                            <div class="form__buttons">
                                                <button class="button1" type="submit">Enviar</button>
                                            </div>
                                        </div>
                                    </form>
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
