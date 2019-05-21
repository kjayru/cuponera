
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

                                                    <!--<figure><img src="assets/pg1_ico_comida_.svg" alt=""/></figure>-->
                                                            
                                                    @switch($reco->cupcupon->cupcategoria->cat_id)
                                                 
                                                    @case(3)
                                                        <figure><img src="/assets/pg1_categoria6.svg" alt=""/></figure>
                                                        @break
                                                
                                                    @case(5)
                                                        <figure><img src="/assets/pg1_categoria3.svg" alt=""/></figure>
                                                    @break
                                                    @case(1)
                                                        <figure><img src="/assets/pg1_categoria4.svg" alt=""/></figure>
                                                    @break
                                                    @case(9)
                                                        <figure><img src="/assets/pg1_categoria10.svg" alt=""/></figure>
                                                    @break
                                                    @case(4)
                                                        <figure><img src="/assets/pg1_categoria8.svg" alt=""/></figure>
                                                    @break
                                                    @case(6)
                                                        <figure><img src="/assets/pg1_categoria7.svg" alt=""/></figure>
                                                    @break
                                                    @case(7)
                                                        <figure><img src="/assets/pg1_categoria5.svg" alt=""/></figure>
                                                    @break
                                                    @case(2)
                                                        <figure><img src="/assets/pg1_categoria9.svg" alt=""/></figure>
                                                    @break
                                               
                                                @endswitch
                                               
                                               
                                                <figcaption>
                                                    <h4>{{$reco->cupcupon->cupcategoria->cat_nombre}}</h4>
                                                    <h3>{{$reco->cupcupon->cupempresa->emp_nombre}}</h3>
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
          