</div>
<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase"><?php echo($forum->title); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="junta foro-global">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php if (isset($topics) && !empty($topics)) : ?>
					<table class="tabla-foro-single w-100">
						<caption></caption>
						<thead class="cabecera-foro-single">
							<tr>
								<th class="temas">Temas</th>
								<th class="entradas">Entradas</th>
								<th class="ultimos">Últimas entradas</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($topics as $topic) : ?>
								<tr>
									<td>
										<p>
											<a href="<?= base_url('topic/' . $topic->permalink) ?>"><?= $topic->title ?></a><br>
											<small>creado por <a href="<?= base_url('users/' . $topic->author . '/edit') ?>"><?= $topic->author ?></a>, <?= $topic->created_at ?></small>
										</p>
									</td>
									<td>
										<p>
											<small><?= $topic->count_posts ?></small>
										</p>
									</td>
									<td class="hidden-xs">
										<p>
											<small>por <a href="<?= base_url('users/' . $topic->latest_post->author . '/edit') ?>"><?= $topic->latest_post->author ?></a><br><?= $topic->latest_post->created_at ?></small></p>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				<?php else : ?>
					<h4>Aún sin temas...</h4>
				<?php endif; ?>
			</div>
			
			<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
				<div class="col-md-12 pt-5 pb-5">			
					<a href="<?= base_url(),'/'.$forum->slug . '/create_topic' ?>" class="btn btn-primary text-uppercase">Crear un nuevo tema</a>
				</div>
			<?php endif; ?>
			
		</div><!-- .row -->
