<?php 	

		$conn = mysqli_connect("localhost", "root", "", "hjcodin");

		if(!$conn) {
			die("<script>alert('database gagal terhubung!')</script>");
		}


function signup($data) {
	global $conn;

	$username = strtolower(stripcslashes($data['username']));
	$password = mysqli_real_escape_string($conn, $data['password']);
	$cpassword = mysqli_real_escape_string($conn, $data['cpassword']);


	// cek konfirmasi password

	if($password != $cpassword ) {
		echo "<script>
			alert('Maaf! Konfirmasi Kata Sandi Anda Tidak Sesuai. Silahkan Coba Lagi! ');
		</script>";
		return false;
	}

	// membuat password menjadi terenkripsi 
	$password = password_hash($password, PASSWORD_DEFAULT);

	// Masukkan ke dalam database
	mysqli_query($conn, "INSERT INTO users VALUES('','$username','$password')");


	return mysqli_affected_rows($conn);
}
