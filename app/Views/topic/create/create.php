<?php  ?>
<div class="container">
	<div class="row">
		<!-- <div class="col-md-12">
			<?= $breadcrumb ?>
		</div> -->
		<div class="col-md-12">
			<div class="page-header">
				<h1>Crear un nuevo tema</h1>
			</div>
		</div>
		<?php if ($login_needed) : ?>
			<div class="col-md-12">
				<div class="alert alert-primary" role="alert">
					<p>Necesitas estar registrado para crear un nuevo tema</p>
					<p>Por favor <a href="<?= base_url('users/login') ?>">accede</a> o <a href="<?= base_url('users/register') ?>">crea una nueva cuenta</a>.</p>
				</div>
			</div>
		<?php else : ?>
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
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
			<div class="col-md-12">
				<?= form_open() ?>
					<div class="form-group">
						<label for="title">Título del tema</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Introduce el título del tema" value="<?= $title ?>">
					</div>
					<div class="form-group">
						<label for="content">Contenido</label>
						<textarea rows="6" class="form-control" id="content" name="content" placeholder="Introduce el contenido de tu tema aquí"><?= $content ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary" value="Crear tema">
					</div>
				</form>
			</div>
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->
