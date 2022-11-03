<?php

    namespace Config;

    $routes = Services::routes();

    if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
        require SYSTEMPATH . 'Config/Routes.php';
    }

    $routes->setDefaultNamespace('App\Controllers');
    $routes->setDefaultController('home');
    $routes->setDefaultMethod('index');
    $routes->setTranslateURIDashes(false);
    $routes->setAutoRoute(false);


    if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
        require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
    }


    /*
    $routes->get('users', 'users::index');
    $routes->get('users/(:any)/edit', 'users::edit/$1');
    $routes->get('users/(:any)/delete', 'users::delete/$1');
    $routes->get('users/login', 'users::login');
    
    $routes->get('users/register', 'users::register');
    $routes->get('users/logout', 'users::logout');
    $routes->get('users/profile/edit', 'users::edit');
    */

    $routes->get('alta_nueva', 'itemCRUD::alta_nueva');

    $routes->get('users/index_login', 'itemCRUD::index_login');
    $routes->post('users/login', 'itemCRUD::login');
    $routes->get('users/home', 'itemCRUD::home_login');
    $routes->post('users/home', 'itemCRUD::home_login');
    $routes->get('users/logout', 'itemCRUD::logout');
    $routes->get('users/documentos', 'itemCRUD::listar_documentos_usuarios');
    $routes->get('users/datos', 'itemCRUD::home_login');
    $routes->get('users/documentos/(:any)', "itemCRUD::mostrar_documento/$1");
    $routes->get('users/empleo', 'itemCRUD::listar_empleos_usuarios');
    $routes->get('users/empleo/(:any)', "itemCRUD::mostrar_ofertas/$1");
    $routes->get('users/reclamaciones', 'itemCRUD::listar_reclamaciones');
    $routes->get('users/reclamaciones/(:any)', "itemCRUD::mostrar_reclamaciones/$1");
    $routes->get('users/nueva_reclamacion', 'itemCRUD::nueva_reclamacion');
    $routes->post('users/crear_reclamacion', 'itemCRUD::crear_reclamacion');

    $routes->get('lista_reclamaciones', 'itemCRUD::listar_reclamaciones_ADMIN');
    $routes->get('lista_reclamaciones/edit/(:any)', 'itemCRUD::edit_reclamacion/$1');
    $routes->get('lista_reclamaciones/delete/(:any)', 'itemCRUD::delete_reclamacion/$1');
    $routes->post('itemCRUD/responder_reclamacion', 'itemCRUD::responder_reclamacion');


    $routes->get('users/admin', 'itemCRUD::index_admin_login');
    $routes->post('users/admin/login', 'itemCRUD::admin_login');
    $routes->get('users/admin/logout', 'itemCRUD::admin_logout');

    $routes->post('itemCRUD/payment_advance', 'itemCRUD::payment_advance');
    $routes->get('cobros_pendientes', 'itemCRUD::cobros_pendientes');
    $routes->get('cobros_realizados', 'itemCRUD::cobros_realizados');
    $routes->get('edit_cuotas', 'itemCRUD::edit_cuotas');
    $routes->post('itemCRUD/update_cuotas', 'itemCRUD::update_cuotas');


    $routes->get('crear_oferta', 'itemCRUD::register_empleo');
    $routes->get('lista_oferta', 'itemCRUD::listar_ofertas');
    $routes->post('itemCRUD/store_empleo', 'itemCRUD::store_empleo');
    $routes->post('itemCRUD/update_empleo', 'itemCRUD::update_empleo');
    $routes->get('lista_oferta/delete/(:any)', 'itemCRUD::delete_empleo/$1');
    $routes->get('itemCRUD/store_empleo/delete/(:any)', 'itemCRUD::delete_empleo/$1');
    $routes->get('itemCRUD/update_empleo/delete/(:any)', 'itemCRUD::delete_empleo/$1');
    $routes->get('lista_oferta/edit/(:any)', 'itemCRUD::edit_empleo/$1');
    $routes->get('itemCRUD/store_empleo/edit/(:any)', 'itemCRUD::edit_empleo/$1');
    $routes->get('itemCRUD/update_empleo/edit/(:any)', 'itemCRUD::edit_empleo/$1');

    $routes->get('crear_convenio', 'itemCRUD::crear_convenio');
    $routes->post('itemCRUD/store_convenio', 'itemCRUD::store_convenio');
    $routes->post('itemCRUD/update_convenio', 'itemCRUD::update_convenio');
    $routes->get('lista_convenios', 'itemCRUD::listar_convenios');
    $routes->get('lista_convenios/edit/(:any)', 'itemCRUD::edit_convenio/$1');
    $routes->get('lista_convenios/delete/(:any)', 'itemCRUD::delete_convenio/$1');

    $routes->get('itemCRUD', "itemCRUD::home_admin_login");
    $routes->post('itemCRUD', "itemCRUD::home_admin_login");
    $routes->get('itemCRUD/pending', "itemCRUD::lista_colegiados_pending");
    $routes->get('itemCRUD/(:num)', "itemCRUD");
    $routes->get('itemCRUDShow/(:any)', "itemCRUD::show/$1");
    $routes->get('itemCRUD/create', "itemCRUD::create");
    $routes->get('itemCRUD/edit/(:any)', "itemCRUD::edit/$1");
    $routes->get('itemCRUD/pending/edit/(:any)', "itemCRUD::edit_pendiente/$1");
    $routes->get('itemCRUD/pending/delete/(:any)', "itemCRUD::delete/$1");
    $routes->post('itemCRUD/update/(:any)', "itemCRUD::update/$1");
    $routes->post('itemCRUD/update_pendiente/(:any)', "itemCRUD::update_pendiente/$1");
    $routes->get('itemCRUD/delete/(:any)', "itemCRUD::delete/$1");

    $routes->get('crear_documentos', 'itemCRUD::create_documentos');
    $routes->get('documentos', 'itemCRUD::listar_documentos');
    $routes->post('itemCRUD/store_documento', 'itemCRUD::store_documento');
    $routes->post('itemCRUD/update_documento', 'itemCRUD::update_documento');
    $routes->get('documentos/delete/(:any)', 'itemCRUD::delete_documento/$1');
    $routes->get('itemCRUD/store_documento/delete/(:any)', 'itemCRUD::delete_documento/$1');
    $routes->get('itemCRUD/update_documento/delete/(:any)', 'itemCRUD::delete_documento/$1');
    $routes->get('documentos/edit/(:any)', 'itemCRUD::edit_documento/$1');
    $routes->get('itemCRUD/store_documento/edit/(:any)', 'itemCRUD::edit_documento/$1');
    $routes->get('itemCRUD/update_documento/edit/(:any)', 'itemCRUD::edit_documento/$1');

    $routes->get('alta_cursos_eventos', 'itemCRUD::create_curso_evento');


    $routes->get('paypal/success/(:any)', 'paypal::success/$1');
    $routes->get('(:any)', 'pages::view/$1');

    $routes->get('create_forum', 'forum::create_forum');
    $routes->get('topic/create', 'forum::create_topic');
    $routes->get('(:any)/create_topic', 'forum::create_topic/$1');
    $routes->get('topic/(:any)/(:any)', 'forum::topic/$1/$2');
    $routes->get('(:any)/(:any)/reply', 'forum::create_post/$1/$2');