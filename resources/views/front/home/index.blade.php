@extends('layouts.front.app')
@section('content')

<div class="layout" id="app">
        <div class="layout__header">
          <div class="section1">
            <div class="section1__align">
              <div class="section1__header">
                <div class="navigation">
                  <ul>
                    <li> <a href="#">Inicio</a></li>
                    <li>/</li>
                    <li>Cuponera</li>
                  </ul>
                </div>
                <div class="sesion">
                  <button class="new">Lo más nuevo</button>
                  <button class="exit">Salir</button>
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
                    <div class="login">
                        @if(session('info'))
                       
                                    <div class="alert alert-success">
                                        {{ session('info')}}
                                    </div>
                                
                        @endif
                      <form class="form" action="{{ route('front.verify') }}" method="POST">
                          @csrf
                        <div class="form__row1">
                          <div class="form__info">
                            <h3>
                               Bienvenido a <strong>Cuponera <span>Claro</span></strong></h3>
                            <p>Ingresa a nuestra cuponera virtual y disfruta <br/>de grandes descuentos</p>
                          </div>
                        </div>
                        <div class="form__row2">
                          <div class="form__fields">
                            <dl>
                              <dt>
                                <label class="form__label1">Número de DNI</label>
                                <input class="form__text1" type="text" name="user_ndoc"/>
                              </dt>
                              <dd><span class="error">error</span></dd>
                            </dl>
                            <dl>
                              <dt>
                                <select class="form__select1" name="departamento">
                                  <option value="">Departamento de residencia</option>
                                  @foreach($departamentos as $depa)
                                  <option value="{{ $depa->dep_id }}">{{ $depa->dep_nombre}}</option>
                                  @endforeach
                                </select>
                              </dt>
                              <dd><span class="error">error</span></dd>
                            </dl> 
                            <dl class="row1">
                              <dt>
                                    
                                <label class="form__label1">No soy un robot <span>{{ captcha_img()  }}</span></label>
                                <input class="form__text1" type="text" name="captcha" />
                              </dt>
                              <dd><span class="error">error</span></dd>
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
              </section>
            </div>
          </div>
        </div>
      </div>
@endsection
