<section class="bg-gray">
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> 
            </div>

            <div class="col-lg-10">
                <div class="container p-5">
                    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta Curso Externo (admin)</h3>
                    <form class="needs-validation form-border p-3 bg-white mb-0">
                        <div class="row row row-cols-lg-2 g-lg-4 cblue">

                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="evento" placeholder="Nombre del evento" autofocus>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="descripcion" placeholder="Descripción"></textarea>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center">
                                <div class="col text-uppercase d-flex align-items-center">
                                    <label class="fw-bold me-3">Tipo de Evento</label>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="eventos" id="evento1" value="ajeno" checked>
                                        <label class="form-check-label" for="evento1">Ajeno</label>
                                    </div>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="eventos" id="evento2" value="gratuito">
                                        <label class="form-check-label" for="evento2">Gratuito</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center">
                                <div class="col text-uppercase d-flex align-items-center">
                                    <label class="fw-bold me-3">Activo</label>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="activos" id="activo1" value="1" checked>
                                        <label class="form-check-label" for="activo1">Sí</label>
                                    </div>
                                    <div class="form-check form-check-inline me-2 mb-0">
                                        <input class="form-check-input" type="radio" name="activos" id="activo2" value="0">
                                        <label class="form-check-label" for="activo2">No</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <label for="formFile" class="form-label text-uppercase fw-bold me-3 text-center">Archivo adjunto</label>
                                <input class="form-control" type="file" id="formFile" name="archivo">
                            </div>

                            <div class="col"></div>

                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
                            </div>            
                            
                        </div>
                    </form>
                </div>
            </div>
            
           

        </div>
	</div>
</section>
