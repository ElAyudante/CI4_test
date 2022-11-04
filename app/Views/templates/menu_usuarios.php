<aside class="sidebar">
    <div class="nav-side-menu">
        <div class="brand">Menú</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-bs-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list">
            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="<?php echo base_url().'/'; ?>users/datos"><i class="fas fa-users fa-lg me-2"></i> Mis Datos</i></a>
                </li>

                <li>
                    <a href="<?php echo base_url().'/'; ?>users/documentos"><i class="far fa-calendar-check fa-lg me-2"></i> Mis Documentos</i></a>
                </li>  

                <li data-bs-toggle="collapse" data-bs-target="#cobros" class="collapsed">
                    <a href="#cobros"><i class="fas fa-file-alt fa-lg me-2"></i> Mis Pagos <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="cobros">
                    <li><a href="<?php echo base_url().'/'; ?>users/pagos_pendientes">Pagos Pendientes</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>users/facturas">Facturas</a></li>
                </ul>


                <li data-bs-toggle="collapse" data-bs-target="#reclamaciones" class="collapsed">
                    <a href="#reclamaciones"><i class="fas fa-exclamation-triangle fa-lg me-2"></i> Mis Reclamaciones<span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse" id="reclamaciones">
                    <li><a href="<?php echo base_url('users/nueva_reclamacion') ?>">Nueva reclamación</a></li>
                    <li><a href="<?php echo base_url().'/'; ?>users/reclamaciones">Mis reclamaciones</a></li>
                </ul>

                <li data-bs-toggle="" data-target="#empleo" class="">
                    <a href="<?php echo base_url().'/'; ?>users/empleo"><i class="fas fa-briefcase fa-lg me-2"></i> Ofertas de Empleo</span></a>
                </li>

                <li data-bs-toggle="" data-target="#modalidad" class="">
                    <a href="<?php echo base_url().'/'; ?>users/cambio_modalidad"><i class="fas fa-briefcase fa-lg me-2"></i> Cambio de Modalidad / Baja</span></a>
                </li>

            </ul>
        </div>
    </div>
</aside>
