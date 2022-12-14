<aside class="sidebar">
    <div class="nav-side-menu">
        <div class="brand">Menú</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li  data-toggle="collapse" data-target="#colegiados" class="collapsed active">
                    <a href=""><i class="fas fa-users fa-lg"></i> Colegiados<i class="arrow fas-fa-chevron-right"></i></a>
                </li>
                <ul class="sub-menu collapse" id="colegiados">
                    <li><a href="<?php echo base_url().'/'; ?>itemCRUD/create">Alta Colegiados</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>itemCRUD/pending">Altas Pendientes</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>itemCRUD">Lista Colegiados</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#service"><i class="far fa-calendar-check fa-lg"></i> Cursos/Eventos <span class="arrow"></span></a>
                </li>  
                <ul class="sub-menu collapse" id="service">
                    <li><a href="<?php echo base_url().'/'; ?>alta_curso_evento">Alta Cursos/Eventos</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>lista_cursos_CPLC">Lista Cursos CPLC</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>lista_cursos_ajenos">Lista Cursos Ajenos</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>lista_eventos">Lista Eventos</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#documentos" class="collapsed">
                    <a href="#documentos"><i class="fas fa-file-alt fa-lg"></i> Documentos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="documentos">
                    <li><a href="<?php echo base_url().'/'; ?>crear_documentos">Alta documentos</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>documentos">Lista documentos</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#convenios" class="collapsed">
                    <a href="#convenios"><i class="fas fa-file-alt fa-lg"></i> Convenios <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="convenios">
                    <li><a href="<?php echo base_url().'/'; ?>crear_convenio">Alta convenios</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>lista_convenios">Lista convenios</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#reclamaciones" class="collapsed">
                    <a href="<?php echo base_url().'/'; ?>lista_reclamaciones"><i class="fas fa-exclamation-triangle fa-lg"></i> Reclamaciones <span class="arrow"></span></a>
                </li>

                <li data-toggle="collapse" data-target="#empleo" class="collapsed">
                    <a href="#empleo"><i class="fas fa-briefcase fa-lg"></i> Empleo <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="empleo">
                    <li><a href="<?php echo base_url().'/'; ?>crear_oferta">Alta ofertas</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>lista_oferta">Lista ofertas</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#cobros" class="collapsed"> 
                    <a href="#cobros"><i class="fas fa-money-bill-wave fa-lg"></i> Cobros <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="cobros">
                    <li><a href="<?php echo base_url().'/'; ?>cobros_pendientes">Cobros Pendientes</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>cobros_realizados">Cobros Realizados</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>edit_cuotas">Importe Cuotas</a></li>
                </ul>

                <li data-toggle="collapse" data-target="#salir" class="collapsed">
                    <a href="<?= base_url('users/logout/logout_success') ?>"><i class="fas fa-sign-out-alt fa-lg"></i> Salir <span class="arrow"></span></a>
                </li>
            </ul>
        </div>
    </div>
</aside>
