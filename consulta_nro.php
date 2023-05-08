<script>
function envio(){
document.formu.submit()
}
</script>

<?PHP
include('fn/conexion.php');

$result=mysql_query("SELECT * FROM ti_turnos WHERE ti_turnos.tipo = '$_GET[tipo]' order by tipo,id DESC limit 1 ");
$row=mysql_fetch_array($result);

if (mysql_num_rows($result)>0){
	$id_nro  = $row[id] + 1;	
} else { 
	$id_nro  =  1;
}

putenv("TZ=America/Argentina/San_Juan");
$id_tipo = $_GET[tipo];
$actual = date("Y-m-d H:i:s");
$periodo_a = date('Y'); 
$periodo_m = date('m');
$credencial = $_GET[user];
$nuevo=mysql_query("INSERT INTO ti_turnos
(`tipo`, `id`, `periodo_a`, `periodo_m`, `fecha` , `credencial`)
VALUES ('$id_tipo', '$id_nro', '$periodo_a', '$periodo_m', '$actual', '$credencial')"); 

/*echo $id_tipo;*/
/*echo $id_nro;*/
?>	<body onLoad="envio()">
	<form action="imprimir_nro.php"  name="formu" method="GET">
    <input type="hidden" name="nro"  value="<? echo $id_nro;?>"/>
    <input type="hidden" name="tipo" value="<? echo $id_tipo;?>"/>
    </form>
    
<!--    
<?PHP//	} else { ?>
	<script>
		alert("Ocurrio un Error!! \n\nNo se encontraron datos para procesar");
		//location.replace("index.php");
	</script>
    <div align="center">
    <img src="imagenes/icon_atencion.png" alt="Atencion" width="10%"/><br>
    <font size="1">No se encontraron datos!</font>
    <hr>
	<input type ='button' value = 'Volver' onClick="location.replace('menu.php');" class="button"/>
    <body onload="envio()">	
	</div> 
<?PHP // } ?> 
