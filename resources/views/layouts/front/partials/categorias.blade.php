<section class="section1">
    <div class="section1__align">
        <div class="section1__header">
            <div class="title">
                <h3>Selecciona la categoría de tu interés</h3>
            </div>
            <div class="list" id="list3">

                @foreach($categorias as $k => $cat)

                    <a class="list__item type1" href="/cupones/{{ $cat->cat_alias }}">
                    <div class="category">
                       <figure><img src="/assets/pg1_categoria{{$k+1}}.svg" alt=""/></figure>
                          <!-- <figure><img src="{{ $cat->cat_icon }}" alt=""/></figure>-->
                        <figure class="active"><img src="/assets/pg1_categoria{{$k+1}}_on.svg" alt=""/></figure>
                    </div>
                    <figcaption>
                        <p>{{ $cat->cat_nombre }}</p>
                    </figcaption>
                    </a>
                @endforeach


            </div>
        </div>
    </div>
</section>
