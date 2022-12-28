<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personas</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header>
        <?php
        include('menu.php')
        ?>

    </header>
    <?php
    include 'db.php';
    $conexiondb = conectardb();
    $query_v = "SELECT * FROM vacuna";
    $query_m = "SELECT * FROM mascota";
    $query_c = "SELECT * FROM cliente";
    $resultado_v = mysqli_query($conexiondb, $query_v);
    $resultado_m = mysqli_query($conexiondb, $query_m);
    $resultado_c = mysqli_query($conexiondb, $query_c);
    mysqli_close($conexiondb);
    ?>

    <div class="container center">
        <div class="row">
            <div class="col-md-4 mt-3">
                <?php
                if (isset($_COOKIE['message'])) {
                    echo "<div class='alert " . $_COOKIE['alert'] . " alert-dismissible fade show' role='alert'>";
                    echo $_COOKIE['message'];
                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                    echo "</div>";
                    setcookie('message', '', 1);
                    setcookie('alert', '', 1);
                }
                ?>
            </div>

                <div class="rows-sm-6">
                    <h1 class="text-center mt-4">Listado de Mascotas</h1>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha_nacimiento</th>
                                <th scope="col">Raza</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            while ($paciente = mysqli_fetch_assoc($resultado_m)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $index++ . "</th>";
                                echo "<td>" . $paciente['codigo'] . "</td>";
                                echo "<td>" . $paciente['nombre'] . "</td>";
                                echo "<td>" . $paciente['fecha_nacimiento'] . "</td>";
                                echo "<td>" . $paciente['raza'] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_mascota.php?id_mascota=" . $paciente['id_mascota'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                                echo "<a href='eliminar_mascota.php?id_mascota=" . $paciente['id_mascota'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="rows-sm-6">
                    <h1 class="text-center mt-4">Listado de clientes</h1>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N</th>
                                <th scope="col">Cedula</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            while ($paciente = mysqli_fetch_assoc($resultado_c)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $index++ . "</th>";
                                echo "<td>" . $paciente['cedula'] . "</td>";
                                echo "<td>" . $paciente['Nombre_cliente'] . "</td>";
                                echo "<td>" . $paciente['apellido_cliente'] . "</td>";
                                echo "<td>" . $paciente['telefono'] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_cliente.php?id_cliente=" . $paciente['id_cliente'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                                echo "<a href='eliminar_cliente.php?id_cliente=" . $paciente['id_cliente'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="rows-sm-6">
                    <h1 class="text-center mt-4">Listado de Vacunacion</h1>
                    <table class="table table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">N</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Dosis</th>
                                <th scope="col">Mascota</th>
                                <th scope="col">Vacunador</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $index = 1;
                            while ($paciente = mysqli_fetch_assoc($resultado_v)) {
                                echo "<tr>";
                                echo "<th scope='row'>" . $index++ . "</th>";
                                echo "<td>" . $paciente['fecha'] . "</td>";
                                echo "<td>" . $paciente['dosis'] . "</td>";
                                echo "<td>" . $paciente['id_mascota'] . "</td>";
                                echo "<td>" . $paciente['nombre_veterinario'] . "</td>";
                                echo "<td>";
                                echo "<a href='editar_vacuna.php?id_vacunacion=" . $paciente['id_vacunacion'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Editar</i> </a>";
                                echo "<a href='eliminar_vacuna.php?id_vacunacion=" . $paciente['id_vacunacion'] . "' class='btn btn-outline-primary mx-1 my-1'> <i class=for='btnradio1'>Borrar</i> </a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
            <script type="text/javascript">
                const btnDelete = document.querySelectorAll('.btn-danger');
                if (btnDelete) {
                    const btnArray = Array.from(btnDelete);
                    btnArray.forEach((btn) => {
                        btn.addEventListener('click', (e) => {
                            if (!confirm('Estàs seguro de eliminarlo?')) {
                                e.preventDefault();
                            }
                        });
                    })
                }
            </script>
</body>

</html>