</div>
<?php  ?>
<div class="container">
	<?php


	if ($this->session->flashdata('errors')){
		echo '<div class="alert alert-danger">';
		echo $this->session->flashdata('errors');
		echo "</div>";
	}


	?>
	<?php echo form_open('users/edit'); ?>
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1>Edita tu perfil de usuario, <small><?php echo $user->username ?></small></h1>
			</div>
		</div>
		<?php if (validation_errors()) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<p><?= validation_errors() ?></p>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($success)) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<p><?= $success ?></p>
				</div>
			</div>
		<?php endif; ?>
		<?php if (isset($_SESSION['flash'])) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<p><?= $_SESSION['flash'] ?></p>
					<?php unset($_SESSION['flash']); ?>
				</div>
			</div>
		<?php endif; ?>
		<div class="col-md-12">
			<div class="row">
				<?= form_open_multipart() ?>
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Gestiona tu cuenta</h3>
							</div>
							<div class="panel-body" style="">
								<div class="row">
									<div class="col-sm-3 text-center">
										<img class="avatar img-fluid" src="<?= base_url('uploads/avatars/' . $user->avatar) ?>">
										<br><br>
										<div class="form-group">
											<label for="avatar">Modifica tu imagen de perfil</label>
											<input type="file" id="avatar" name="userfile" style="word-wrap: break-word">
										</div>
									</div>
									<div class="col-sm-7 col-sm-offset-2">
										<div class="form-group">
											<label for="username">Tu nombre de usuario</label>
											<input type="text" class="form-control" id="username" name="username" placeholder="<?= $user->username ?>">
										</div>
										<div class="form-group">
											<label for="email">Tu email</label>
											<input type="email" class="form-control" id="email" name="email" placeholder="<?= $user->email ?>">
										</div>
										<div class="form-group">
											<label for="current_password">Password actual</label>
											<input type="password" class="form-control" id="current_password" name="current_password" placeholder="Introduce tu pasword actual si quieres modificarlo">
										</div>
										<div class="form-group">
											<label for="password">Nuevo password</label>
											<input type="password" class="form-control" id="password" name="password" placeholder="Introduce tu nuevo password">
										</div>
										<div class="form-group">
											<label for="password_confirm">Confirmar nuevo password</label>
											<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirma tu nuevo password">
										</div>
										<input type="submit" class="btn btn-primary" value="Actualiza tu perfil">
									</div>
								</div><!-- .row -->
							</div>
						</div>
					</div>			
					<div class="col-md-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title">Eliminar tu cuenta</h3>
							</div>
							<div class="panel-body">
								<p>Si quieres eliminar tu cuenta, pulsa el botón de más abajo.</p>
								<p><strong>¡ATENCIÓN! Si pinchas el enlace de más abajo, tu cuenta será eliminada inmediara y permanentemente.</strong></p>
								<a href="<?= base_url('user/' . $user->username . '/delete') ?>" class="btn btn-danger btn-block btn-sm" onclick="return confirm('¿Seguro que quieres eliminar tu cuenta? Si pulsas OK, tu cuenta se eliminará inmediata y permanentemente.')">Eliminar tu cuenta</a>
							</div>
						</div>	
					</div>
				</form>
			</div><!-- .row -->
		</div>
	</div><!-- .row -->
	<?php echo form_close();?>
</div><!-- .container -->

<?php //var_dump($user); ?>
