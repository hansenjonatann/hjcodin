<?php 

	// koneksi dengan file functions.php;
	require 'functions.php';

	// pengkondisian jika tombol login sudah diklik
	if(isset($_POST['login'] ) ) {

		// memanggil data pada elemen form
		$username = $_POST['username'];
		$password = $_POST['password'];

		$login = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

		// Pengkondisian ketika php mereturn nilai yang benar
		if(mysqli_num_rows($login) === 1 ) {

			// cek apakah password sudah sesuai atau belum
			$pass = mysqli_fetch_assoc($login);
			if(password_verify($password, $pass['password'] ) ) {

				header("location: index.php");
				exit;
			}
		}

		$error = true;
	}


?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HJ Codin | Halaman Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		body{
			font-family: sans-serif;
			background: #d5f0f3;
		}

		/*h1{
			text-align: center;
			/* ketebalan font */
			/*font-weight: 300;
		}*/

		.tulisan_login{
			text-align: center;
			/* membuat semua huruf menjadi kapital */
			text-transform: uppercase;
		}

		.kotak_login{
			width: 360px;
			background: white;
			/* meletakkan form ke tengah */
			margin: 80px auto;
			padding: 30px 20px;
		}

		label{
			font-size: 11pt;
		}

		input{
			display: block;
		}

		.form_login{
			/* Membuat lebar form penuh */
			box-sizing: border-box;
			width: 100%;
			padding: 10px;
			font-size: 11pt;
			margin-bottom: 20px;
			color: deepskyblue;
			font-weight: 600;
		}

		.tombol_login{
			background: royalblue;
			color: white;
			font-size: 11pt;
			width: 100%;
			border: none;
			border-radius: 3px;
			padding: 10px 20px;

		}

		.link{
			color: #232323;
			text-decoration: none;
			font-size: 10pt;
		}

	</style>
</head>
<body>
	<div class="kotak_login">
		<p class="tulisan_login">login</p>

		<form action="" method="post">
			<label for ="username">Username : </label>
			<input type="text" name="username" id="username" placeholder="Username atau Email..." class="form_login" >
			<label for ="password">Password: </label>
			 <input type="password" name="password" id="password" placeholder="Password..." class="form_login" >
			 <button type="submit" class="tombol_login" name="login">LOGIN</button>  
			 <?php if( isset($error) ) :  ?> 
					<p style="color:red; font-style: italic;">Username atau kata sandi salah!!</p>
				<?php endif ?>



			 <br>
			 <br>
			 <center>
			 	<p>Belum Punya Akun?<a class="link" href="signup.php"> Daftar </a>di sini!</p>
			 </center>
		</form>
	</div>

</body>
</html>