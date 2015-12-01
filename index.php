<?php 
include('inc.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php 
$aa = 1;
//$a = mysql_query(" SELECT * FROM users LIMIT 0,1 ");
//$a = mysql_query(" SELECT * FROM users ORDER BY id DESC LIMIT 0,1 ");
//$a = mysql_query(" SELECT * FROM users WHERE id = '".$aa."' LIMIT 0,1 ");
//$b = mysql_fetch_object($a);
?>

<ul>
<?php
$a = mysql_query(" SELECT * FROM users ");
//$a = mysql_query(" SELECT * FROM users WHERE user_reg LIKE '%ca%' ");
//$a = mysql_query(" SELECT * FROM users WHERE MONTH(user_register) = '4' ");
//$a = mysql_query(" SELECT * FROM users WHERE LEFT(user_name,1) = 'a' ");

	while ($c = mysql_fetch_object($a)){
	$d = mysql_query(" SELECT * FROM locations WHERE id= '".$c->location_id."' LIMIT 0,1 ");
	$e = mysql_fetch_object($d);

?>
<li>#<?=$c->id?> <?=$c->user_name?> Lokasi: <?=$e->location_name?></li>
<?php } ?>
</ul>

<hr/>

<h3> Query Singkat </h3>

<ul>
<?php
$f = mysql_query(" 	SELECT tb1.*, tb2.location_name 
					FROM users AS tb1, locations AS tb2 
					WHERE tb2.id = tb1.location_id ");

while ($g = mysql_fetch_object($f)){
?>
<li>#<?=$g->id?> <?=$g->user_name?> Lokasi: <?=$g->location_name?></li>
<?php } ?>
</ul>

</body>
</html>