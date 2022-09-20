</div>    
    <?php  ?>

<img class="img-fluid" src="<?php echo base_url(),'/'; ?>assets/images/png/acceso-header.png" style="width:100%; height: 270px; margin-bottom: 30px;"></img>

<div class="container">
    <?php echo form_open('users/login'); ?>
        <div class="row">
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
            <div class="col-md-4 mx-auto">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Introduce tu Usuario" autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Introduce tu Password">
                </div>
                <button type="submit" class="btn btn-primary">Accede</button>
            </div>
        </div>
    <?php echo form_close(); ?>
</div
