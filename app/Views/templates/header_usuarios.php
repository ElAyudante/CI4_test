<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <title>Logopedas</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/v4-shims.css">
        <link rel="stylesheet" href="<?php echo base_url(),'/'; ?>assets/css/style.css">
        <link rel="icon" href="<?=base_url(),'/'?>assets/images/png/favicon.ico" type="image/vnd.microsfot.icon">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>        
    </head>

    <!-- Navigation-->
    <header>
        <nav class="navbar sticky-top navbar-expand-lg bg-light">
            <div class="container">
                <!-- LOGOTIPO DEL NAVEGADOR -->
                <a class="navbar-brand" href="<?php echo base_url(),'/'; ?>home"><img class="logo_header" src="<?php echo base_url(),'/'; ?>assets/images/png/logo_header.png"></img></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- MEN?? -->
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-5">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url(),'/'; ?>colegio" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EL COLEGIO</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>juntagob">JUNTA DE GOBIERNO</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>estatutos">ESTATUTOS</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>codigo">C??DIGO DEONTOL??GICO</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">NOTICIAS</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url(),'/'; ?>logopedas" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">LOGOPEDAS</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>acuerdos">ACUERDOS CON EMPRESAS</a>
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>ofertas">OFERTAS</a>-->
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>users/login">FORO</a>
                                <!--<a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">VIDEONOTICIAS</a>-->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url(),'/'; ?>mantenimiento" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">FORMACI??N</a>
                            <div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>formacion">CURSOS CPLC</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>otroscursos">OTROS CURSOS</a>
                                <a class="dropdown-item p-3" href="<?php echo base_url(),'/'; ?>mantenimiento">M??STER Y POSTGRADO</a>
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

                            <a href="<?php echo base_url(),'/'; ?>users/home" class="alineadobotonmenu me-2" target="">
                                <button type="button" class="btn btn-header">MI ZONA</button>
                            </a>

                            <a href="<?php echo base_url(),'/'; ?>users/logout" class="alineadobotonmenu me-2" target="">
                                <button type="button" class="btn btn-header">SALIR</button>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
               


