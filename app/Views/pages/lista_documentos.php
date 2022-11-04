<?php foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<section class="bg-gray">
  	<div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?>
    </div>
	
	<div class="bg-gray container" >
		
        <div> <?php echo $output; ?> </div>
            <?php foreach($js_files as $file): ?>
                <script src="<?php echo $file; ?>"></script>
            <?php endforeach; ?>

	</div>

</section>
