<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <title>Logopedas</title>
        <link rel="stylesheet" href="<?= base_url() ?>/public/assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url(),'/'; ?>assets/css/style.css">
        <link rel="icon" href="<?=base_url(),'/'?>assets/images/png/favicon.ico" type="image/vnd.microsfot.icon">
        
        <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script src="https://kit.fontawesome.com/fe3a27a4aa.js" crossorigin="anonymous"></script>
    </head>

    <!-- Navigation-->
    <header class="sticky-top">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container">
                <!-- LOGOTIPO DEL NAVEGADOR -->
                <a class="navbar-brand" href="<?php echo base_url(),'/'; ?>home">
                    <img src="<?php echo base_url(),'/'; ?>assets/images/png/logo_header.png" style="height: 60;"></img>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- MENÚ -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-5">
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EL COLEGIO</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>juntagob">JUNTA DE GOBIERNO</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>estatutos">ESTATUTOS</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>codigo">CÓDIGO DEONTOLÓGICO</a>
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">NOTICIAS</a>-->
                            </div>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGOPEDAS</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>acuerdos">ACUERDOS CON EMPRESAS</a>
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>ofertas">OFERTAS</a>-->
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>users/login">FORO</a>-->
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">VIDEONOTICIAS</a>-->
                            </div>
                        </li>
                        <li class="nav-item dropdown me-4">
                            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FORMACIÓN</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>formacion">CURSOS CPLC</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>otroscursos">OTROS CURSOS</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>bono_formacion">CURSOS BONO</a>
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">MÁSTER Y POSTGRADO</a>-->
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(),'/'; ?>faq">PREGUNTAS FRECUENTES</a>
                        </li>
                    </ul>

                    <div class="d-flex align-items-center py-3 justify-content-lg-end">
                        <?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
                            <a href="<?php echo base_url(),'/'; ?>serviciocolegiado" class="alineadobotonmenu btn btn-info px-3 me-2" type="submit">SERVICIOS LOGOPEDAS</a>
                            <a href="<?= base_url('users/logout/logout_success') ?>" class="alineadobotonmenu btn btn-info px-3 me-2" type="submit">SALIR</a>
                        <?php else : ?>
                            <a href="<?php echo base_url(),'/'; ?>alta_nueva" class="alineadobotonmenu me-2" target="_blank">
                                <button type="button" class="btn btn-header">COLÉGIATE</button>
                            </a>
                            <a href="<?php echo base_url(),'/'; ?>users/index_login" class="alineadobotonmenu me-2" target="">
                                <button type="button" class="btn btn-header">ACCESO</button>
                            </a>
                            <a href="<?php echo base_url(),'/'; ?>users/admin" class="alineadobotonmenu" target="">
                                <button type="button" class="btn btn-header btn-lg"><i class="bi bi-shield-lock-fill"></i></button>
                            </a>
                            
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
               


