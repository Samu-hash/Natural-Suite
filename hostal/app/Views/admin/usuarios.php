<div class="table-responsive">
    <table class="table table-bordered" id="tableUsuarios" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nombre Completo</th>
                <th>Correo electronico</th>
                <th>Estado</th>
                <th>Fecha de nacimiento</th>
                <th>Identificacion</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nombre Completo</th>
                <th>Correo electronico</th>
                <th>Estado</th>
                <th>Fecha de nacimiento</th>
                <th>Identificacion</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody></tbody>
    </table>
</div>


<div class="modal fade" id="gestionUsuarioModal" tabindex="-1" role="dialog" aria-labelledby="verModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="user" id="registerView">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nameGestion" name="nameGestion" placeholder="Introducir tu nombre o nombres">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="lastGestion" name="lastGestion" placeholder="Introducir tu apellido o apellidos">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="idenPersonalGestion" name="idenPersonalGestion" placeholder="Introducir tu identificacion personal">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control form-control-user" id="fechaNacGestion" name="fechaNacGestion" placeholder="Introducir tu fecha de nacimiento">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="correoGestion" name="correoGestion" placeholder="Introducir un correo de registro">
                    </div>
                    <div class="form-group">
                        <div class="form-group input-group m-0">
                            <input type="password" class="form-control form-control-user" id="claveGestion" name="claveGestion" placeholder="Introducir una clave de registro">
                            <div class="input-group-append">
                                <a href="#" id="mostrarPassGestion" class="border_left_bth btn btn-omni" style="padding: 0.75rem;">
                                    <span class="fa fa-eye-slash icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group input-group m-0">
                            <input type="password" class="form-control form-control-user" id="claveConfimGestion" name="claveConfimGestion" placeholder="Confirma tu clave de registro">
                            <div class="input-group-append">
                                <a href="#" id="mostrarPass2Gestion" class="border_left_bth btn btn-omni" style="padding: 0.75rem;">
                                    <span class="fa fa-eye-slash icon"></span>
                                </a>
                            </div>
                        </div>
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