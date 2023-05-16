<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
    <META HTTP-EQUIV="Refresh" CONTENT="60; URL=menu.php">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="assets/css/estilo.css" TYPE="text/css" MEDIA=screen />
    <link rel="stylesheet" href="assets/css/numpad.css" />
    <title>Autogestion de Afiliados</title>
</head>

<body background="assets/images/mbr-1920x1279.jpg">     
    <div align="center">
        <a href="index.html" target="_parent"><img src="assets/images/logo.png" alt="COLMED SALUD" width="30%" /></a>
    </div>
    <div  align="center">
                <div id="pinpad" align="center">
                    <form action="consulta_afiliado.php" method="POST">
                        <input type="text" id="password" name="user"/></br></br>
                        <input type="button" value="1" id="1" class="pinButton calc"/>
                        <input type="button" value="2" id="2" class="pinButton calc"/>
                        <input type="button" value="3" id="3" class="pinButton calc"/><br>
                        <input type="button" value="4" id="4" class="pinButton calc"/>
                        <input type="button" value="5" id="5" class="pinButton calc"/>
                        <input type="button" value="6" id="6" class="pinButton calc"/><br>
                        <input type="button" value="7" id="7" class="pinButton calc"/>
                        <input type="button" value="8" id="8" class="pinButton calc"/>
                        <input type="button" value="9" id="9" class="pinButton calc"/><br>
                        <input type="button" value="Limpiar" id="clear" class="pinButton clear"/>
                        <input type="button" value="0" id="0 " class="pinButton calc"/>
                        <input type="submit" value="Aceptar" id="enter" class="pinButton enter"/>
                    </form>
                </div>
   
                <table>
                        <tr>
                            <th colspan="3" align="center">
                                <input style="font-size:30px;width:100%" type='button' value='Volver' onClick="location.replace('menu.php');" class="button" />
                            </th>
                        </tr>
                        <tr>
                            <th colspan="3" style="font-size:15px" align="center" background="assets/images/fondo_bt.png">
                                <font color="#000000"><b>Si no conoce el DNI del Titular <br>
                                        Puede ingresar su N&uacute;mero de Credencial</b></font>
                            </th>
                        </tr>
                </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="assets/js/numpad.js"></script> 
</body>

</html>