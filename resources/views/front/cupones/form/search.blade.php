<form class="form" action="/buscar" method="POST">
    @csrf
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
            <p>Mostrar cupones disponibles en <span class="departmento">Lima</span><br/><a id="btnCambiar">Cambiar</a></p>
        </div>
    </div>
</form>
