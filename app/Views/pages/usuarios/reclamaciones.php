<head>
    <?php 
        foreach($css_files as $file): ?>
            <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
</head>

<section class="junta">
  	<div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_usuarios'); ?>
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url('users/nueva_reclamacion') ?>"> Nueva Reclamación</a>
            </div>
        </div>
    </div>
	
	<div class="container junta" style="position: relative; top: -850px; left: 50px">
		
        <div> <?php echo $output; ?> </div>
            <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>

	</div>

</section>