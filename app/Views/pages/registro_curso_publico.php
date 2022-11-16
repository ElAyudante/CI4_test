<?php
$form_att=["class"=> "form-border p-3 bg-white mb-0", ""=>'',];
if(isset($_SESSION['user'])){
    $registrado = $_SESSION['user'];
} else {
    $registrado = NULL;
}

$precio = $curso->PrecioColegiado;
if(isset($registrado)){
            switch($registrado['Ejerciente']){
                case 3:
                    $precio = $curso->PrecioEstudiante;
                    break;
                default:
                    $precio = $curso->PrecioColegiado;
            }}

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

<section class="bg-gray">
  <div class="container p-5">
    <h3 class="p-3 text-white text-uppercase fs-1 bg-blue fw-bold mb-0">Registro de Inscripción</h3>

    <!-- Formularios  Registrados -->


        <?php if(isset($_SESSION['user']) && $precio > '0'){ ?>
            <?php echo form_open('https://sis-t.redsys.es:25443/sis/realizarPago',$form_att); 
                
                include "usuarios/api/apiRedsys.php";  
                $miObj = new RedsysAPI;
            
                $fuc="036421808";
                $terminal="1";
                $moneda="978";
                $trans="0";
                $url=base_url();
                $urlOK=base_url('users/tramitar_pago_curso_ok/'. $curso->Id);
                $urlKO=base_url('users/tramitar_pago_ko');
                $id=time();

                $precio = $curso->PrecioColegiado;

                switch($registrado['Ejerciente']){
                    case 3:
                        $precio = $curso->PrecioEstudiante;
                        break;
                    default:
                        $precio = $curso->PrecioColegiado;
                }

                $amount = $precio *100;
            
                            // Se Rellenan los campos
                $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
                $miObj->setParameter("DS_MERCHANT_ORDER",$id);
                $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
                $miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
                $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
                $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
                $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
                $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);
                $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);
            
                            //Datos de configuración
                $version="HMAC_SHA256_V1";
                $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
                            // Se generan los parámetros de la petición
                $request = "";
                $params = $miObj->createMerchantParameters();
                $signature = $miObj->createMerchantSignature($kc);

                
                
            ?>

            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                <div class="col-lg-12">
                    <strong>Curso</strong>
                    <input type="text" class="form-control" name="nombreCurso" value="<?= $curso->Nombre ?>" autofocus readonly required>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nº Colegiado <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="numColegiado" value="<?= $registrado['Colegiado'] ?>" autofocus readonly required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nombre <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="nombre" value="<?= $registrado['Nombre'] ?>" autofocus readonly required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>Apellidos <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="apellidos" value="<?= $registrado['Apellidos'] ?>" readonly required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>DNI <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="nif" value="<?= $registrado['NIF'] ?>" readonly required>
                    </div>
                </div>

                
                <div class="col">
                    <div class="form-group">
                        <strong>Email <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="email" value="<?= $registrado['Email'] ?>" readonly required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <strong>Teléfono <span class="text-danger">*</span></strong>
                        <input type="number" class="form-control bg-transparent" name="telefono" value="<?= $registrado['Telefono'] ?>" readonly required>
                    </div>
                </div>
                    
                <div class="col">
                    <strong>Comunidad Autónoma <span class="text-danger">*</span></strong>
                    <select id="comunidad" class="form-select bg-transparent" name="comunidad" value="<?= $registrado['Comunidad'] ?>" required>
                        <option disabled selected hidden value="">Comunidad autónoma</option>
                        <?php 
                        foreach ($sel_comunidades as $sel_com => $siglas) {
                            echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Importe <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="importe" value="<?= $precio . ' Euros' ?>" readonly required>
                    </div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Realizar Pago</button>
                    <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                    <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                    <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'>
                </div>

                <div class="col"><p><span class="text-danger"> <strong>(*) Campos Obligatorios</strong></span> </p></div>

            </div>
            <?php echo form_close(); ?>

        
        <?php } elseif (isset($_SESSION['user']) && $precio == '0'){ ?>
            <?php echo form_open('users/registro_curso_usuario',$form_att); ?>
                <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                    <div class="col-lg-12">
                        <strong>Curso </strong>
                        <input type="text" class="form-control" name="nombreCurso" value="<?= $curso->Nombre ?>" autofocus readonly required>
                        <input type="hidden" class="form-control" name="idCurso" value="<?= $curso->Id ?>">
                        <input type="hidden" class="form-control" name="ejerciente" value="<?= $registrado['Ejerciente'] ?>">
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <strong>Nº Colegiado <span class="text-danger">*</span></strong>
                            <input type="text" class="form-control" name="numColegiado" value="<?= $registrado['Colegiado'] ?>" autofocus readonly required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <strong>Nombre <span class="text-danger">*</span></strong>
                            <!--<strong>Nombre <span class="text-danger">*</span></strong>-->
                            <input type="text" class="form-control" id="validationCustom01" name="nombre" value="<?= $registrado['Nombre'] ?>" autofocus readonly required>
                        </div>
                    </div>
                        
                    <div class="col">
                        <div class="form-group">
                            <strong>Apellidos <span class="text-danger">*</span></strong>
                            <input type="text" class="form-control" name="apellidos" value="<?= $registrado['Apellidos'] ?>" readonly required>
                        </div>
                    </div>
                        
                    <div class="col">
                        <div class="form-group">
                            <strong>DNI <span class="text-danger">*</span></strong>
                            <input type="text" class="form-control bg-transparent" name="nif" value="<?= $registrado['NIF'] ?>" readonly required>
                        </div>
                    </div>

                    
                    <div class="col">
                        <div class="form-group">
                            <strong>Email <span class="text-danger">*</span></strong>
                            <input type="text" class="form-control bg-transparent" name="email" value="<?= $registrado['Email'] ?>" readonly required>
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <strong>Teléfono <span class="text-danger">*</span></strong>
                            <input type="number" class="form-control bg-transparent" name="telefono" value="<?= $registrado['Telefono'] ?>" readonly required>
                        </div>
                    </div>
                        
                    <div class="col">
                        <strong>Comunidad Autónoma <span class="text-danger">*</span></strong>
                        <select id="comunidad" class="form-select bg-transparent" name="comunidad" value="<?= $registrado['Comunidad'] ?>" required>
                            <option disabled selected hidden value="">Comunidad autónoma</option>
                            <?php 
                            foreach ($sel_comunidades as $sel_com => $siglas) {
                                echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <strong>Importe <span class="text-danger">*</span></strong>
                            <input type="text" class="form-control bg-transparent" name="importe" value="Sin Coste" readonly required>
                        </div>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Inscribirse</button>
                    </div>

                    <div class="col"><p><span class="text-danger"> <strong>(*) Campos Obligatorios</strong></span> </p></div>

                </div>
            <?php echo form_close() ?>
        <?php } ?>

        <!-- Formularios No Registrados --> 

        <?php if(is_null($registrado) && $curso->PrecioNoColegiado > '0'){ ?>
            <?php echo form_open('#',$form_att); 
                
                include "usuarios/api/apiRedsys.php";  
                $miObj = new RedsysAPI;
            
                $fuc="036421808";
                $terminal="1";
                $moneda="978";
                $trans="0";
                $url=base_url();
                $urlOK=base_url('public/tramitar_pago_curso_ok/'. $curso->Id);
                $urlKO=base_url('public/tramitar_pago_ko');
                $id=time();

                $precio = $curso->PrecioNoColegiado;

                $amount = $precio *100;
            
                            // Se Rellenan los campos
                $miObj->setParameter("DS_MERCHANT_AMOUNT",$amount);
                $miObj->setParameter("DS_MERCHANT_ORDER",$id);
                $miObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc);
                $miObj->setParameter("DS_MERCHANT_CURRENCY",$moneda);
                $miObj->setParameter("DS_MERCHANT_TRANSACTIONTYPE",$trans);
                $miObj->setParameter("DS_MERCHANT_TERMINAL",$terminal);
                $miObj->setParameter("DS_MERCHANT_MERCHANTURL",$url);
                $miObj->setParameter("DS_MERCHANT_URLOK",$urlOK);
                $miObj->setParameter("DS_MERCHANT_URLKO",$urlKO);
            
                            //Datos de configuración
                $version="HMAC_SHA256_V1";
                $kc = 'sq7HjrUOBfKmC576ILgskD5srU870gJ7';//Clave recuperada de CANALES
                            // Se generan los parámetros de la petición
                $request = "";
                $params = $miObj->createMerchantParameters();
                $signature = $miObj->createMerchantSignature($kc);
            ?>

            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                <div class="col-lg-12">
                    <strong>Curso</strong>
                    <input type="text" class="form-control" name="nombreCurso" value="<?= $curso->Nombre ?>" autofocus  required>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nº Colegiado <span class="text-danger"></span></strong>
                        <input type="text" class="form-control" name="numColegiado" autofocus  disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nombre <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="nombre" autofocus  required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>Apellidos <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="apellidos"  required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>DNI <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="nif"  required>
                    </div>
                </div>

                
                <div class="col">
                    <div class="form-group">
                        <strong>Email <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="email"  required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <strong>Teléfono <span class="text-danger">*</span></strong>
                        <input type="number" class="form-control bg-transparent" name="telefono"  required>
                    </div>
                </div>
                    
                <div class="col">
                    <strong>Comunidad Autónoma <span class="text-danger">*</span></strong>
                    <select id="comunidad" class="form-select bg-transparent" name="comunidad"  required>
                        <option disabled selected hidden value="">Comunidad autónoma</option>
                        <?php 
                        foreach ($sel_comunidades as $sel_com => $siglas) {
                            echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Importe <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="importe" value="<?= $curso->PrecioNoColegiado . ' Euros'?>" readonly required>
                    </div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Realizar Pago</button>
                    <input type='hidden' name='Ds_SignatureVersion' value='<?php echo $version; ?>'> 
                    <input type='hidden' name='Ds_MerchantParameters' value='<?php echo $params; ?>'> 
                    <input type='hidden' name='Ds_Signature' value='<?php echo $signature; ?>'>
                </div>

                <div class="col"><p><span class="text-danger"> <strong>(*) Campos Obligatorios</strong></span> </p></div>

            </div>
            <?php echo form_close(); ?>

        <?php } elseif (is_null($registrado) && $curso->PrecioNoColegiado == '0'){ ?>
            <?php echo form_open('public/registro_curso_public',$form_att); ?>
            <div class="row row-cols-lg-4 g-lg-4 cblue text-uppercase">
                <div class="col-lg-12">
                    <strong>Curso </strong>
                    <input type="text" class="form-control" name="nombreCurso" value="<?= $curso->Nombre ?>" autofocus readonly  required>
                    <input type="hidden" class="form-control" name="idCurso" value="<?= $curso->Id ?>">
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nº Colegiado <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="numColegiado"  autofocus  disabled>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Nombre <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="nombre"  autofocus  required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>Apellidos <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control" name="apellidos"   required>
                    </div>
                </div>
                    
                <div class="col">
                    <div class="form-group">
                        <strong>DNI <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="nif"   required>
                    </div>
                </div>

                
                <div class="col">
                    <div class="form-group">
                        <strong>Email <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="email"   required>
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <strong>Teléfono <span class="text-danger">*</span></strong>
                        <input type="number" class="form-control bg-transparent" name="telefono"   required>
                    </div>
                </div>
                    
                <div class="col">
                    <strong>Comunidad Autónoma <span class="text-danger">*</span></strong>
                    <select id="comunidad" class="form-select bg-transparent" name="comunidad" required>
                        <option disabled selected hidden value="">Comunidad autónoma</option>
                        <?php 
                        foreach ($sel_comunidades as $sel_com => $siglas) {
                            echo '<option value="' . $sel_com . '">' . $siglas .'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="col">
                    <div class="form-group">
                        <strong>Importe <span class="text-danger">*</span></strong>
                        <input type="text" class="form-control bg-transparent" name="importe" value="Sin Coste" readonly  required>
                    </div>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block btn-acceso text-uppercase">Inscribirse</button>
                </div>

                <div class="col"><p><span class="text-danger"> <strong>(*) Campos Obligatorios</strong></span> </p></div>

            </div>
            <?php echo form_close() ?>
        <?php } ?>

    </div>
</section>