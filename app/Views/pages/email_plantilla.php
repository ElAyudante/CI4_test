<!DOCTYPE html>
<html lang="en">
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
<body>
    <section class="letter container p-5 w-50">
        <div class="header-letter bg-blue d-flex justify-content-center p-4">
            <img src="cid:<?= $cid2 ?>" class="img-fluid" style="height:100px">
        </div>
        <div class="body-letter bg-gray text-justify p-5">
            <h2 class="text-uppercase fw-bold mb-4"><img src="cid:<?= $cid ?>" style="height:40px" alt="">Se añadió un nuevo Pokemon <img src="cid:<?= $cid ?>" style="height:40px" alt=""></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue ex, viverra nec sapien sit amet, ultrices maximus eros. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent felis metus, congue suscipit hendrerit molestie, ultrices a ligula. Fusce scelerisque elit leo. Quisque a fermentum libero. Praesent mattis accumsan eros et bibendum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin viverra accumsan nibh, quis porta dui ultricies finibus. Cras in tincidunt justo. Morbi ac nunc vestibulum, tempor lectus sed, tempor leo. Maecenas sagittis enim id est porta iaculis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
            <div class="d-flex justify-content-center mt-5">
                <a href="<?php echo base_url(),'/'; ?>users/index_login" class="text-white" target="_blank">
                    <button class="btn btn-primary text-uppercase">Log in</button>
                </a>                    
            </div>

        </div>
        <div class="footer-letter bg-footer p-4">
            <div class="d-flex align-items-center justify-content-center my-3">
                <p class="text-white mb-0 pe-2">Sigue nuestros contenidos de actualidad en:</p>
                <a href="https://es-es.facebook.com/colegiologopedascantabria/" target="_blank"><img class="me-2" src="cid:<?= $cid3 ?>"></a>
                <a href="https://es.linkedin.com/in/colegio-logopedas-cantrabria-592675154" target="_blank"><img src="cid:<?= $cid4 ?>"></a>
            </div>
        </div>
    </section>
    







    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.bundle.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/assets/grocery_crud/themes/bootstrap-v4/js/bootstrap/bootstrap.min.js')?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>
</html>