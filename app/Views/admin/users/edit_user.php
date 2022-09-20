<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation"><a href="<?= base_url(),'/' ?>">Inicio</a></li>
				<li role="presentation" class="active"><a href="<?= base_url('admin/users') ?>">Volver a usuarios</a></li>
				<li role="presentation"><a href="<?= base_url('admin/forums_and_topics') ?>">Foro y temas</a></li>
				<li role="presentation"><a href="<?= base_url('admin/options') ?>">Opciones</a></li>
				<li role="presentation"><a href="<?= base_url('admin/emails') ?>">Emails</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Editar usarios <?= $user->username ?></h3>
				</div>
				<div class="panel-body">
					<?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<p><?= validation_errors() ?></p>
						</div>
					<?php endif; ?>
					<?php if (isset($error)) : ?>
						<div class="alert alert-danger" role="alert">
							<p><?= $error ?></p>
						</div>
					<?php endif; ?>
					<?php if (isset($success)) : ?>
						<div class="alert alert-success" role="alert">
							<p><?= $success ?></p>
						</div>
					<?php endif; ?>
					<?= form_open() ?>	
						<div class="form-group">	
							<label for="user_rights">Derechos de usuario</label>	
							<select class="form-control" name="user_rights" id="user_rights">
								<?= $options ?>
							</select>
						</div>
						<input type="submit" class="btn btn-default" value="Update rights">
						<?php if ($user->updated_at !== null) : ?>
							<small>(ultima actualización por <?= $user->updated_by ?>, <?= $user->updated_at ?>)</small>
							<?php endif; ?>
					</form>
				</div>
			</div>
		</div>
	</div><!-- .row -->
