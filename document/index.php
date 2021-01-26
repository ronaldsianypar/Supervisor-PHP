<?php  
	session_start();
?>
<html>
<head>
    <title>Bookstore</title>
    <link rel="stylesheet" type="text/css" href="css/master-style.css">
    <link rel="icon" href="img/title.png">
</head>
<?php  
	// inc
	include 'config/libs.php';
	$oop = new oop();
	$oop->koneksi();

	// var
	@$table = "tb_kasir";
	@$username = $_POST['username'];
	@$password = $_POST['password'];
	@$akses = $_POST['akses'];
	@$redirect = "admin/master.php?menu=welcome";
	
	// login
	if (isset($_POST['login'])) {
		$oop->login($table, $username, $password, $akses, $redirect);
	}
?>
<body>
<form method="post">
	<div class="login">
	    <div class="panel">
	        <div class="panel-login"> LOGIN</div>
	        <div class="panel-body">
	            <img src="img/login.png" class="icon-login">    
	            <div class="form-group">
	                <input type="text" name="username" class="form-control" placeholder="Username">
	            </div>
	            <div class="form-group">
	                <input type="password" name="password" class="form-control" placeholder="Password">
	            </div>
	            <div class="form-group">
	                <select name="akses" class="form-control">
	                    <option value="Admin">Admin</option>
	                    <option value="Kasir">Kasir</option>
	                    <option value="Manager">Manager</option>
	                </select>
	            </div>
	            <div class="form-group">
	                <button type="submit" name="login" class="btn btn-login">LOGIN</button>
	            </div>                                                          
	        </div>
	    </div>
	</div>
</form>
</body>

</html>