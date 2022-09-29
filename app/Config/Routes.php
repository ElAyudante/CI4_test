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

    $routes->get('/', 'Home::index');

    $routes->get('users', 'users::index');
    $routes->get('users/(:any)/edit', 'users::edit/$1');
    $routes->get('users/(:any)/delete', 'users::delete/$1');
    $routes->get('users/login', 'users::login');
    $routes->get('users/admin/login', 'admin::login');
    $routes->get('users/register', 'users::register');
    $routes->get('users/logout', 'users::logout');
    $routes->get('users/profile/edit', 'users::edit');

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

    $routes->get('create_forum', 'forum::create_forum');
    $routes->get('topic/create', 'forum::create_topic');
    $routes->get('(:any)/create_topic', 'forum::create_topic/$1');
    $routes->get('topic/(:any)/(:any)', 'forum::topic/$1/$2');
    $routes->get('(:any)/(:any)/reply', 'forum::create_post/$1/$2');

    $routes->add('itemCRUD', "itemCRUD::lista_colegiados");
    $routes->get('itemCRUD/(:num)', "itemCRUD");
    $routes->get('itemCRUDShow/(:any)', "itemCRUD::show/$1");
    $routes->get('itemCRUD/create', "itemCRUD::create");
    $routes->get('itemCRUD/edit/(:any)', "itemCRUD::edit/$1");
    $routes->get('itemCRUDUpdate/(:any)', "itemCRUD::update/$1");
    $routes->get('itemCRUDDelete/(:any)', "itemCRUD::delete/$1");

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

    $routes->get('crear_curso_cpcl', 'itemCRUD::create_cursos');
    $routes->get('cursos_CPLC', 'itemCRUD::listar_cursos_CPLC');
    $routes->get('cursos_ajenos', 'itemCRUD::listar_cursos_ajenos');

    $routes->get('paypal/success/(:any)', 'paypal::success/$1');
    $routes->get('(:any)', 'pages::view/$1');
