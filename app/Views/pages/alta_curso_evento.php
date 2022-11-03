<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">
    <div class="col-lg-2 ps-0">
       <?php echo view('templates/menu_admin'); ?> 
    </div>
    

    <div class="junta">

		<?php echo form_open('itemCRUD/store_curso_evento'); ?>
			<div class="row">
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta Cursos/Eventos</h3>
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del Curso/Evento" autofocus>
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
						<textarea type="text" class="form-control" name="descripcion" placeholder="Descripción del Curso/Evento" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="fecha" placeholder="Fecha" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="formato" placeholder="Formato" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="duracion" placeholder="Duración" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="horarioInicio" placeholder="Horario Inicio" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="horarioFin" placeholder="Horario Fin" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="dirigido" placeholder="Dirigido A" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="precioColegiado" placeholder="Precio Colegiados" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="precioNoColegiado" placeholder="Precio No Colegiado" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo1" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion1" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo2" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion2" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo3" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion3" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo4" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion4" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo5" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion5" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>
            <div class="row">
				<div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="titulo6" placeholder="Titulo 1" autofocus></textarea>
					</div>
				</div>
                <div class="col-md-6 mt-3">
					<div class="form-group">
						<textarea type="text" class="form-control" name="descripcion6" placeholder="Descripcion 1" autofocus></textarea>
					</div>
				</div>
			</div>


			<div class="row">
				<div class="col-md-3 mb-5">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</section>
