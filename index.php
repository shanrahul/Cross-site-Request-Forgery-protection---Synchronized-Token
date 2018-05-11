<?php
session_start();
$sessionID=session_id();
setcookie("session_id",$sessionID,time()+3600,"/","localhost",false,true);
?>
<html>
	<head>
		<title>CSRF Tutorial by CPI</title>
		<script type="text/javascript" src="config.js"> </script>

    <style>
    	#frmLogin {
    		padding: 20px 60px;
    		background: #B6E0FF;
    		color: #555;
    		display: inline-block;
    		border-radius: 4px;
    	}
    	.field-group {
    		margin-top:15px;
    	}
    	.input-field {
    		padding: 8px;
    		width: 200px;
    		border: #A3C3E7 1px solid;
    		border-radius: 4px;
    	}
    	.form-submit-button {
    		background: #65C370;
    		border: 0;
    		padding: 8px 20px;
    		border-radius: 4px;
    		color: #FFF;
    		text-transform: uppercase;
    	}
    	.member-dashboard {
    		padding: 40px;
    		background: #D2EDD5;
    		color: #555;
    		border-radius: 4px;
    		display: inline-block;
    	}
    	.member-dashboard a {
    		color: #09F;
    		text-decoration:none;
    	}
    	.error-message {
    		text-align:center;
    		color:#FF0000;
    	}
    </style>

	</head>
	<body>
		<form method="POST" action="server.php" id="frmLogin">

      <div class="field-group">
        <div><label for="login">Username</label></div>
        <div><input name="username" type="text" ></div>

        <div class="field-group">
  		<div><label for="password">Password</label></div>
  		<div><input name="password" type="password"></div>


      <div class="field-group">
    		<input type="hidden" id="token" name="csrf" >

    		<div><input type="submit" name="submt" value="Login" class="form-submit-button" ></span></div>
    	</div>


        <?php
      if(isset($_COOKIE['session_id']))
      {
      echo '<script> var csrf_token = loadDOC("POST","server.php","token"); </script>';
      }
      ?>


		</form>
	</body>
</html>
