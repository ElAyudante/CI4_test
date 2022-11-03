<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">
    <div class="col-lg-2 ps-0">
       <?php echo view('templates/menu_admin'); ?> 
    </div>
    

    <div class="junta">

		<?php echo form_open('itemCRUD/update_curso_evento'); ?>
			<div class="row">
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Editar Cursos/Eventos</h3>
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Curso/Evento" value="<?= $item->Nombre ?>" autofocus>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                    <label style="color: #004987; font-weight:500;">Tipo:</label>
                    <input type="radio" class="custom-control-input"value="Curso CPLC" name="tipoCurso" id="publico1">
                    <label class="custom-control-label" for="publico1"  style="color: #004987; font-weight:500;">Curso CPLC</label>
                    <input type="radio" class="custom-control-input" value="Curso Ajeno"name="tipoCurso" id="publico2">
                    <label class="custom-control-label" for="publico2"  style="color: #004987; font-weight:500;">Curso Ajeno</label>
                    <input type="radio" class="custom-control-input"value="Evento" name="tipoCurso" id="publico3">
                    <label class="custom-control-label" for="publico3"  style="color: #004987; font-weight:500;">Evento</label>
                </div>
            </div>
			<div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del Curso/Evento"  autofocus><?= $item->Descripcion ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="fecha" placeholder="Fecha" value="<?= $item->Fecha ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="formato" placeholder="Formato" value="<?= $item->Formato ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="duracion" placeholder="Duración" value="<?= $item->Duracion ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="horarioInicio" placeholder="Horario Inicio" value="<?= $item->HorarioInicio ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="horarioFin" placeholder="Horario Fin" value="<?= $item->HorarioFin ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="dirigido" placeholder="Dirigido A" value="<?= $item->Dirigido ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="precioColegiado" placeholder="Precio Colegiados" value="<?= $item->PrecioColegiado ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<input type="text" class="form-control" name="precioNoColegiado" placeholder="Precio No Colegiado" value="<?= $item->PrecioNoColegiado ?>" autofocus></input>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo1" placeholder="Titulo 1" autofocus><?= $item2->Titulo1 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto1" placeholder="Descripcion 1" autofocus><?= $item2->Texto1 ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo2" placeholder="Titulo 1" autofocus><?= $item2->Titulo2 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto2" placeholder="Descripcion 1" autofocus><?= $item2->Texto2 ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo3" placeholder="Titulo 1" autofocus><?= $item2->Titulo3 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto3" placeholder="Descripcion 1" autofocus><?= $item2->Texto3 ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo4" placeholder="Titulo 1" autofocus><?= $item2->Titulo4 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto4" placeholder="Descripcion 1" autofocus><?= $item2->Texto4 ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo5" placeholder="Titulo 1" autofocus><?= $item2->Titulo5 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto5" placeholder="Descripcion 1" autofocus><?= $item2->Texto5 ?></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo6" placeholder="Titulo 1" autofocus><?= $item2->Titulo6 ?></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="texto6" placeholder="Descripcion 1" autofocus><?= $item2->Texto6 ?></textarea>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-3 mb-5">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
				</div>
				<input name = "id" type = "hidden" value="<?php echo $item->Id; ?>">
			</div>
		<?php echo form_close(); ?>
	</div>
</section>
