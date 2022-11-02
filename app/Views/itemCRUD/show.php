<!--<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Lista de colegiados</h1>
            </div>
        </div>
    </div>
</section>-->

<section class="junta">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10">
                <div class="container junta">
                    <div class="row">
                        <div class="col-lg-12 mb-5">
                            <div>
                                <a class="btn btn-success" href="<?php echo base_url('itemCRUD/edit/'.$item->Id) ?>"> Editar  asd colegiado</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Fecha Alta:</strong>
                                <?php echo $item->FechaAlta; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nombre:</strong>
                                <?php echo $item->Nombre; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Apellidos:</strong>
                                <?php echo $item->Apellidos; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nif:</strong>
                                <?php echo $item->NIF; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Dirección:</strong>
                                <?php echo $item->Direccion; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Localidad:</strong>
                                <?php echo $item->Localidad; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Código Postal:</strong>
                                <?php echo $item->CP; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Provincia:</strong>
                                <?php echo $item->Provincia; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Comunidad:</strong>
                                <?php echo $item->Comunidad; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Teléfono:</strong>
                                <?php echo $item->Telefono; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Móvil:</strong>
                                <?php echo $item->Movil; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <?php echo $item->Email; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Lugar de Nacimiento:</strong>
                                <?php echo $item->LugarNacimiento; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Fecha de Nacimiento:</strong>
                                <?php echo $item->FechaNacimiento; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Cuenta Bancaria:</strong>
                                <?php echo $item->CuentaBancaria; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Teléfono de trabajo:</strong>
                                <?php echo $item->TelefonoTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Lugar de Trabajo:</strong>
                                <?php echo $item->LugarTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Dirección de Trabajo:</strong>
                                <?php echo $item->DireccionTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Localidad de Trabajo:</strong>
                                <?php echo $item->LocalidadTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nº de Colegiado:</strong>
                                <?php echo $item->Colegiado; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ejerciente:</strong>
                                <?php echo $item->Ejerciente; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Especialidad:</strong>
                                <?php echo $item->Especialidad; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Ámbito de Trabajo:</strong>
                                <?php echo $item->AmbitoTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Sector de Trabajo:</strong>
                                <?php echo $item->Sector; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Solicita Habilitación:</strong>
                                <?php echo $item->SolicitaHabilitacion; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Diplomado en Logopedia:</strong>
                                <?php echo $item->DiplomaturaLogopedia; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Titulación:</strong>
                                <?php echo $item->Titulacion; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Otras Titulaciones:</strong>
                                <?php echo $item->OtrosTitulos; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Bolsa de Trabajo:</strong>
                                <?php echo $item->AltaBolsaTrabajo; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Otros Casos:</strong>
                                <?php echo $item->OtroCaso; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Traslado:</strong>
                                <?php echo $item->Trasladado; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Colegio de Origen:</strong>
                                <?php echo $item->ColegioOrigen; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Nº Colegiado de Origen:</strong>
                                <?php echo $item->NumColegiado; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Observaciones:</strong>
                                <?php echo $item->Observaciones; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Publicidad:</strong>
                                <?php echo $item->Publicidad; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Colegiado Actualmente:</strong>
                                <?php echo $item->Activo; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
