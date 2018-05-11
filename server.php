<?php
	//start a session
	session_start();

	//create a key for hash_hmac function
	if (empty($_SESSION['key']))
	$_SESSION['key'] = bin2hex(random_bytes(32));

	//create CSRF token
$csrf = hash_hmac('sha256', 'this is some string: index.php', $_SESSION['key']);
//create a session for csrf token
$_SESSION['CSRF']=$csrf;



ob_start();
echo $csrf;

	function loginvalidater($user_CSRF,$user_sessionID,$username,$password)
	{
	  if( hash_equals($user_CSRF, $_SESSION['CSRF']) && $user_sessionID==session_id() && $username == 'admin' && $password == '123' )
	  {
			echo "<script> alert('Login Sucessfull!!') </script>";
	  	echo "Welcome User "."</br>";
			echo "Visit ".'<a href="https://blackwolftech08.blogspot.com/", target="_blank" >'. "blackwolftech08" ."</a>"." For Tutorial";


			?>
			<a href="logout.php">Logout</a>



<?php
	  }
	  else
	  {
			echo"<script> alert('Login Failed') </script>";
		  }
	}

	if(isset ($_POST["submt"]))
	{
 ob_end_clean();

	loginvalidater($_POST['csrf'],$_COOKIE['session_id'],$_POST['username'],$_POST['password']);
	}


?>
