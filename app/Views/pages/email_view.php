<?php
$sel_comunidades =  array (
    'Anadalucia' => 'Andalucia',
    'Aragon' => 'Aragón',
    'Asturias' => 'Asturias',
    'Baleares' => 'Baleares',
    'Canarias' => 'Canarias',
    'Cantabria' => 'Cantabria',
    'Castilla La Mancha' => 'Castilla La Mancha',
    'Castilla Leon' => 'Catilla León',
    'Cataluña' => 'Cataluña',
    'Ceuta' => 'Ceuta',
    'Comunidad Valenciana' => 'Comunidad Valenciana',
    'Extremadura' => 'Extremadura',
    'Galicia' => 'Galicia',
    'La Rioja' => 'La Rioja',
    'Madrid' => 'Madrid',
    'Melilla' => 'Melilla',
    'Navarra' => 'Navarra',
    'Pais Vasco' => 'País Vasco',
    'Murcia' => 'Región de Murcia'
  )
?>

<section class="junta">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 ps-0">
                <?php echo view('templates/menu_admin'); ?> <!-- MENU ADMIN.PHP -->
            </div>

            <div class="col-lg-10">
                <div class="container p-5">
                    <?php  ?>

                    <?php echo form_open('users/register_sociedad'); ?>
                        <div class="row">
                        <?php if (validation_errors()) : ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= validation_errors() ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($error)) : ?>
                            <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                    <?= $error ?>
                                </div>
                            </div>
                        <?php endif; ?>
                <?php if (isset($success)) : ?>
                            <div class="col-md-12">
                                <div class="alert alert-success" role="alert">
                                    <?= $success ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <h3 style="color: #004987; text-transform: uppercase; font-size:3em">Enviar mensaje</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="asunto" placeholder="Asunto" autofocus>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="mensaje" placeholder="Mensaje"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 form-group">
                            <div class="custom-file">
                            <label class="custom-file-label" for="customFile">Archivo adjunto</label>
                                <input type="file" class="custom-file-input"  name="archivo" id="customFile">                    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h4 style="color: #004987; text-transform: uppercase">Destinatarios</h4>
                        <div class="col-md-2 form-group">
                            <select id="comunidad" class="form-control bg-transparent" name="comunidad">
                                <option selected value="0">Comunidad autónoma</option>
                                <?php 
                                foreach ($sel_comunidades as $sel_com => $siglas) {
                                    echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <select id="comunidad" class="form-control bg-transparent" name="ejercientes">
                                <option selected value="">Ejercientes</option>
                                <option value="todos" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="todos")  echo "selected";?>>Todos</option>	
                                <option value="1" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="1")  echo "selected";?>>Ejercientes</option>	
                                <option value="0" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="0")  echo "selected";?>>No ejercientes</option>	
                                <option value="2" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="2")  echo "selected";?>>Jubilados</option>	
                                <option value="3" <?php if(isset($_GET["ejercientes"]) && $_GET["ejercientes"]=="3")  echo "selected";?>>Estudiantes</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <select id="comunidad" class="form-control bg-transparent" name="bolsa">
                                <option selected value="">Bolsa de trabajo</option>
                                <option value="todos"  <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="todos")  echo "selected";?>>Todos</option>	
                                <option value="1" <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="1")  echo "selected";?>>Apuntados</option>	
                                <option value="0" <?php if(isset($_GET["bolsa"]) && $_GET["bolsa"]=="0")  echo "selected";?>>No apuntados</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <select id="comunidad" class="form-control bg-transparent" name="sector">
                                <option selected value="">Sector</option>
                                <option value="todos" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="todos")  echo "selected";?>>Todos</option>	
                                <option value="1" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="1")  echo "selected";?>>Publico</option>	
                                <option value="0" <?php if(isset($_GET["sector"]) && $_GET["sector"]=="0")  echo "selected";?>>Privado</option>	
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <select id="comunidad" class="form-control bg-transparent" name="diplomados">
                                <option selected value="">Titulación</option>
                                <option value="todos" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="todos")  echo "selected";?>>Todos</option>	
                                <option value="1" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="1")  echo "selected";?>>Con diplomatura</option>	
                                <option value="0" <?php if(isset($_GET["diplomados"]) && $_GET["diplomados"]=="0")  echo "selected";?>>Habilitados</option>	
                            </select>
                        </div>
                        <div>
                            <input type = "email" name = "email" required />
                            <input type = "textarea" name = "subject" placeholder="asunto"/>
                            <input type = "submit" value = "SEND MAIL">
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


