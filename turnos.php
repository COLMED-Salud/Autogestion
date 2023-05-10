<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="refresh" content="6">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="assets/css/estilobase.css" TYPE="text/css" MEDIA=screen />
    <title>Turnos</title>
</head>

<body>

    <div id="turnos">
        <table width="100%" style="font-family:'Arial', Gadget, sans-serif" cellpadding="4">
            <thead bgcolor="#000" style="font-size:28px" align="center">
                <td>
                    <font color="#FFFFFF"><b>TURNO </b></font>
                </td>
                <td>
                    <font color="#FFFFFF"><b>PUESTO</b></font>
                </td>
                <td>
                    <font color="#FFFFFF"><b>SECTOR</b></font>
                </td>
            </thead>

            <?PHP include('fn/conexion.php');
            /*$result=mysqli_query("SELECT * FROM ti_turnos WHERE ti_turnos.puesto != '' AND ti_turnos.id != 0 order by id_row DESC limit 1 "); 
		 $result=mysqli_query("SELECT * FROM ti_turnos_mae WHERE ti_turnos_mae.id != 0 limit 1 ");
         $turnos=mysqli_fetch_array($result);
         if (mysqli_num_rows($result)>0){
         $id_nro = $turnos[id];
         $id_tip = $turnos[tipo];
		 $id_call = $turnos[llamado]; */

            $control = mysqli_query($conexion, "SELECT * FROM ti_turnos_mae WHERE ti_turnos_mae.id != 0 limit 1 ");
            $ctrl = mysqli_fetch_array($control);
            if (mysqli_num_rows($control) > 0) {
                $llamar = $ctrl['llamar'];
                if ($ctrl["tipo"] != 'C') {
                    $busqid = $ctrl["id"];
                    $busqtp = $ctrl["tipo"];
                    $busqnom = mysqli_query($conexion, "SELECT * FROM  ti_turnos,afiliados 
				 WHERE ti_turnos.tipo = '$busqtp' AND ti_turnos.id = '$busqid' AND ti_turnos.credencial = afiliados.credencial");
                    $afiliado = mysqli_fetch_array($busqnom);
                    $nomafil = $afiliado["apynom"];
                } else {
                    $nomafil = "*&nbsp;*&nbsp;*";
                }
            }
            if ($llamar == '1') {
                $actualiza = mysqli_query($conexion, "UPDATE ti_turnos_mae SET `llamar` = '0' "); ?>

                <audio>
                    <audio src="audio/doorbell.mp3" autoplay="true"></audio>
                </audio>
                <!-- audio autoplay="true" preload="auto">          
         	<source src="audio/doorbell.opus">
         	<source src="audio/doorbell.ogg">
         	<source src="audio/doorbell.mp3">
         	<source src="audio/doorbell.wav">
         </audio -->

            <?PHP } ?>
            <tr style="font-size:70px" align="center">
                <td <?PHP if ($llamar == '1') { ?>background="assets\images\llamado.gif" bgcolor="#FF0000" <?PHP } else { ?> bgcolor="#FFFF66" <?PHP } ?>>
                    <b><?PHP echo $ctrl["tipo"] . str_pad($ctrl["id"], 4, "0", STR_PAD_LEFT); ?><br>
                        <font size="6"><?PHP echo $nomafil; ?></font>
                    </b>
                </td>

                <td <?PHP if ($llamar == '1') { ?>background="assets\images\llamado.gif" bgcolor="#FF0000" <?PHP } else { ?> bgcolor="#FFFF66" <?PHP } ?>>
                    <b><?PHP echo $ctrl["puesto"]; ?></b>
                </td>

                <td style="font-size:30px" <?PHP if ($llamar == '1') { ?>background="assets\images\llamado.gif" bgcolor="#FF0000" <?PHP
                                                                                                                                } else { ?> bgcolor="#FFFF66" <?PHP } ?>>
                    <b><?PHP if ($ctrl["tipo"] == 'C') { ?> Comercial <?PHP } else { ?> Atenci&oacute;n Afiliados <?PHP } ?></b>
                </td>
            </tr>

            <!-- TURNOS PASADOS-->
            <tr bgcolor="#009900" style="color:#FFF;font-size:18px" align="center">
                <td>ULTIMOS TURNOS</td>
                <td>PUESTO</td>
                <td>SECTOR</td>
            </tr>
            <?PHP include('fn/conexion.php');
            $consulta2 = mysqli_query($conexion, "SELECT * FROM ti_turnos WHERE ti_turnos.puesto != '' AND ti_turnos.id != 0 order by llamado DESC limit 3 ");
            while ($turnos2 = mysqli_fetch_array($consulta2)) { ?>
                <tr <?PHP if ($turnos2["tipo"] == 'C') { ?> bgcolor="#FFFFFF" <?PHP } else { ?> bgcolor="#FFFFFF" <?PHP } ?> style="font-size:30px" align="center">
                    <td><b><?PHP echo $turnos2["tipo"] . str_pad($turnos2["id"], 4, "0", STR_PAD_LEFT); ?></b>
                    </td>

                    <td><b><?PHP echo $turnos2['puesto'] ?></b>
                    </td>

                    <td><b>
                            <?PHP if ($turnos2["tipo"] == 'C') { ?> Comercial <?PHP } else { ?> Atenci&oacute;n Afiliados <?PHP } ?></b>
                    </td>
                </tr>
            <?PHP } ?>
            <!-- TURNOS PASADOS-->
        </table>
</body>

</html>