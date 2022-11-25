<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> 
        <title>Logopedas</title>
        <!--<link rel="stylesheet" href="<?= base_url() ?>/public/assets/grocery_crud/themes/bootstrap-v4/css/bootstrap/bootstrap.min.css">
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
        <script src="https://kit.fontawesome.com/fe3a27a4aa.js" crossorigin="anonymous"></script>-->
</head>
<body>
    <section class="letter container p-5 w-50" style="width: 30%!important; padding: 3rem!important; margin: auto;">

        <div class="bg-blue d-flex justify-content-center p-4" style="background-color: #156ac0 !important; display: flex!important; justify-content: center!important; padding: 1.5rem!important;">
            <img src="cid:<?= $cid2 ?>" class="img-fluid" style="height:100px; max-width: 100%;">
        </div>
        <div class="bg-gray text-justify p-5" style="background-color: #eeeeee !important; text-align: justify; padding: 3rem!important;">
            <h1 class="text-uppercase fw-bold mb-4" style="text-align: center; font-size: 2rem; font-family: 'Roboto', sans-serif; text-transform: uppercase!important; font-weight: 700!important; margin-bottom: 1.5rem!important;"><img src="cid:<?= $cid ?>" style="height:40px" alt="">El Usuario <?= $msg ?> ha actualizado sus datos personales<img src="cid:<?= $cid ?>" style="height:40px" alt=""></h1>
            <!--<p style="font-family: 'Roboto', sans-serif; margin-top: 0; margin-bottom: 1rem;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue ex, viverra nec sapien sit amet, ultrices maximus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent felis metus, congue suscipit hendrerit molestie, ultrices a ligula. Fusce scelerisque elit leo. Quisque a fermentum libero. Praesent mattis accumsan eros et bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin viverra accumsan nibh, quis porta dui ultricies finibus. Cras in tincidunt justo. Morbi ac nunc vestibulum, tempor lectus sed, tempor leo. Maecenas sagittis enim id est porta iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>-->
            <div class="d-flex justify-content-center mt-5" style="display: flex!important; justify-content: center!important; margin-top: 3rem!important;">
                <a href="<?php echo base_url(),'/'; ?>users/index_login" target="_blank">
                    <button class="btn btn-primary text-uppercase" style="border-radius: 0.375rem; border-width: 1px; padding: 0.375rem 0.75rem; color: white; text-transform: uppercase!important; background-color: #004987; border-color: #004987 !important; font-weight: 900; width: 150px;">Log in</button>
                </a>                    
            </div>

        </div>
        <div class="bg-footer p-4" style="background-image: linear-gradient(#004987, #00a0df ); padding: 1.5rem!important">
            <div class="d-flex align-items-center justify-content-center my-3" style="display: flex!important; align-items: center!important; justify-content: center!important; margin-top: 1rem!important; margin-bottom: 1rem!important;">
                <p class="text-white mb-0 pe-2" style="margin-top: 0; font-family: 'Roboto', sans-serif; color: white !important; margin-bottom: 0!important; padding-right: 0.5rem!important;">Sigue nuestros contenidos de actualidad en:</p>
                <a href="https://es-es.facebook.com/colegiologopedascantabria/" target="_blank"><img class="me-2" style="margin-right: 0.5rem!important;" src="cid:<?= $cid3 ?>"></a>
                <a href="https://es.linkedin.com/in/colegio-logopedas-cantrabria-592675154" target="_blank"><img src="cid:<?= $cid4 ?>"></a>
            </div>
        </div>
        <p>HORARIO SEDE COLEGIAL:
 
 Lunes y Jueves de 17 a 20h.
 Martes y Miércoles de 10 a 13h.
 
 
 
 
 AVISO LEGAL: Este mensaje y sus archivos adjuntos van dirigidos
 exclusivamente a su destinatario, pudiendo contener información confidencial
 sometida a secreto profesional. No está permitida su comunicación,
 reproducción o distribución sin autorización expresa. Si usted no es el
 destinatario final, por favor elimínelo e infórmenos por esta vía.
 PROTECCIÓN DE DATOS: De conformidad con lo dispuesto en la normativa de
 protección de datos personales, Reglamento (UE) 2016/679, le informamos que
 los datos personales y dirección de correo electrónico, serán tratados por
 COLEGIO PROFESIONAL DE LOGOPEDAS DE CANTABRIA con la finalidad de gestionar
 nuestra agenda de contactos, atender sus solicitudes por vía electrónica así
 como a efectos históricos. Los datos se tratarán en base a su
 consentimiento, ejecución de un contrato, o el cumplimiento de obligaciones
 legales y los intereses legítimos de COLEGIO PROFESIONAL DE LOGOPEDAS DE
 CANTABRIA. El plazo de conservación de los datos será el establecido en la
 normativa aplicable, como mínimo. Puede contactar con el responsable, así
 como ejercer los derechos de acceso, rectificación, supresión, portabilidad
 de datos, limitación, oposición y revocación del consentimiento en C/
 Calderón de la Barca ,15 Ppal Izq. Of. 4 39002, SANTANDER CANTABRIA. Tienen
 derecho a realizar una reclamación ante las autoridades de protección de
 datos. Para más información consulte la política de privacidad en
 www.logopedascantabria.org</p>
    </section>
    







    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>
</html>