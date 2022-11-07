<?php
$sel_comunidades =  array (
    'Anadalucia' => 'Andalucia',
    'Aragon' => 'Aragón',
    'Asturias' => 'Asturias',
    'Baleares' => 'Baleares',
    'Canarias' => 'Canarias',
    'Cantabria' => 'Cantabria',
    'Castilla La Mancha' => 'Castilla La Mancha',
    'Castilla Leon' => 'Catilla León',
    'Cataluña' => 'Cataluña',
    'Ceuta' => 'Ceuta',
    'Comunidad Valenciana' => 'Comunidad Valenciana',
    'Extremadura' => 'Extremadura',
    'Galicia' => 'Galicia',
    'La Rioja' => 'La Rioja',
    'Madrid' => 'Madrid',
    'Melilla' => 'Melilla',
    'Navarra' => 'Navarra',
    'Pais Vasco' => 'País Vasco',
    'Murcia' => 'Región de Murcia'
  )
?>
<head>
<?php 
    foreach($css_files as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
</head>
<body>

<section class="bg-gray" >

    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_usuarios'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10">
                <div class="container p-5">
                    

                    <div class="bg-white"> 
                        <div class="d-flex bg-blue">
                            <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0"><?php echo $titulo;?></h3>
                            <div class="row pt-2 d-flex justify-content-end">
                                <div class="col-lg-2 margin-tb d-flex flex-row">
                                    <div class="">
                                        <a class="btn btn-success" href="<?php echo base_url('itemCRUD/create') ?>"> Excel</a>
                                    </div>
                                <div class="">
                                    <a class="btn btn-success" href="<?php echo base_url('itemCRUD/create') ?>"> PDF</a>
                                </div>
                            </div>


                    </div>
                        </div>
                        

                        <?php echo $output; ?> 
                    </div>
                    <?php foreach($js_files as $file): ?>
                        <script src="<?php echo $file; ?>"></script>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>
    
</body>