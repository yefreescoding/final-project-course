<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .flex{
            display: flex;
        }
        .flex-col{
            flex-direction: column;
        }
        .gap-4{
            gap: 1rem;
        }

        .p-4{
            padding: .5rem;
        }

        body{
            display: grid;
            place-items: center;
            font-family: system-ui;
            background: hsl(0 0% 70% / .8);
        }

        form{
            width: min(100%, 40em);
        }

        form div{
            width: 100%;
        }

        form label{
            font-weight: bold;
            font-size: 1.1rem;
            text-transform: capitalize;
        }

        form input{
            /* width: fit-content; */
        }
        table{
            /* width: min(100%, 20em); */
            /* margin: 10px auto; */
        }
        table, th, td {
            border: 1px solid white;
            border-collapse: collapse;
            padding: .5rem;
        }
        th, td {
            /* background-color: #111; */
            color: white;
        }

        th {
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #111;
        }
        table tr:nth-child(odd) {
            background-color: grey;
        }
    </style>
</head>
<body>
    <h1>Agregar nuevos boxeadores</h1>    
    <?php
    /* Lo primero, incluir las funciones para el tratamiento de bases de datos. */
    include "funciones.php";
    
    /* Aquí irá un isset que detecte si estamos entrando en la página a través de un envío de formulario y, si es así, inserte el nuevo ingrediente en la bd. */
    if ( isset($_POST["insertar"]) ) {
        /* Leemos el nombre del ingrediente. */
        $id_boxer = $_POST["id_boxer"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $victorias = $_POST["victorias"];
        $derrotas = $_POST["derrotas"];
        $empates = $_POST["empates"];
        $peso = $_POST["peso"];
        $pais = $_POST["pais"];
        $bio = $_POST["bio"];
        $rank = $_POST["rank"];
        
        $conexion = conectar();
        
        $sql = "INSERT INTO `boxeadores`(`id_boxeador`, `nombre`, `apellido`, `victorias`, `derrotas`, `empates`, `peso`, `pais`, `bio`, `ranking_p4p`) VALUES ('$id_boxer','$nombre','$apellido','$victorias','$derrotas','$empates','$peso','$pais','$bio', '$rank')";
        
        $resultado = consultar($conexion, $sql);
        
        cerrar($conexion);
    }
    
    ?>
    
    <h2>Introduzca toda la informacion relacionada con el boxeador</h2>
    <form class="flex flex-col gap-4" action="index.php" method="post">
        <div class="flex gap-4">
            <div class="flex flex-col">
                <label class="flex flex-col">identificador:
                    <input class="p-4" type="text" name="id_boxer" required>
                </label>
                <label class="flex flex-col">Nombre:
                    <input class="p-4" type="text" name="nombre" required>
                </label>
                <label class="flex flex-col">Apellido:
                    <input class="p-4" type="text" name="apellido" required>
                </label>
                <label class="flex flex-col">victorias:
                    <input class="p-4" type="number" name="victorias" max="99" maxlength="2" required>
                </label>
                <label class="flex flex-col">Derrotas:
                    <input class="p-4" type="number" name="derrotas" required>
                </label>
            </div>
            <div class="flex flex-col">      
                <label class="flex flex-col">Empates:
                    <input class="p-4" type="text" name="empates" required>
                </label>
                <label class="flex flex-col">Peso:
                    <input class="p-4" type="text" name="peso" required>
                </label>
                <label class="flex flex-col"> Pais:
                    <input class="p-4" type="text" name="pais" required>
                </label>
                <label class="flex flex-col">ranking P4P:
                    <input class="p-4" type="number" name="rank" required>
                </label>
                <label class="flex flex-col">Bio:
                    <textarea class="p-4" type="text" name="bio" required></textarea>
                </label>
                
            </div>
        </div>
        <input class="p-4" type="submit" name="insertar">
    </form>
    
    <?php
    /* Vamos a pintar una tabla con los ingredientes ya disponibles en la base de datos. */
    $conexion = conectar();
    
    $sql = "SELECT * FROM `boxeadores` ORDER BY ranking_p4p";
    
    $resultado = consultar($conexion, $sql);
    
    /* Leemos los resultados de la consulta en un array. */
    $boxeadores = array();
    while ( $registro = mysqli_fetch_assoc($resultado) ) {
        array_push($boxeadores, $registro); 
    }
    
    /* Cerrar la conexión. */
    cerrar($conexion);
    ?>
    
    <table class="flex flex-col">
        <caption>boxeadores actuales</caption>
        <tr class="">
            <th>id</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>peso</th>
            <th>victorias</th>
            <th>derrotas</th>
            <th>empates</th>
            <th>pais</th>
            <th>peso</th>
            <th>ranking P4P</th>
        </tr>
        <?php
            foreach ( $boxeadores as $boxeador ) {
        ?>
        <tr class="">
            <td><?php echo $boxeador["id_boxeador"]; ?></td>
            <td><?php echo $boxeador["nombre"]; ?></td>
            <td><?php echo $boxeador["apellido"]; ?></td>
            <td><?php echo $boxeador["peso"]; ?></td>
            <td><?php echo $boxeador["victorias"]; ?></td>
            <td><?php echo $boxeador["derrotas"]; ?></td>
            <td><?php echo $boxeador["empates"]; ?></td>
            <td><?php echo $boxeador["pais"]; ?></td>
            <td><?php echo $boxeador["peso"]; ?></td>
            <td><?php echo $boxeador["ranking_p4p"]; ?></td>
        </tr>
        <?php
    }
    ?>
    </table>
    <a href="../index.php">Go home</a>
</body>
</html>