<section class="section1">
    <div class="section1__align">
        <div class="section1__header">
            <div class="title">
                <h3>¿Qué vas a disfrutar hoy?</h3>
            </div>
            <div class="list" id="list3">

                @foreach($categorias as $k => $cat)
                    @if($k>1 && $k<9)
                    <a class="list__item type1" href="/cupones/{{ $cat->cat_alias }}">
                        <div class="category">

                            
                            @switch($cat->cat_id)
                                    @case(3)
                                    
                                    <figure><img src="/assets/pg1_categoria6.svg" alt=""/></figure>
                                    <figure class="active"><img src="/assets/pg1_categoria6_on.svg" alt=""/></figure>

                                    @break
                            
                                    @case(5)
                                    <figure><img src="/assets/pg1_categoria3.svg" alt=""/></figure>
                                    <figure class="active"><img src="/assets/pg1_categoria3_on.svg" alt=""/></figure>
                                        
                                    @break
                                    @case(1)
                                       
                                        <figure><img src="/assets/pg1_categoria4.svg" alt=""/></figure>
                                        <figure class="active"><img src="/assets/pg1_categoria4_on.svg" alt=""/></figure>
                                    @break
                                    @case(9)
                                    
                                        <figure><img src="/assets/pg1_categoria10.svg" alt=""/></figure>
                                        <figure class="active"><img src="/assets/pg1_categoria10_on.svg" alt=""/></figure>
                                    @break
                                    @case(4)
                                    
                                        <figure><img src="/assets/pg1_categoria8.svg" alt=""/></figure>
                                        <figure class="active"><img src="/assets/pg1_categoria8_on.svg" alt=""/></figure>
                                    @break
                                    @case(6)
                                     
                                        <figure><img src="/assets/pg1_categoria7.svg" alt=""/></figure>
                                    <figure class="active"><img src="/assets/pg1_categoria7_on.svg" alt=""/></figure>
                                    @break
                                    @case(7)
                                        
                                        <figure><img src="/assets/pg1_categoria5.svg" alt=""/></figure>
                                         <figure class="active"><img src="/assets/pg1_categoria5_on.svg" alt=""/></figure>
                                    @break
                                    @case(2)
                                       
                                        <figure><img src="/assets/pg1_categoria9.svg" alt=""/></figure>
                                        <figure class="active"><img src="/assets/pg1_categoria9_on.svg" alt=""/></figure>
                                    @break
                            @endswitch
                        </div>
                        <figcaption>
                            <p>{{ $cat->cat_nombre }}</p>
                        </figcaption>
                    </a>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
</section>