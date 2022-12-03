<?php
error_reporting(0);

include "../config/koneksi.php";
$pass=md5($_POST[pass]);

$login=mysql_query("SELECT * FROM users WHERE username='$_POST[username]' AND password='$pass'and status ='Ya'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){
  session_start();
  
  // inisialisasi session /////////
  
  ("nama");
  ("username");
  ("password");
  ("status");

  $_SESSION[nama]    	 = $r[nama];
  $_SESSION[username]     = $r[username];
  $_SESSION[password]     = $r[password];
  $_SESSION[status]       = $r[status];
  
  
  header('location:home.php');
}
else{
  echo "<SCRIPT language=Javascript>
  alert('Login Anda Gagal,  username dan password tidak valid. Silahkan Hubungi Admin')
  </script>";
  echo "
  <meta http-equiv='refresh' content='0; url=../index.php'/>";
}
?>
