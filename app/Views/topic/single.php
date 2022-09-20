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
								<small><a href="<?= base_url('users/' . $post->author . '/edit') ?>"><?= $post->author ?></a>, <?= $post->created_at ?></small>
							</header>
							<div class="post-content">
								<?= $post->content ?>
							</div>
						</div>
					</article>
				</div>
			<?php endforeach; ?>
			
			<?php if (isset($_SESSION['user_id'])) : ?>
				<div class="col-md-12">
					<a href="<?= base_url($forum->slug . '/' . $topic->slug . '/reply') ?>" class="btn btn-primary text-uppercase mt-3">Responder a este tema</a>
				</div>
			<?php endif; ?>
			
		</div><!-- .row -->
	</div><!-- .container -->
</section>

<?php //var_dump($forum, $topic, $posts); ?>
