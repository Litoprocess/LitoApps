<!-- Modal Structure -->
<div id="SegAgente" class="modal modal-fixed-footer">

    <form id="frm-seguimiento" method="POST">
        <div class="col s12">
            <a class="waves-effect waves-teal btn-flat right btnx-modal modal-close"><i class="material-icons">close</i></a>
        </div>
        <div class="modal-content">
            <div class="row">

                <div class="valign-wrapper">

                    <div class="col s12">

                        <div id="DetallesTitulo">

                        </div>
                    </div>
                    <!--div class="col s6">

                        <div class="col s6">
                            <div class="right">
                            <a id="btn-fseguimiento" class="waves-effect waves-teal btn-flat">Finalizar</a>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="left">
                                <a id="btn-rasignacion" class="waves-effect waves-light btn"><i class="material-icons left">refresh</i>Re-Asignar</a>
                            </div>
                        </div>

                    </div-->

                </div>

            </div>
            <div class="row">
                <div id="HistorialTickets">

                </div>
            </div>
        </div>
        <div class="modal-footer">

            <div class="row">
                <div class="col s8 m8 l9">
                    <input type="text" placeholder="Escribe una consulta aquí" id="txt-seguimiento" name="txt-seguimiento">
                </div>
                <div class="col s4 m4 l3">
                    <button class="btn waves-effect waves-light" type="submit" name="action" id="btn-seguimiento">
            <i class="material-icons">send</i>
          </button>
                </div>
            </div>

        </div>
    </form>

</div>