<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
	<!--<META HTTP-EQUIV="Refresh" CONTENT="50; URL=index.html">-->
	<META HTTP-EQUIV="Refresh" CONTENT="50; URL=menu.php">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="css/estilo.css" TYPE="text/css" MEDIA=screen />
	<title>Autogestion de Afiliados</title>
	<link rel="stylesheet" href="assets/tether/tether.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/theme/css/style.css">
	<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">

</head>

<div align="center">
	<a href="index.html" target="_parent"><img src="imagenes/logo.png" alt="COLMED SALUD" width="60%" /></a>
</div>

<script>
	function envio() {
		document.formu.submit()
	}
</script>

<body background="assets\images\mbr-1920x1279.jpg">
	<div align="center">
		<?PHP
		$dni = $_GET['dni'];
		include('fn/conexion.php');
		$result = mysqli_query($conexion, "SELECT * FROM fac_cabecera WHERE credencial = $_GET[user]");
		if (mysqli_fetch_array($result) > 0) { ?>

			<table class="tabla" border="0" align="center" width="100%" background="imagenes/fondo_bt.png">
				<thead>
					<tr align="center">
						<th colspan="5" style="font-size:20px" align="center" bgcolor="#99CC00">
							<font color="#FFFFFF"><b>Impresi&oacute;n de tal&oacute;n de pago</b></font>
						</th>
					</tr>
				</thead>
				<thead>
					<tr align="center">
						<th style="font-size:10px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Factura Nro.&nbsp;</b></font>
						</th>
						<th style="font-size:10px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Periodo&nbsp;</b></font>
						</th>
						<th style="font-size:10px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Vto.&nbsp;</b></font>
						</th>
						<th style="font-size:10px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Importe&nbsp;</b></font>
						</th>
						<th style="font-size:10px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Tal&oacute;n&nbsp;</b></font>
						</th>
					</tr>
				</thead>
				<?PHP mysqli_data_seek($result, 0);
				while ($row = mysqli_fetch_array($result)) { ?>
					<tbody>
						<tr align="center">
							<td style="font-size:10px;background-color:rgba(0, 0, 0, 0);" align="center">
								<?PHP echo str_pad($row["fac_suc"], 4, "0", STR_PAD_LEFT) . "-" . str_pad($row["fac_nro"], 8, "0", STR_PAD_LEFT); ?></td>

							<td style="font-size:10px" align="center"><?PHP echo implode('/', array_reverse(explode('-', $row["fac_fec"]))); ?></td>

							<td style="font-size:10px" align="center"><?PHP echo implode('/', array_reverse(explode('-', $row["fec_vto"]))); ?></td>

							<td style="font-size:10px" align="center"><?PHP echo '$' . $row["totalf"]; ?></td>

							<td style="font-size:10px" align="center">
								<?PHP if ($row["estado"] == "Pendiente") {
									if (!empty($row["cod_facil"])) { ?>
										<input style="font-size:10px;width:80%" type='buttond' value='Imprimir' onClick="location.replace('imprimir_talon.php?cpte=<?PHP echo $row["cpte_int"]; ?>&user=<?PHP echo $row["credencial"]; ?>&dni=<? echo $dni; ?>');" class="button" />
									<?PHP } ?>

									<?PHP } else {
									if ($row["estado"] == "Cancelada") { ?>
										Cancelada el<br>
										<?PHP echo $row["cob_fec"]; ?>
									<?PHP } else { ?>
										Vencida el<br>
										<?PHP echo $row["fec_vig"]; ?>
									<?PHP } ?>
								<?PHP } ?>

							</td>
						</tr>
					<?PHP } ?>
					<td colspan="5" style="font-size:12px" align="center" bgcolor="#FF6600">
						<font color="#FFFFFF">
							Pod&eacute;s abonar tu factura s&oacute;lo con el DNI en:<br>
							<b>SAN JUAN SERVICIOS</b> y <b>PAGO F&Aacute;CIL</b>
						</font>
					</td>
					</tbody>
			</table>




		<?PHP  } else { ?>
			<div align="center">
				<img src="imagenes/icon_atencion.png" alt="Atencion" width="20%" /> <br>
				<font color="#FF0000" size="1">No hay facturas para mostrar</font><br>
				<font color="#000000" size="1">Usted no posee facturas generadas en los ultimos 3 meses.</font>
			</div>
		<?PHP  } ?>
		<hr>
		<table width="100%" border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td align="center">
					<a class="btn btn-md btn-info display-4" href="javascript:history.back(1)">&nbsp;&nbsp;Volver&nbsp;&nbsp;</a>
				</td>
			</tr>

			<tr>
				<td align="center">
					<a class="btn btn-md btn-warning display-4" href="ingreso.php">Terminar</a>
				</td>
			</tr>
		</table>

	</div>
</body>

</html>