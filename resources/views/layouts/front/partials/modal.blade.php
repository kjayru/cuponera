<transition name="fade">
    <div class="layout__modal" v-if="modal.show" v-bind:class="{active: modal.show}">
        <div class="overlay">
            <div class="box">
                <div class="box__inset">
                    <div class="page2">
                        <div class="page2__close" @click="closeModal()">Cerrar</div>
                        <section class="section1">
                            <div class="section1__main">
                                <div class="content">
                                    <div class="data">
                                        <div class="title">
                                            <h2>Elige un departamento y verás los <br/>  beneficios que tenemos para ti.</h2>
                                        </div>
                                        <div class="list">
                                            <ul>
                                                <li class="usetype">Amazonas</li>
                                                <li class="usetype">Ancash</li>
                                                <li class="usetype">Arequipa</li>
                                                <li class="usetype">Ayacucho</li>
                                                <li class="usetype">Cajamarca</li>
                                                <li class="usetype">Cusco</li>
                                                <li class="usetype">Huánuco</li>
                                                <li class="usetype">Ica</li>
                                                <li class="usetype">Junín</li>
                                                <li class="usetype">La Libertad</li>
                                                <li class="usetype">Lambayeque</li>
                                                <li class="usetype">Lima</li>
                                                <li class="usetype">Loreto</li>
                                                <li class="usetype">San Martín </li>
                                                <li class="usetype">Tacna</li>
                                                <li class="usetype">Tumbes</li>
                                                <li class="usetype">Ucayali</li>
                                                <!--li.usetype Lambayeque-->
                                                <!--li.usetype Huánuco-->
                                            </ul>
                                        </div>
                                       <!-- <div class="link"><a href="#">Guardar</a></div>-->
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</transition>

