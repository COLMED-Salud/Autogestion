<!DOCTYPE HTML>
<!--	Auto Gestion de Afiliados COLMED salud-->
<html>

<head>
	<!--<META HTTP-EQUIV="Refresh" CONTENT="50; URL=index.html">-->
	<META HTTP-EQUIV="Refresh" CONTENT="50; URL=menu.html">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="assets/css/estilo.css" TYPE="text/css" MEDIA=screen />
	<title>Autogestion de Afiliados</title>
	<link rel="stylesheet" href="assets/tether/tether.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="assets/theme/css/style.css">
	<link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

</head>

<div align="center">
	<a href="index.html" target="_parent"><img src="assets\images\logo.png" alt="COLMED SALUD" width="20%" /></a>
</div>

<script>
	function envio() {
		document.formu.submit()
	}
</script>

<body background="assets\images\bg_exa01.jpg">
	<div align="center">
		<?PHP
		$dni = $_REQUEST['dni'];
		include('fn/conexion.php');
		$result = mysqli_query($conexion, "SELECT * FROM fac_cabecera WHERE credencial = $_REQUEST[user]");
		if (mysqli_fetch_array($result) > 0) { ?>

			<table class="tabla" border="0" align="center" width="100%" background="assets\images\fondo_bt.png">
				<thead>
					<tr align="center">
						<th colspan="6" style="font-size:20px" align="center" bgcolor="#99CC00">
							<font color="#FFFFFF"><b>Mis Facturas</b></font>
						</th>
					</tr>
				</thead>
				<thead>
					<tr align="center">
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Factura Nro.&nbsp;</b></font>
						</th>
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Fecha&nbsp;</b></font>
						</th>
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Vto.&nbsp;</b></font>
						</th>
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<font color="#FFFFFF"><b>&nbsp;Importe&nbsp;</b></font>
						</th>
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<!-- <font color="#FFFFFF"><b>&nbsp;Tal&oacute;n&nbsp;</b></font> -->
						</th>
						<th style="font-size:14px" align="center" bgcolor="#999999">
							<!-- <font color="#FFFFFF"><b>&nbsp;Tal&oacute;n&nbsp;</b></font> -->
						</th>
					</tr>
				</thead>
				<?PHP mysqli_data_seek($result, 0);
				while ($row = mysqli_fetch_array($result)) { ?>
					<tbody>
						<tr align="center">

							<td style="font-size:14px;background-color:rgba(0, 0, 0, 0);" align="center">
								<?PHP echo str_pad($row["fac_suc"], 4, "0", STR_PAD_LEFT) . "-" . str_pad($row["fac_nro"], 8, "0", STR_PAD_LEFT); ?></td>

							<td style="font-size:14px" align="center"><?PHP echo implode('/', array_reverse(explode('-', $row["fac_fec"]))); ?></td>

							<td style="font-size:14px" align="center"><?PHP echo implode('/', array_reverse(explode('-', $row["fec_vto"]))); ?></td>

							<td style="font-size:14px" align="center"><?PHP echo '$' . $row["totalf"]; ?></td>

							<td style="font-size:14px" align="center">
								<?PHP if ($row["estado"] == "Pendiente") {

									$link = "www.colmedsanjuan.com.ar/afiliados/aquicobro/crear-orden-cobro.php?cpto=" . str_pad($row['fac_nro'], 8, '0', STR_PAD_LEFT) . "&tip=F&ref=" . $row['cpte_int'] . "&imp=" . $row['totalf'] . "&vto=" . $row['fec_vig'];

									if (!empty($row["cod_facil"])) { ?>
									<?PHP } ?>

									<form action="qrcode/generar.php" method="POST">
										<input type="hidden" value="<?PHP echo $link; ?>" name="data">
										<input style="font-size:14px;width:100%" type="submit" value="&nbsp;&nbsp;&nbsp;Pagar&nbsp;&nbsp;&nbsp;" class="button-warning" />
									</form>

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
							<td style="font-size:14px" align="center">
								<?PHP if ($row["estado"] == "Pendiente") {

									if (!empty($row["cod_facil"])) { ?>
										<!-- <input style="font-size:14px;width:auto" type='button' value='Imprimir' onClick="location.replace('imprimir_talon.php?cpte=<?PHP echo $row["cpte_int"]; ?>&user=<?PHP echo $row["credencial"]; ?>&dni=<? echo $dni; ?>');" class="button-info" /> -->
									<?PHP } ?>
								<?PHP } ?>
							</td>
						</tr>
					<?PHP } ?>
					<td colspan="6" style="font-size:12px" align="center" bgcolor="#FF6600" opacity="0.6">
						<font color="#FFFFFF">
							Pod&eacute;s abonar tu factura s&oacute;lo con el DNI en:<br>
							<b>SAN JUAN SERVICIOS</b> y <b>PAGO F&Aacute;CIL</b>
						</font>
					</td>
					</tbody>
			</table>

		<?PHP  } else { ?>
			<div align="center">
				<img src="assets\images\icon_atencion.png" alt="Atencion" width="20%" /> <br>
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