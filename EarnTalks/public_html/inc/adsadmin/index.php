<?php
	require_once('../config/config.php');
	require('../config/func.php');
	
	if ($_GET['logout']=='1')
		session_destroy();

	if (auth())
		header("Location: admin.php");

	$errno=0;
	$errno=(strlen($_POST['login'])) ? 0 : 1;
	$errno+=(strlen($_POST['password'])) ? 0 : 2;

	if(($errno==0) && !empty($_POST['post']))
		{
		if ($passDB=mysql_query("SELECT `haslo` AS p FROM `users` WHERE `login`='admin' LIMIT 1"))
			{
			$p=@mysql_result($passDB, 0, 0);
			if (strlen($p))
				{
				$errno=($_POST['login']=='admin') ? 0 : 5;
				$errno+=($_POST['password']==decode($p)) ? 0 : 4;
				if ($errno==0)
					{
					$password=encode($_POST['password']);
					$login=$_POST['login'];

					session_register('login', 'password');
					header("Location: admin.php");
					}
				}
			else
				$errno=7;
			}
		else
			echo '<div class="error">Error in SQL query. Cannot read information from database</div>' . mysql_error();
		}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?php echo PageTitle ?> - Administration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../config/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<form method="post" action="index.php">
<input type="hidden" name="post" value="true">
	<table align="center" width="200">
		<tr>
			<td align="center" colspan="2" bgcolor="#eeeeee">
				Enter login information:
			</td>
		</tr>
		<tr>
			<td width="40">Login:</td><td><input type="text" name="login" maxlength="15" style="width: 120px"></td>
		</tr>
		<tr>
			<td>Password:</td><td><input type="password" name="password" maxlength="15" style="width: 120px"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" value=" LOG IN ">
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				[ <a href="../index.php">return to homepage</a> ]
			</td>
		</tr>
		<?php
			if ($post)
				{
				echo '<tr><td colspan="2">';
				if (($errno==1) || ($errno==3))
					echo '<div class="error">Enter login name!</div>';
				if (($errno==2) || ($errno==3))
					echo '<div class="error">Enter password!</div>';
				if (($errno==6) || ($errno==9))
					echo '<div class="error">Wrong login name!</div>';
				if (($errno==4) || ($errno==9))
					echo '<div class="error">Wrong password!</div>';
				if (($errno==7))
					echo '<div class="error">Missing information about user in database!</div>';

				echo '</td></tr>';
				}
		?>
	</table>
</form>	
</body>
</html>
