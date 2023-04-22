<div class="table-responsive">
    <table class="table table-bordered" id="tableReservas" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th># Habitación</th>
                <th>Usuario</th>
                <th>Fecha desde</th>
                <th>Fecha hasta</th>
                <th>Estras</th>
                <th>Total</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th># Habitación</th>
                <th>Usuario</th>
                <th>Fecha desde</th>
                <th>Fecha hasta</th>
                <th>Extras</th>
                <th>Total</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody></tbody>
    </table>
</div>


<div class="modal fade" id="gestionReservasModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="registerReservasView">
                    <div class="form-group">`
                        <label for="numeroHabitacionReserva">Numero de habitacion</label>
                        <input type="text" class="form-control form-control-user" id="numeroHabitacionReserva" name="numeroHabitacionReserva" placeholder="Numero de habitacion">
                    </div>
                    <div class="form-group">
                        <label for="usuarioReserva">Usuario de reseva</label>
                        <input type="text" class="form-control form-control-user" id="usuarioReserva" name="usuarioReserva" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="fechaDesdeReserva">Fecha desde</label>
                        <input type="text" class="form-control form-control-user" id="fechaDesdeReserva" name="fechaDesdeReserva" placeholder="Fecha desde">
                    </div>
                    <div class="form-group">
                        <label for="fechaHastaReservas">Fecha hasta</label>
                        <input type="text" class="form-control form-control-user" id="fechaHastaReservas" name="fechaHastaReservas" placeholder="Fecha hasta">
                    </div>
                    <div class="form-group">
                        <label for="costoExtraReserva">Costos extras</label>
                        <input type="number" class="form-control form-control-user" id="costoExtraReserva" name="costoExtraReserva" placeholder="Costo extra reservas">
                    </div>
                    <div class="form-group">
                        <label for="costoTotalReserva">Costos total</label>
                        <input type="number" class="form-control form-control-user" id="costoTotalReserva" name="costoTotalReserva" placeholder="Costo total">
                    </div>
                    <div class="form-group">
                    <label for="fechaHastaReservas">Estado</label>
                        <input type="text" class="form-control form-control-user" id="estadoReserva" name="estadoReserva" placeholder="Estado">
                    </div>

                    <input type="submit" class="btn btn-success btn-user btn-block" value="Actualizar" />
                </form>
                <div id="remove"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar Modal</button>
            </div>
        </div>
    </div>
</div>