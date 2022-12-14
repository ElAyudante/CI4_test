</div>

<section class="presentacion p-5 text-left">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Lista de colegiados</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta app" style="margin-top: 2.1em; margin-bottom: -5.1em; height: 800;">

	<?php echo view('templates/menu_admin'); ?>

	<div class="container junta" style="width: 70%; margin-right:2em; margin-top: -52em; margin-bottom: -3em; padding-bottom: 3em;">
		<br>
        <br>
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

            $sql = "SELECT Colegiado, Sociedad, Provincia, Telefono, FechaAlta FROM sociedades";
            $result = $conn->query($sql);

            if (!empty($result) && $result->num_rows > 0) {
            echo "<table id='mitabla' style='width:100%'><thead><tr><th>Colegiado</th><th>Nombre</th><th>Apellidos</th><th>Localidad</th><th>Teléfono</th></tr></thead>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Colegiado"]."</td><td>".$row["Sociedad"]."</td><td>".$row["Provincia"]."</td><td>".$row["Telefono"]."</td><td>".$row["FechaAlta"]."</td></tr>";
            }
            echo "</table>";
            } else {
            echo "Sin resultados";
            }
            $conn->close();
        ?>
	</div>

</section>
