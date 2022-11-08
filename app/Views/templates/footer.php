<body>
    <div id="cookieNotice" class="light display-right" style="display: none;">
        <div id="closeIcon" class="displa-right" style="display: none;">
        </div>
        <div class="title-wrap">
            <h4>Consentimiento de Cookies</h4>
        </div>
        <div class="content-wrap">
            <div class="msg-wrap">
                <p>Este sitio web utiliza cookies o tecnologías similares para mejorar su experiencia de navegación y brindar recomendaciones personalizadas. Si continúa utilizando nuestro sitio web, acepta nuestra <a style="color:#115cfa;" href="<?php echo base_url(),'/'; ?>privacidad">Política de Privacidad</a></p>
                <div class="btn-wrap">
                    <button class="btn-primary text-white" onclick="acceptCookieConsent();">Aceptar</button>
                </div>
            </div>
        </div>
    </div>

    <footer class="section bg-footer py-5">
        <div class="container">
            <div class="row row-cols-lg-4 g-5">

                <div class="col m-auto">
                    <div class="d-flex justify-content-center p-5">
                        <img class="img-fluid w-75" src="<?php echo base_url(),'/'; ?>assets/images/png/CPLC_IMAGOTIPO_VERT_BALNCO.png"></img>
                    </div>
                </div>

                <div class="col m-auto">
                    <h4 class="fw-bold footer-heading text-uppercase text-white">Recursos</h4>
                    <ul class="list-unstyled footer-link">
                        <!--<li><a class="text-white" href="<?php echo base_url(),'/'; ?>home" target="_blank">Inicio</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>faq" target="_blank">FAQ</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>forum/index" target="_blank">Foro</a></li>-->
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>users/login" target="_blank">Accede</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>users/register" target="_blank">Date de alta</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>codigo" target="_blank">Código Deontológico</a></li>
                    </ul>
                </div>

                <div class="col m-auto">
                    <h4 class="fw-bold footer-heading text-uppercase text-white">Contáctanos</h4>
                    <ul class="list-unstyled footer-link">
                        <li><a class="contact-info text-white" href="tel:+34942052099"><i class="fa-solid fa-phone-volume me-2"></i>942 052 099</a></li>
                        <li><a class="contact-info text-white" href="mailto:colegio@logopedascantabria.org"><i class="fa-solid fa-envelope me-2"></i>colegio@logopedascantabria.org</a></li>
                        <li><a class="contact-info text-white"href="https://goo.gl/maps/a8YW6QwVmth6W6Dq7" target="_blank"><i class="fa-solid fa-location-dot me-2"></i>Dirección física</a></li>
                    </ul>
                    <!--<div class="">
                        <ul class="list-inline">
                            <li><a href="https://es-es.facebook.com/colegiologopedascantabria/" target="_blank"><i class="fab facebook footer-social-icon fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="https://es.linkedin.com/in/colegio-logopedas-cantrabria-592675154" target="_blank"><i class="fab linkedin footer-social-icon fa-linkedin-in"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:colegio@logopedascantabria.org" target="_blank"><i class="fas mail footer-social-icon fa-envelope"></i></a></li>
                            <li class="list-inline-item"><a href="https://goo.gl/maps/a8YW6QwVmth6W6Dq7" target="_blank"><i class="fas place footer-social-icon fa-location-arrow"></i></a></li>
                        </ul>
                    </div>-->
                </div>

                <div class="col m-auto">
                    <div class="d-flex justify-content-center">
                        <a href="https://santanderapunto.es/" target="_blank"><img class="img-fluid" src="<?php echo base_url(),'/'; ?>assets/images/png/santander.png"></img></a>
                    </div>
                    <!--<h6 class="fw-bold footer-heading text-uppercase text-white">Ayuda</h6>
                    <ul class="list-unstyled footer-link mt-4">
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>users/register" target="_blank">Date de alta</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>users/login" target="_blank">Accede</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>aviso" target="_blank">Aviso Legal</a></li>
                        <li><a class="text-white" href="<?php echo base_url(),'/'; ?>privacidad" target="_blank">Política de Privacidad</a></li>
                    </ul>-->
                </div>

                <div class="col-lg-12 m-auto">
                    <div class="d-flex align-items-center justify-content-center my-3">
                        <p class="text-white mb-0 pe-2">Sigue nuestros contenidos de actualidad en:</p>
                        <a href="https://es-es.facebook.com/colegiologopedascantabria/" target="_blank"><img class="me-2" src="assets/images/png/facebook.png"></a>
                        <a href="https://es.linkedin.com/in/colegio-logopedas-cantrabria-592675154" target="_blank"><img class="" src="assets/images/png/linkedin.png"></a>
                    </div>
                </div>

                <div class="col-lg-12 d-flex justify-content-center m-auto">
                    <p class="mb-0"><a class="text-white text-decoration-none" href="<?php echo base_url(),'/'; ?>aviso" target="_blank">Aviso Legal</a> |</p>
                    <p class="mb-0"><a class="text-white text-decoration-none" href="<?php echo base_url(),'/'; ?>privacidad" target="_blank">&nbsp;Política de Privacidad</a> |</p>
                    <p class="mb-0"><a class="text-white text-decoration-none" href="<?php echo base_url(),'/'; ?>sitemap" target="_blank">&nbsp; SiteMap</a> |</p>
                    <p class="mb-0">&nbsp; &copy; <?php echo date("Y"); ?> Desarrollado por <a class="text-white text-decoration-none" href="https://www.elayudante.es/" target="_blank">ElAyudante</a></p>
                </div>

            </div>
        </div>
    </footer>

    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url('assets/js/cookie_consent.js'); ?>"></script>
    <a href="javascript:void(0);" id="scroll" title="Ir arriba" style="display: none;">Top<span></span></a>
</body>

    <script>
       $(document).ready(function() {
            $('#mitabla').DataTable( {
                columnDefs: [ {
                    targets: [ 0 ],
                    orderData: [ 0, 1 ]
                }, {
                    targets: [ 1 ],
                    orderData: [ 1, 0 ]
                }, {
                    targets: [ 3 ],
                    orderData: [ 3, 0 ]
                } ],
                language: {
                    "decimal":        "",
                    "emptyTable":     "No hay datos",
                    "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered":   "(Filtro de _MAX_ total registros)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing":     "Procesando...",
                    "search":         "Buscar:",
                    "zeroRecords":    "No se encontraron coincidencias",
                    "paginate": {
                        "first":      "Primero",
                        "last":       "Ultimo",
                        "next":       "Próximo",
                        "previous":   "Anterior"
                    },
                    "aria": {
                        "sortAscending":  ": Activar orden de columna ascendente",
                        "sortDescending": ": Activar orden de columna desendente"
                    }
                }
            } );
        } );
    </script>
    <!--================================= SCROLL ============================================-->
    <script>
        $(document).ready(function(){ 
            $(window).scroll(function(){ 
                if ($(this).scrollTop() > 100) { 
                    $('#scroll').fadeIn(); 
                } else { 
                    $('#scroll').fadeOut(); 
                } 
            }); 
            $('#scroll').click(function(){ 
                $("html, body").animate({ scrollTop: 0 }, 600); 
                return false; 
            }); 
        });
    </script>
    <!--=====================================================================================-->
    
    <script>
    // Get the modal
    var modal = document.getElementById("myModal1");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn1");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal2");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn2");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal3");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn3");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

    <script>
    // Get the modal
    var modal = document.getElementById("myModal4");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn4");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>

<script>
    // Get the modal
    var modal = document.getElementById("myModal5");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn5");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal6");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn6");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal7");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn7");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal8");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn8");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal9");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn9");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal0");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn0");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal11");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn11");


    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
    modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
    modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
    }
    </script>
</html>
