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
					<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Editar Cursos/Eventos</h3>
					<?php echo form_open('itemCRUD/update_curso_evento', $form_att); ?>

					<div class="row row row-cols-lg-4 g-lg-4 cblue text-uppercase">

						<div class="col">
							<div class="form-group">
								<input type="text" class="form-control" name="nombre" placeholder="Nombre del Curso/Evento" value="<?= $item->Nombre ?>" autofocus>
							</div>
						</div>
						
						

						<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del Curso/Evento"  autofocus><?= $item->Descripcion ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="fecha" placeholder="Fecha" value="<?= $item->Fecha ?>" autofocus></input>
									</div>
								</div>

								<div class="col">
									<select id="formato" class="form-select bg-transparent" name="formato" required>
										<option selected hidden value="<?= $item->Formato ?>"><?= $item->Formato ?></option>
										<option value="Online">Online</option>
										<option value="Presencial">Presencial</option>
									</select>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="duracion" placeholder="Duración" value="<?= $item->Duracion ?>" autofocus></input>
									</div>
								</div>
								
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="horarioInicio" placeholder="Horario Inicio" value="<?= $item->HorarioInicio ?>" autofocus></input>
									</div>
								</div>
								
								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="horarioFin" placeholder="Horario Fin" value="<?= $item->HorarioFin ?>" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="dirigido" placeholder="Dirigido A" value="<?= $item->Dirigido ?>" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="precioColegiado" placeholder="Precio Colegiados" value="<?= $item->PrecioColegiado ?>" autofocus></input>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<input type="text" class="form-control" name="precioNoColegiado" placeholder="Precio No Colegiado" value="<?= $item->PrecioNoColegiado ?>" autofocus></input>
									</div>
								</div>

								<div class="col-lg-6 d-flex align-items-center">
									<div class="col text-uppercase d-flex align-items-center">
										<label class="fw-bold me-3">Tipo:</label>
										<div class="form-check form-check-inline me-2 mb-0">
											<input class="form-check-input" type="radio" name="tipoCurso" id="eventos1" value="Curso CPLC" <?php ($item->Tipo == 'Curso CPLC') ? "checked" : "";  ?>>
											<label class="form-check-label" for="eventos1">Curso CPLC</label>
										</div>
										<div class="form-check form-check-inline me-2 mb-0">
											<input class="form-check-input" type="radio" name="tipoCurso" id="eventos2" value="Curso Ajeno" <?php ($item->Tipo == 'Curso Ajeno') ? "checked" : "";  ?>>
											<label class="form-check-label" for="eventos2">Curso Ajeno</label>
										</div>
										<div class="form-check form-check-inline me-2 mb-0">
											<input class="form-check-input" type="radio" name="tipoCurso" id="eventos2" value="Evento" <?php ($item->Tipo == 'Evento') ? "checked" : "";  ?>>
											<label class="form-check-label" for="eventos2">Evento</label>
										</div>
									</div>
								</div>

						<div class="col-lg-12">
							<div  class="col-lg-2 fw-bold mb-3">Contenido</div>
							<div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
								
								

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo1" placeholder="Titulo 1" autofocus><?= $item2->Titulo1 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto1" placeholder="Descripcion 1" autofocus><?= $item2->Texto1 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo2" placeholder="Titulo 1" autofocus><?= $item2->Titulo2 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto2" placeholder="Descripcion 1" autofocus><?= $item2->Texto2 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo3" placeholder="Titulo 1" autofocus><?= $item2->Titulo3 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto3" placeholder="Descripcion 1" autofocus><?= $item2->Texto3 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo4" placeholder="Titulo 1" autofocus><?= $item2->Titulo4 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto4" placeholder="Descripcion 1" autofocus><?= $item2->Texto4 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo5" placeholder="Titulo 1" autofocus><?= $item2->Titulo5 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto5" placeholder="Descripcion 1" autofocus><?= $item2->Texto5 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="titulo6" placeholder="Titulo 1" autofocus><?= $item2->Titulo6 ?></textarea>
									</div>
								</div>

								<div class="col">
									<div class="form-group">
										<textarea type="text" class="form-control" name="texto6" placeholder="Descripcion 1" autofocus><?= $item2->Texto6 ?></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="col">
							<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
						</div>
						
					<?php echo form_close(); ?>
				</div>
			</div>

		</div>
	</div>
</section>
