<aside class="sidebar" style="min-height: 60vh">
    <div class="nav-side-menu">
        <div class="brand">Menú</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li  data-toggle="" data-target="#colegiados" class="">
                    <a href="<?php echo base_url().'/'; ?>users/datos"><i class="fas fa-users fa-lg"></i> Mis Datos</i></a>
                </li>

                <li data-toggle="" data-target="#service" class="">
                    <a href="<?php echo base_url().'/'; ?>users/documentos"><i class="far fa-calendar-check fa-lg"></i> Mis Documentos</span></a>
                </li>  



                <li data-toggle="collapse" data-target="#cobros" class="collapsed">
                    <a href="#cobros"><i class="fas fa-file-alt fa-lg"></i> Mis Pagos <i class="fa-sharp fa-solid fa-arrow-down"></i></a>
                </li>
                <ul class="sub-menu collapse" id="cobros">
                    <li><a href="<?php echo base_url().'/'; ?>users/pagos_pendientes">Pagos Pendientes</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>users/facturas">Facturas</a></li>
                </ul>


                <li data-toggle="collapse" data-target="#reclamaciones" class="collapsed">
                    <a href="#reclamaciones"><i class="fas fa-exclamation-triangle fa-lg"></i> Mis Reclamaciones</span></a>
                </li>
                <ul class="sub-menu collapse" id="reclamaciones">
                    <li><a href="<?php echo base_url('users/nueva_reclamacion') ?>">Nueva Reclamacion</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>users/reclamaciones">Mis reclamaciones</a></li>
                </ul>

                <li data-toggle="" data-target="#empleo" class="">
                    <a href="<?php echo base_url().'/'; ?>users/empleo"><i class="fas fa-briefcase fa-lg"></i> Ofertas de Empleo</span></a>
                </li>

                <li data-toggle="" data-target="#modalidad" class="">
                    <a href="<?php echo base_url().'/'; ?>users/cambio_modalidad"><i class="fas fa-briefcase fa-lg"></i> Cambio de Modalidad / Baja</span></a>
                </li>

            </ul>
        </div>
    </div>
</aside>
