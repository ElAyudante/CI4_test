<?php  ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?= $breadcrumb ?>
		</div>
		<div class="col-md-12">
			<div class="page-header">
				<h1>La cuenta del usuario <small><?= $user->username ?> se ha elminado</small></h1>
			</div>
		</div>
		<?php if (isset($success)) : ?>
			<div class="col-md-12">
				<div class="alert alert-success" role="alert">
					<p><?= $success ?></p>
					<p>Go back to <a href="<?= base_url(),'/' ?>">Home page</a></p>
				</div>
			</div>
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php session_destroy() ?>
