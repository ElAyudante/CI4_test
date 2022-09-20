<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Foro</h1>
            </div>
        </div>
    </div>
</section>

<section class="foro-global">
	<div class="container py-5">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-uppercase cblue">Foros</th>
					<th class="text-uppercase text-center cblue">Temas</th>
					<th class="text-uppercase text-center cblue">Entradas</th>
					<th class="text-uppercase text-center cblue">Últimos temas</th>
					<th class="btn-foro">
						<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
							<a href="<?= base_url('forum/create_forum') ?>" class="btn-foro btn btn-primary text-uppercase">Crear un nuevo foro</a>
						<?php else : ?>
							<a href="<?php echo base_url(),'/'; ?>mantenimiento" class="alineadobotonmenu btn btn-info px-3 me-2" type="submit">ACCESO A COLEGIADOS</a>
						<?php endif; ?>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php if ($forums) : ?>
					<?php foreach ($forums as $forum) : ?>
						<tr>
							<td>
								<p>
									<a class="test" href="<?= base_url('forum/index/'.$forum->slug) ?>"><?= $forum->title ?></a><br>
									<small class="description"><?= $forum->description ?></small>
									<br>
									<br>
								</p>
							</td>
							<td>
								<p>
									<small><?= $forum->count_topics ?></small>
								</p>
							</td>
							<td>
								<p>
									<small><?= $forum->count_posts ?></small>
								</p>
							</td>
							<td class="hidden-xs">
								<?php if ($forum->latest_topic->title !== null) : ?>
									<p>
										<small><a href="<?= base_url('topic/' . $forum->latest_topic->permalink) ?>"><?= $forum->latest_topic->title ?></a><br>por <a href="<?= base_url('users/' . $forum->latest_topic->author . '/edit') ?>"><?= $forum->latest_topic->author ?></a>, <?= $forum->latest_topic->created_at ?></small>
									</p>
								<?php else : ?>
									<p>
										<small>sin temas</small>
									</p>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>			
	</div>
</section>
