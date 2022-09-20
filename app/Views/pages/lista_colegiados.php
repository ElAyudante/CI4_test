</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Lista de colegiados</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: 800;">
  	
	<?php echo view('templates/menu_admin'); ?>

    <div class="row">

        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="<?php echo base_url('itemCRUD/create') ?>"> Crear colegiado</a>
            </div>
        </div>

    </div>

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

	<div class="container junta" style="width: 70%; margin-right:2em; margin-top: -52em; margin-bottom: -3em; padding-bottom: 3em;">
    <table id ="mitabla" class="table table-bordered">

        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Acción</th>
            </tr>
        </thead>


        <tbody>
        <?php foreach ($data as $item) { ?>      
            <tr>
                <td><?php echo $item->Nombre; ?></td>
                <td><?php echo $item->Apellidos; ?></td>          
            <td>
            <form method="DELETE" action="<?php echo base_url('itemCRUD/delete/'.$item->Id);?>">
                <a class="btn btn-info" href="<?php echo base_url('itemCRUD/'.$item->Id) ?>"> Mostrar</a>
            <a class="btn btn-primary" href="<?php echo base_url('itemCRUD/edit/'.$item->Id) ?>"> Editar</a>
                <button type="submit" class="btn btn-danger remove"> Eliminar</button>
            </form>
            </td>     
            </tr>
            <?php } ?>
        </tbody>


        </table>
        <div class="pagination-links">
            <?php echo $this->pagination->create_links(); ?>
        </div>

	</div>

</section>
