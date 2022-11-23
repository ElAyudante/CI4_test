<?php
$form_att=["class"=> "needs-validation form-border p-3 bg-white mb-0", "novalidate"=>'', "enctype" => "multipart/form-data"];
?>

<section class="bg-gray">

	<div class="container-fluid">
		<div class="row">
			
			<div class="col-lg-2 ps-0">
				<?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
			</div>

			<div class="col-lg-10">
				<div class="container p-5">
					<h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Editar Documento</h3>
					<?php echo form_open('/itemCRUD/update_documento', $form_att); ?>

					<div class="row row-cols-lg-2 g-lg-4 cblue text-uppercase">
					
						<div class="col">
							<div class="form-group">
								<strong>Nombre del Documento:</strong>
								<input type="text" class="form-control" name="nombre" value="<?=$item->Nombre;?>" autofocus>
							</div>
						</div>

						<div class="col d-flex align-items-center justify-content-center">
							<label class="fw-bold me-3">Sector</label>
							<div class="form-check form-check-inline me-2 mb-0">
								<input class="form-check-input" type="radio" name="sectores" id="sector1" value="publico" checked>
								<label class="form-check-label" for="sector1">Público</label>
							</div>

							<div class="form-check form-check-inline me-0 mb-0">
								<input class="form-check-input" type="radio" name="sectores" id="sector2" value="privado">
								<label class="form-check-label" for="sector2">Privado</label>
							</div>
						</div>

						<div class="col">
							<div class="form-group">
								<strong>Descripción del documento:</strong>
								<textarea type="text" class="form-control" name="descripcion" value="<?=$item->Descripcion?>" placeholder="Descripción"></textarea>
							</div>
						</div>

						<div class="col d-flex align-items-center justify-content-center">
							<label for="formFile" class="form-label text-uppercase fw-bold me-3 text-center">Archivo adjunto</label>
							<input type="file" class="form-control bg-transparent" name="archivo" value="<?= $item->Archivo?>">
						</div>

						<div class="col">
							<button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Modificar</button>
						</div>
						<input name = "id" type = "hidden" value="<?php echo $item->Id; ?>">
					</div>
					
					<?php echo form_close(); ?>
				</div>
			</div>
			
		</div>
	</div>
</section>