<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center">
    <div class="container">
        <div class="text-white">
            <h1 class="mb-3 title-main align-middle text-uppercase">Cursos CPLC</h1>
            <p class="mb-3 text-fff subtitulo-presentacion">Cursos Online</p>
        </div>
    </div>
</section>


<section class="container pt-5" style="margin-bottom:10em">
    <blockquote class="blockquote fs-5 cblue1 borderclblue">
        <p>*Incluye a Colegiados del CPLC y otros Colegios de Logopedas. Los colegiados en otros Colegios de Logopedas deben adjuntar documento que lo acredite, por ejemplo: certificado de colegiación o carnet. En el caso de ser estudiantes, adjuntar un documento que lo acredite.</p>
    </blockquote>
</section>

<?php 
    $llave = true;
    foreach ($data as $curso){
    if($llave == true){
?>

<section class="bg-blue3" style="padding-bottom: 8em">
    <div class="container container-curso">
        <div class="row row-cols-lg-2">
            <div class="col-lg-4 text-white mt-5">
                
                <a href="<?php echo base_url(),'/'; ?>formacion_detalle" class="text-decoration-none">
                    <div class="cards-curso m-auto">
                        <div class="imgBx-curso">
                            <div>
                                <img style="height:350px;" src="<?php echo base_url(),'/'; ?>assets/uploads/files/cursos/<?php echo $curso['Archivo']?>">
                            </div>
                        </div>
                        <div class="overlay-curso"></div>
                        <div class="content-curso">
                            <h2 class="text-uppercase fw-bold cgray mt-0"><?= $curso['Nombre'] ?></h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 text-white mt-5">
                <h3 class="section-subheading curso-tittle text-uppercase" style="margin-top: -3.6em !important; margin-bottom:1em; min-height: 84px"><?= $curso['Nombre'] ?></h3>
                <p class="text-justify" style="min-height: 120px"><?= $curso['Descripcion'] ?></p>
                <div class="d-flex justify-content-lg-start justify-content-center pt-4">
                    <a href="<?= base_url('formacion'). '/'.$curso['Id']; ?>" class="text-white">
                        <button class="btn bg-white border border-white text-uppercase btn-bgblue fw-bold cblue" style="width: 150px;">VER CURSO</button>
                    </a>
                </div>
            </div>
        </div>
    </div>  
</section>



<?php 
    }else{
?>

<section class="junta-izquierda" style="padding-bottom: 8em">
    <div class="container container-curso">
        <div class="row row-cols-lg-2">
            <div class="col-lg-8 mt-5 order-lg-1 order-2">
                <h3 style="margin-top: -3.6em !important; margin-bottom:1em; min-height:84px" class="section-subheading curso-tittle-blanco text-uppercase"><?= $curso['Nombre'] ?></h3>
                <p class="text-justify" style="min-height: 120px"><?= $curso['Descripcion'] ?></p>
                <div class="d-flex justify-content-lg-start justify-content-center pt-4">
                    <a href="<?= base_url('formacion'). '/'.$curso['Id']; ?>" class="text-white" >
                        <button class="btn btn-primary text-uppercase">VER CURSO</button>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-white mt-5 order-lg-2 order-1">
                <a href="<?= base_url('formacion/').$curso['Id']; ?>"  class="text-decoration-none">
                    <div class="cards-curso m-auto">
                        <div class="imgBx-curso">
                            <div>
                                <img style="height:350px;" src="<?php echo base_url(),'/'; ?>assets/uploads/files/cursos/<?php echo $curso['Archivo']?>">
                            </div>
                        </div>
                        <div class="overlay-curso"></div>
                        <div class="content-curso">
                            <h2 class="text-uppercase fw-bold cgray mt-0"><?= $curso['Nombre'] ?></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<?php
    }
    $llave = !$llave;
} ?>





