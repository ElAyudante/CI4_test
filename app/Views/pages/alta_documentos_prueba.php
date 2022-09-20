<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: auto;">
    <div class="col-lg-2 ps-0">
       <?php echo view('templates/menu_admin'); ?> 
    </div>
    

    <div class="junta">

		<?php echo form_open('users/register_documento'); ?>
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
        <?php if (isset($success)) : ?>
				<div class="col-md-12">
					<div class="alert alert-success" role="alert">
						<?= $success ?>
					</div>
				</div>
			<?php endif; ?>
			<h3 style="color: #004987; text-transform: uppercase; font-size:3em">Alta documento</h3>
            <div class="col-md-3 mt-3">
                <div class="form-group">
                    <input type="text" class="form-control" name="documento" placeholder="Nombre del documento" autofocus>
                </div>
            </div>
            <div class="col-md-4 mb-5 form-group">
                <div class="custom-file">
                <label class="custom-file-label" for="customFile">Archivo adjunto</label>
                    <input type="file" class="custom-file-input"  name="archivo" id="customFile">                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group custom-control custom-radio text-uppercase pt-3">
                    <label style="color: #004987; font-weight:500;">Tipo de archivo</label>
                    <input type="radio" class="custom-control-input" name="publico" id="publico1">
                    <label class="custom-control-label" for="publico1" value="Publico" style="color: #004987; font-weight:500;">Público</label>
                    <input type="radio" class="custom-control-input" name="publico" id="publico2">
                    <label class="custom-control-label" for="publico2" value="Gratuito" style="color: #004987; font-weight:500;">Privado</label>
                    <input type="radio" class="custom-control-input" name="publico" id="publico3">
                    <label class="custom-control-label" for="publico3" value="Convenio" style="color: #004987; font-weight:500;">Convenio</label>
                </div>
            </div>
			<div class="row">
				<div class="col-md-3 mb-5">
					<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Dar de alta</button>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
</section>
