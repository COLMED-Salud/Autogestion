<script>
    function envio() {
        document.formu.submit()
    }
</script>

<body onload="envio()">
    <?PHP
    $usuario = $_GET['usuario'];
    $puesto  = $_GET['puesto'];
    $tipo    = $_GET['tipo'];
    $id      = $_GET['id'];
    if ($puesto == '' or $usuario == '') {
    ?>
        <script>
            alert("Ocurrio un Error!! \n\nDebe ingresar el Puesto y el usuario!");
        </script>
    <?PHP
    } else {
        /*echo "Puesto:" . $puesto . "<br>";
echo "Usuario:" . $usuario . "<br>";
echo "Tipo:" . $tipo . "<br>";
echo "Id:" . $id . "<br>";*/

        $fecha   = date("Y-m-d H:i:s");

        include('fn/conexion.php');

        $nuevo = mysqli_query($conexion, "UPDATE ti_turnos SET 
`usuario` = '$usuario',
`puesto`  = '$puesto',
`llamado` = '$fecha'
WHERE
`tipo`    = '$tipo' AND
`id`      = '$id'");

        $nuevoturno = mysqli_query($conexion, "UPDATE ti_turnos_mae SET 
`tipo`    = '$tipo',
`id`      = '$id',
`llamar`  = '1' ");
    }

    ?>




    <body onLoad="envio()">
        <form action="turnos_control.php" name="formu" method="GET">
            <input type="submit" value=" Volver " class="button" />
            <input type="hidden" name="usuario" value="<? echo $usuario; ?>" />
            <input type="hidden" name="puesto" value="<? echo $puesto; ?>" />
        </form>
        </form>