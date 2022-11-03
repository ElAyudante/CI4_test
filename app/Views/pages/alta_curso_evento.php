<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'',];
?>

<section class="bg-gray">
    <div class="container-fluid">
		<div class="row">

			<div class="col-lg-2 ps-0">
				<?php echo view('templates/menu_admin'); ?> 
			</div>
			<div class="col-lg-10">
				<div class="container p-5">
					<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Alta Cursos/Eventos</h3>
					<?php echo form_open('itemCRUD/store_curso_evento', $form_att); ?>
					<div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
						
						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre del Curso/Evento" autofocus>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del Curso/Evento" autofocus></textarea>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="fecha" placeholder="Fecha (dd/mm/yyyy)" autofocus></input>
							</div>
						</div>
						
						<div class="col">
							<select id="formato" class="form-select bg-transparent" name="formato" required>
                  				<option disabled selected hidden value="">Selecciona un formato</option>
								<option value="0">Online</option>
								<option value="1">Presencial</option>
							</select>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="number" class="form-control" name="duracion" placeholder="Duración" autofocus></input>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="horarioInicio" placeholder="Horario Inicio" autofocus></input>
							</div>
						</div>
						
						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="horarioFin" placeholder="Horario Fin" autofocus></input>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="dirigido" placeholder="Dirigido A" autofocus></input>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="precioColegiado" placeholder="Precio Colegiados" autofocus></input>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="precioNoColegiado" placeholder="Precio No Colegiado" autofocus></input>
							</div>
						</div>

						<div class="col-lg-6 d-flex align-items-center">
                            <div class="col text-uppercase d-flex align-items-center">
                                <label class="fw-bold me-3">Tipo:</label>
                                <div class="form-check form-check-inline me-2 mb-0">
                                    <input class="form-check-input" type="radio" name="eventos" id="eventos1" value="1" checked>
                                    <label class="form-check-label" for="eventos1">Curso CPLC</label>
                                </div>
                                <div class="form-check form-check-inline me-2 mb-0">
                                    <input class="form-check-input" type="radio" name="eventos" id="eventos2" value="0">
                                    <label class="form-check-label" for="eventos2">Curso Ajeno</label>
                                </div>
								<div class="form-check form-check-inline me-2 mb-0">
                                    <input class="form-check-input" type="radio" name="eventos" id="eventos2" value="0">
                                    <label class="form-check-label" for="eventos2">Evento</label>
                                </div>
                            </div>
                        </div>

						<div class="col-lg-12">

							<div  class="col-lg-2 fw-bold mb-3">Contenido</div>
							<div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo1" placeholder="Titulo 1" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion1" placeholder="Descripcion 1" autofocus></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo2" placeholder="Titulo 2" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion2" placeholder="Descripcion 2" autofocus></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo3" placeholder="Titulo 3" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion3" placeholder="Descripcion 3" autofocus></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo4" placeholder="Titulo 4" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion4" placeholder="Descripcion 4" autofocus></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo5" placeholder="Titulo 5" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion5" placeholder="Descripcion 5" autofocus></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="titulo6" placeholder="Titulo 6" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion6" placeholder="Descripcion 6" autofocus></textarea>
									</div>
								</div>
							</div>
							
						</div>

						<div class="col">
							<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
						</div>

					<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>
</section>
