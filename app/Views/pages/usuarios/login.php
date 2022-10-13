
<section class="junta">

    <div class="container-fluid">
        <div class="row">
        
            <div class="col-lg-2 ps-0">
            <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="login-panel panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
                    </h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="<?php echo base_url(); ?>/users/home">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Email" type="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" type="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> Login</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
			