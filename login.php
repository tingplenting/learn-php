<?php
include('inc.php');

if(isset($_POST['goLogin'])){

	if($_POST['user_name'] != '' && $_POST['user_password'] != ''){
		
		$cek = mysql_num_rows(mysql_query(" SELECT * FROM users
											WHERE user_name = '".$_POST['user_name']."' 
											AND user_password = '".md5($_POST['user_password'])."'
											"));
		//echo $cek;						
		if($cek == 1){
			//Login OK
			$a = mysql_query(" SELECT * FROM users WHERE user_name = '".$_POST['user_name']."' 
								AND user_password = '".md5($_POST['user_password'])."' ");
			$b = mysql_fetch_object($a);
			
			//Register Session
			$_SESSION['UID'] = $b->id;
			$_SESSION['UNAME'] = $b->user_name;
			
			echo $_SESSION['UNAME'];

		}else{
			echo 'username password tidak cocok mas bro';
		}								
	} else {
		echo 'kosong mas bro';
	}
}


if(isset($_POST['goAdd']) && $_SESSION['UID']){
	
	if($_POST['user_name'] != '' && $_POST['user_password'] != ''){
		
		$add = mysql_query(" INSERT INTO users (location_id, user_name, user_password, user_register)
							VALUES ('".$_POST['location_id']."', '".$_POST['user_name']."', '".md5($_POST['user_password'])."',  NOW() ) ");
	
	}
}

?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>
<body>

<?php if(!$_SESSION['UID']) { ?>
<form action="" method="post">
	<div><input type="text" name="user_name" size="25"></div>
    <div><input type="password" name="user_password" size="25"></div>
    <div><input type="submit" name="goLogin" value="Login"></div>
</form>
<?php } ?>

<?php if($_SESSION['UID']) { ?>
<form action="" method="post">

	<div>
    <select name="location_id">
      <?php
	  $a = mysql_query(" SELECT * FROM locations ");
	  while($b = mysql_fetch_object($a)){
	  ?>
      <option value="<?=$b->id?>"><?=$b->location_name?></option>
      <?php } ?>
    </select>
    </div>

	<div><input type="text" name="user_name" size="25"></div>
    <div><input type="password" name="user_password" size="25"></div>
    <div><input type="submit" name="goAdd" value="Tambah User"></div>
</form>
<?php } ?>

</body>
</html>