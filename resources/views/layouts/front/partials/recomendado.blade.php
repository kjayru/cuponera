
                <div class="info">
                    <div class="info__list" id="list2">
                        @foreach($recomendados as $k => $reco)
                          
                            @if(!empty($reco->cupcupon->cupcategoria) && $reco->cupcupon->cup_estado==1)
                               
                                <div class="element"><a href="/cupones/{{$reco->cupcupon->cupcategoria->cat_alias}}/{{$reco->cupcupon->cup_id}}/{{ \Illuminate\Support\Str::slug($reco->cupcupon->cup_titulo, '-') }}">
                                        <div class="element__image">
                                            <!--<div class="logo"><img src="{{@$reco->cupcupon->cupempresa->emp_logo}}" alt=""/></div>-->
                                            <div class="image">
                                                <img src="{{ $reco->cupcupon->cup_imagen }}" alt=""/>
                                            </div>

                                            <div class="content">
                                                <figure><img src="assets/pg1_ico_comida_.svg" alt=""/></figure>
                                                <figcaption>
                                                    <h4>COMIDA RÁPIDA</h4>
                                                    <h3>Bembos</h3>
                                                    <p> {{ $reco->cupcupon->cup_titulo }}</p>
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
                        @endforeach
                    </div>
                </div>
          