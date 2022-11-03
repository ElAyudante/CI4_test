<section class="bg-gray">
	<div class="container-fluid">
        <div class="row">

            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?>
            </div>
            
            <div class="col-lg-10">
                <div class="container p-5">
                    <div>
                        <div> <?php echo $output; ?> </div>
                        <?php foreach($js_files as $file): ?>
                            <script src="<?php echo $file; ?>"></script>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
	</div>
</section>

