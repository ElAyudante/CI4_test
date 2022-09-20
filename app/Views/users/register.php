<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center">
    <div class="container">
        <div class="text-white">
            <h1 class="mb-3 title-main align-middle text-uppercase">Colégiate</h1>
            <p class="mb-3 text-fff subtitulo-presentacion">Inscríbete aquí</p>
        </div>
    </div>
</section>

<section class="junta">
	<div class="container py-5">
		<?php  ?>

		<?php echo form_open('users/register'); ?>
			<div class="row">

				<?php if (validation_errors()) : ?>
					<div class="col-md-12">
						<div class="alert alert-info" role="alert">
							<?= validation_errors() ?>
						</div>
					</div>
				<?php endif; ?>

				<?php if (isset($error)) : ?>
					<div class="col-md-12">
						<div class="alert alert-danger" role="alert">
							<?= $error ?>
						</div>
					</div>
				<?php endif; ?>

				<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Inscripción</h3>
					<div class="col-md-5">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bordercblue" name="name" placeholder="Nombre" autofocus >
						</div>
					</div>
					<div class="col-md-7">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bordercblue" name="lastname" placeholder="Apellidos" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bordercblue" name="nif" placeholder="DNI" >
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input type="email" class="form-control text-uppercase bordercblue" name="email" placeholder="Correo Electrónico" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="localidad" placeholder="Localidad" >
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="provincia" placeholder="Provincia" >
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<input type="number" class="form-control text-uppercase bg-transparent bordercblue" name="cp" placeholder="C.P." >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="telefono" placeholder="Teléfono" pattern="[0-9]{9}">
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="direccion" placeholder="Dirección" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="titulacion" placeholder="Titulación" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="number" class="form-control text-uppercase bg-transparent bordercblue" name="colegiado" placeholder="Nº de colegiado" >
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<input type="text" class="form-control text-uppercase bg-transparent bordercblue" name="colegioOrigen" placeholder="Colegio" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="password" class="form-control text-uppercase bg-transparent bordercblue" name="password" placeholder="Contraseña" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<input type="password" class="form-control text-uppercase bg-transparent bg-transparent bordercblue" name="password2" placeholder="Confirmar contraseña" >
						</div>
					</div>
				</div>
				<div class="row">
					<div class="d-flex justify-content-start pt-4">
							
								<button type="submit" id="myBtn1" class="btn btn-primary">REGISTRATE</button>
							
					</div>
				</div>
			</div>
		<?php echo form_close(); ?>

	</div>
</section>
