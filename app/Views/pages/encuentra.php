</div>
    <?php  ?>    

<section class="presentacion p-5 text-left mb-5">
    <div class="container">
        <div class="row align-items-center text-white">
            <div class="col-md-12" id="texto-cabecera">
                <h1 class="mb-3 title-main align-middle text-uppercase">Encuentra tu logopeda</h1>
            </div>
        </div>
    </div>
</section>

<section class="junta" style="margin-bottom: -3em; padding-bottom: 3em;">
    <div class="container text-center">
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

            $sql = "SELECT Colegiado, Nombre, Apellidos, LocalidadTrabajo, Telefono FROM colegiados";
            $result = $conn->query($sql);

            if (!empty($result) && $result->num_rows > 0) {
            echo "<table id='mitabla' style='width:100%'><thead><tr><th>Colegiado</th><th>Nombre</th><th>Apellidos</th><th>Localidad</th><th>Teléfono</th></tr></thead>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["Colegiado"]."</td><td>".$row["Nombre"]."</td><td>".$row["Apellidos"]."</td><td>".$row["LocalidadTrabajo"]."</td><td>".$row["Telefono"]."</td></tr>";
            }
            echo "</table>";
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>
    </div>
</section>
