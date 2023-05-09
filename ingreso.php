<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
    <META HTTP-EQUIV="Refresh" CONTENT="60; URL=menu.php">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="css/estilo.css" TYPE="text/css" MEDIA=screen />
    <title>Autogestion de Afiliados</title>

</head>

<body background="assets\images\mbr-1920x1279.jpg">
    <div align="center">
        <a href="index.html" target="_parent"><img src="imagenes/logo.png" alt="COLMED SALUD" width="30%" /></a>
    </div>

    <?PHP
    if ($_POST) {
        $cadena = $_POST['dni'];
        if ($_POST['boton'] == "Ingresar") {
            $cadena = $_POST['dni']; ?>
    <?PHP
        } else {
            $cadena = '' . $_POST['dni'] . '' . $_POST['boton'] . '';
        }

        if ($_POST['borrar'] == "Borrar") {
            $cadena = substr($cadena, 0, -1);
            /*$cadena = '';*/
        }
    } ?>

    <form method="POST">
        <div align="center">
            <table>
                <tr>
                    <th colspan="3" style="font-size:12px" align="center" background="imagenes/fondo_bt.png">
                        <font color="#000000">Ingrese DNI o Credencial del Titular:</font>
                    </th>
                </tr>

                <tr>
                    <th colspan="3" align="center"><input maxlength="11" size="10%" type="text" name="dni" value="<?PHP echo $cadena; ?>" class="text" style="font-size:35px" />
                        <br>&nbsp;<br>
                    </th>
                </tr>

                <tr>
                    <th><input type="submit" name="boton" value="7" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="8" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="9" class="button" style="font-size:30px;width:100%" /></th>
                </tr>
                <tr>
                    <th><input type="submit" name="boton" value="4" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="5" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="6" class="button" style="font-size:30px;width:100%" /></th>
                </tr>
                <tr>
                    <th><input type="submit" name="boton" value="1" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="2" class="button" style="font-size:30px;width:100%" /></th>
                    <th><input type="submit" name="boton" value="3" class="button" style="font-size:30px;width:100%" /></th>
                </tr>
                <tr>
                    <th><input type="submit" name="boton" value="0" class="button" style="font-size:30px;width:100%" /></th>
                    <th colspan="2" align="center"><input style="font-size:24px;width:100%" type="submit" name="borrar" value="Borrar" class="button" />
    </form>
    </th>
    </tr>

    <tr>
        <th colspan="3" align="center">
            <form action="consulta_afiliado.php" method="POST">
                <input style="font-size:30px;width:100%" type="submit" name="boton" value="Ingresar" class="button" />
                <input type="hidden" name="aftip" value="<? echo $_POST['aftip'] ?>" />
                <input type="hidden" name="user" value="<? echo $cadena; ?>" />
            </form>
        </th>
    </tr>

    <tr>
        <th colspan="3" align="center">
            <input style="font-size:30px;width:100%" type='button' value='Volver' onClick="location.replace('menu.php');" class="button" />
        </th>
    </tr>
    <tr>
        <th colspan="3" style="font-size:15px" align="center" background="imagenes/fondo_bt.png">
            <font color="#000000"><b>Si no conoce el DNI del Titular <br>
                    Puede ingresar su N&uacute;mero de Credencial</b></font>
        </th>
    </tr>
    </table>
    </div>

</body>

</html>