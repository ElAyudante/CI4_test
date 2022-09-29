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

<section class="junta" >
  	
    <div class="col-lg-2 ps-0">
        <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
    </div>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url('itemCRUD/create') ?>"> Crear colegiado</a>
            </div>
        </div>
    </div>

    <div class="container junta" style="position: relative; top: -870px; left: 100px">
            
        <div> <?php echo $output; ?> </div>
        <?php foreach($js_files as $file): ?>
            <script src="<?php echo $file; ?>"></script>
        <?php endforeach; ?>

    </div>
    <!--
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
    -->
	
</section>
    
</body>