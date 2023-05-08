<?PHP
$db_host='localhost';
$db_database='colmedsanjuan1';
$db_usuario='colmedsanjuan1';
$db_pass='sanJuan239';

$conexion = mysql_connect($db_host,$db_usuario,$db_pass);

mysql_query("SET NAMES 'latin1'"); //<mrz>2017-10-02 Cambio utf8 por latin1

if (!$conexion)
     die ("No se pudo conectar a la base de datos:<br />". mysql_error( ));


$db_select = mysql_select_db($db_database);

if(!$db_select)
	die ("No se pudo seleccionar la base de datos...<br/>".mysql_error());
	
?>
