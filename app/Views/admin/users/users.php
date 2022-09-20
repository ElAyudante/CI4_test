<div class="row">
		<div class="col-md-2">
			<ul class="nav nav-pills nav-stacked">
				<li role="presentation"><a href="<?= base_url(),'/' ?>">Inicio</a></li>
				<li role="presentation" class="active"><a href="#">Usarios</a></li>
				<li role="presentation"><a href="<?= base_url('admin/forums_and_topics') ?>">Foros y temas</a></li>
				<li role="presentation"><a href="<?= base_url('admin/options') ?>">Opciones</a></li>
				<li role="presentation"><a href="<?= base_url('admin/emails') ?>">Emails</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Usuarios</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped">
						<caption></caption>
						<thead>
							<tr>
								<th>#</th>
								<th>Nombre de usuario</th>
								<th>Derechos</th>
								<th class="hidden-xs">Fecha de registro</th>
								<th>Acción</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($users as $user) : ?>
								<tr>
									<td><?= $user->id ?></td>
									<td><a href="<?= base_url('user/' . $user->username) ?>" target="_blank"><?= $user->username ?></a></td>
									<?php if ($user->is_admin) : ?>
									<td>administrador</td>
									<?php elseif ($user->is_moderator) : ?>
									<td>moderador</td>
									<?php else : ?>
									<td>usario</td>
									<?php endif; ?>
									<td class="hidden-xs"><?= $user->created_at ?></td>
									<td><a class="btn btn-xs btn-primary" href="<?= base_url('admin/edit_user/' . $user->username) ?>">Editar</a> <a class="btn btn-xs btn-danger" href="<?= base_url('admin/delete_user/' . $user->username) ?>">Eliminar</a></td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div><!-- .row -->
