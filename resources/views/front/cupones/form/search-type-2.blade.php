<form class="form" action="/buscar" method="get">
   
    <div class="form__row1">
        <div class="form__info">
            <h3>
               Ya eres parte del Club <img  src="{{ url('assets/pg1_claro_icono.svg')}}" alt="" />
             </h3>
        </div>
        <a id="m_mb" name="{{ @$cat_nombre }}" ></a>
    </div>
    <div class="form__row2">
        <div class="form__fields">
            <dl>
                <dt>
                    <input class="form__text1" type="text" name="search" placeholder="Buscar" required/>
                    <input type="submit" value=""class="btn_search">
                </dt>

            </dl>
        </div>
    </div>

</form>



