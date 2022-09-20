</div>
<?php  ?>

<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase"><?php echo($topic->title); ?></h1>
            </div>
        </div>
    </div>
</section>

<section class="junta" style="margin-bottom: -3em; padding-bottom: 4em;">
	<div class="container">
		<div class="row topicos">
			<?php foreach ($posts as $post) : ?>
				<div class="col-md-12">
					<article class="panel panel-default">
						<div class="panel-body">
							<header class="post-header">
								<small><a href="<?= base_url('user/' . $post->author) ?>"><?= $post->author ?></a>, <?= $post->created_at ?></small>
							</header>
							<div class="post-content">
								<?= $post->content ?>
							</div>
						</div>
					</article>
				</div>
			<?php endforeach; ?>
			<?php if ($login_needed) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<p>Necesitas estar registrado para enviar una respuesta</p>
						<p>Por favor <a href="<?= base_url('users/login') ?>">registrate</a> o <a href="<?= base_url('users/register') ?>">crea una nueva cuenta</a>.</p>
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
						<div class="form-group respuesta">
							<label for="reply">Respuesta</label>
							<textarea rows="6" class="form-control" id="reply" name="reply" placeholder=""><?= $content ?></textarea>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary text-uppercase" value="Responder">
						</div>
					</form>
				</div>
			<?php endif; ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section>

<?php //var_dump($forum, $topic, $posts); ?>
