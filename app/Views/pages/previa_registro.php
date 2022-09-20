<section class="presentacion p-5 text-lg-start text-center d-flex align-items-center">
    <div class="container">
        <div class="text-white">
            <h1 class="mb-3 title-main align-middle text-uppercase">Colégiate</h1>
            <p class="mb-3 text-fff subtitulo-presentacion">Confirma tu inscripción</p>
        </div>
    </div>
</section>

<section class="">
    <div class="container p-5">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $dbname = "logopedas";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Nombrecurso, Nombre, Apellidos, NIF, Direccion, Localidad, CP, Provincia, Telefono, Email, Ncolegiado, Colegio, Ammount FROM formacion_detalle ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            // Se incluye la librería
            include 'apiRedsys.php';
            // Se crea Objeto
            $miObj = new RedsysAPI;

            // Valores de entrada que no hemos cmbiado para ningun ejemplo
            $fuc="036421808";
            $terminal="1";
            $moneda="978";
            $trans="0";
            $url="";
            $urlOK="https://localhost/logopedas_dos/exito_compra";
            $urlKO="https://localhost/logopedas_dos/formacion_detalle";
            $id=time();
            $amount= $_POST['ammount'] * 100;	
            
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
            $kc = '3yc8FfYYrY+lcQSLvJF2mRCiTVpOXNgv';//Clave recuperada de CANALES
            // Se generan los parámetros de la petición
            $request = "";
            $params = $miObj->createMerchantParameters();
            $signature = $miObj->createMerchantSignature($kc);

            if (!empty($result) && $result->num_rows > 0) {
                echo "<h1 class='cblue'>Estos son los datos de tu inscripción</h1>";
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li>Nombre del curso: ".$row["Nombrecurso"]."</li>";
                    echo "<li>Nombre: ".$row["Nombre"]."</li>";
                    echo "<li>Apellidos: ".$row["Apellidos"]."</li>";
                    echo "<li>DNI: ".$row["NIF"]."</li>";
                    echo "<li>Dirección: ".$row["Direccion"]."</li>";
                    echo "<li>Localidad: ".$row["Localidad"]."</li>";
                    echo "<li>CP: ".$row["CP"]."</li>";
                    echo "<li>Provincia: ".$row["Provincia"]."</li>";
                    echo "<li>Telefono: ".$row["Telefono"]."</li>";
                    echo "<li>Email: ".$row["Email"]."</li>";
                    echo "<li>Número de colegiado: ".$row["Ncolegiado"]."</li>";
                    echo "<li>Colegio: ".$row["Colegio"]."</li>";
                    echo "<li>Precio del curso: ".$row["Ammount"]."</li>";
                }
                    echo "</ul>";
                } else {
                    echo "Sin resultados";
            }
            $conn->close();
        ?>
        <form name="frm" action="https://sis.redsys.es/sis/realizarPago" method="POST" target="_blank">
            <input type="text" name="Ds_SignatureVersion" value="<?php echo $version; ?>" style="display:none;"/>
            <input type="text" name="Ds_MerchantParameters" value="<?php echo $params; ?>" style="display:none;"/>
            <input type="text" name="Ds_Signature" value="<?php echo $signature; ?>" style="display:none;"./>
            <input type="submit" class="btn-primary" value="Confirmar" >
        </form>
    </div>
</section>
