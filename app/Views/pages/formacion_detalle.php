<?php

    if(isset($_SESSION['user'])){
        $registrado = $_SESSION['user'];
    } else {
        $registrado = NULL;
    }
    if(isset($_SESSION['admin'])){
        $admin = $_SESSION['admin'];
    } else {
        $admin = NULL;
    }
    $date = $curso->Fecha;
    $fecha = date("d/m/Y", strtotime($date));


?>
<!-------------------------- NUEVO -------------------------->
<section class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-8 decana mt-5">
            <h3 class="curso-tittle mb-3 text-uppercase"><?= $curso->Nombre ?></h3>
            <h3 class="m-obj text-uppercase fs-1 cblue1 mt-0">Objetivos :</h3>
        </div>
    </div>
</section>

<section class="junta-derecha">
    <div class="container container-curso">
        <div class="row row-cols-2 row-cols-sm-1">
            <div class="col-lg-4 text-white mt-5">
                <a href="<?php echo base_url(),'/'; ?>formacion_detalle" target="_blank" class="text-decoration-none">
                    <div class="cards-curso m-auto" style="margin-top: -8em !important;">
                        <div class="imgBx-curso">
                            <div>
                                <img style="height:350px;" src="<?php echo base_url(),'/'; ?>assets/images/png/curso-cplc-arasaac.jpg">
                            </div>
                        </div>
                        <div class="overlay-curso"></div>
                        <div class="content-curso">
                            <h3 class="text-uppercase fw-bold cgray mt-0"><?= $curso->Nombre ?></h3>

                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-8 text-white mt-5 pb-5" >
                <div style="min-height:200px">
                    <p><?= $curso->Descripcion ?></p>
                </div>
                <div>
                    <a href="<?php echo base_url('registro_curso') . '/' . $curso->Id ?>" class="text-white">
                        <button class="btn btn-primary text-uppercase">APUNTATE</button>
                    </a>

                </div>
            </div>
        </div>
    </div>  
</section>

<section class="banner-curso">
    <div class="container pt-5">
        <div class="row row-cols-lg-3 g-4" >
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-calendar-days me-3"></i>Fecha</h3></div>
                        <h3 class="px-5"><?= $fecha ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-chalkboard-user me-3"></i>Formato</h3></div>
                        <h3 class="px-5"><?= $curso->Formato ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-hourglass-start me-3"></i>Duración</h3></div>
                        <h3 class="px-5"><?= $curso->Duracion ?> horas</h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-clock me-3"></i>Horario</h3></div>
                        <h3 class="px-5"><?= $curso->HorarioInicio ?> - <?= $curso->HorarioFin ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-people-group me-3"></i>Dirigido a</h3></div>
                        <h3 class="px-5"><?= $curso->Dirigido ?></h3>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="text-center">
                        <div class="text-uppercase bg-blue text-white"><h3 class="h-auto d-inline-block my-3 fw-bold"><i class="fa-solid fa-hand-holding-dollar me-3"></i>Precio</h3></div>
                        <h3 class="px-5">Colegiados: <?= $curso->PrecioColegiado ?> euros<br>No colegiados: <?= $curso->PrecioNoColegiado ?> euros</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-cols-lg-1">
            <div class="col decana mt-5 texto-curso-blanco">
                <h3 class="fw-bold cblue2 funciones-curso-blanco">CONTENIDOS</h3>
            </div>
        </div>
    </div>
</section>

<section class="curso-azul">
    <div class="container text-white">
        <div class="row row-cols-2 py-5 align-items-center">

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo1 ?></h3>
                <h6><?= $detalles->Texto1 ?></h6>
            </div>

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo3 ?></h3>
                <h6><?= $detalles->Texto3 ?></h6>    
            </div>

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo5 ?></h3>
                <h6><?= $detalles->Texto5 ?></h6>    
            </div>

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo2 ?></h3>
                <h6><?= $detalles->Texto2 ?></h6>    
            </div>

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo4 ?></h3>
                <h6><?= $detalles->Texto4 ?></h6>    
            </div>

            <div class="col">
                <h3 class="fw-bold"><?= $detalles->Titulo6 ?></h3>
                <h6><?= $detalles->Texto6 ?></h6>    
            </div>

        </div>
    </div>
</section>
<!------------------------------------------------------------>

