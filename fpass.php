<?php
session_start();
require_once 'class.user.php';
require_once 'recaptchalib.php';
error_reporting(0);
$user = new USER();
$ip =$_SERVER['REMOTE_ADDR'];
$secret = '6LddgiATAAAAAAvPl97s76mdsFKVGsm2g1NcnQuH';
if($user->is_logged_in()!="")
{
	$user->redirect('home.php');
}
if(isset($_POST['btn-submit']))
{
 	if(isset($_POST['g-recaptcha-response']))
 	{
          $captcha=$_POST['g-recaptcha-response']; 	
        if(!$captcha){          
          $msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>					
					Капча шалгана уу !!
			  	</div>";
          
        }
        $response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LddgiATAAAAAAvPl97s76mdsFKVGsm2g1NcnQuH &response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
        
        if($response['success'] != false)
        {
      		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>					
					СпАМ !!!!!
			  	</div>";

        }
        else
        {
         	$email = $_POST['txtemail'];	
	$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Сайн байна уу  , $email
				   <br /><br />
				   Доорх хаяг дээр даран нууц үгээ шинчлэх боломжтой				   				   
				   <br /><br />
				   <a href='http://localhost/web/resetpass.php?id=$id&code=$code'>нууц үг шинчлэх</a>
				   <br /><br />
				   баярлалаа.
				   ";
		$subject = "Password reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>					
					$email хаяг руу амжилттай илгээлээ.
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>И-майл хаяг байхгүй байна.</strong>
			    </div>";
			}
		}
	}
}
    
	/*if(isset($_POST['g-recaptcha-response']))
	{
  $privatekey = "6LdJSSATAAAAALgFxtsc5JSM5LPJdhz5oVrw1Wx9";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
  if (!$resp->is_valid) {
    // What happens when the CAPTCHA was entered incorrectly
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
    // Your code here to handle a successful verification  
	$email = $_POST['txtemail'];	
	$stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1");
	$stmt->execute(array(":email"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);	
	if($stmt->rowCount() == 1)
	{
		$id = base64_encode($row['userID']);
		$code = md5(uniqid(rand()));
		
		$stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
		$stmt->execute(array(":token"=>$code,"email"=>$email));
		
		$message= "
				   Сайн байна уу  , $email
				   <br /><br />
				   Доорх хаяг дээр даран нууц үгээ шинчлэх боломжтой				   				   
				   <br /><br />
				   <a href='http://localhost/web/resetpass.php?id=$id&code=$code'>нууц үг шинчлэх</a>
				   <br /><br />
				   баярлалаа.
				   ";
		$subject = "Password reset";
		
		$user->send_mail($email,$message,$subject);
		
		$msg = "<div class='alert alert-success'>
					<button class='close' data-dismiss='alert'>&times;</button>					
					$email хаяг руу амжилттай илгээлээ.
			  	</div>";
	}
	else
	{
		$msg = "<div class='alert alert-danger'>
					<button class='close' data-dismiss='alert'>&times;</button>
					<strong>И-майл хаяг байхгүй байна.</strong>
			    </div>";
			}
		}
	}*/
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Нууц үг мартсан</title>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <!-- Bootstrap -->
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  <body id="login" class="index">
    <div class="container">

      <form class="form-signin" method="post">
        <h2 class="form-signin-heading">Нууц үг мартсан</h2><hr />
        
        	<?php
			if(isset($msg))
			{
				echo $msg;
			}
			else
			{
				?>
              	<div class='alert alert-info'>
				Та и-майл хаягаа оруулан шинэ нууц үгээ авна уу?
				</div>  
                <?php
			}
			?>
        
        <input type="email" class="input-block-level" placeholder="И-майл хаяг" name="txtemail" required />
     	<hr />

     	<div class="g-recaptcha" data-sitekey="6LddgiATAAAAAJJe9EbW0XVp0aI7GK0bJeBVCzWC" ></div>
     	<hr />     	
        <center><button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Нууц үг авах</button></center>
      </form>

    </div> <!-- /container -->
    <script src="bootstrap/js/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>

  </body>
</html>