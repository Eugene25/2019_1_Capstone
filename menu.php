<?php
	session_start();
	$userID=$_SESSION['userID'] ;
	$nickName=$_SESSION['nickName'] ;
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ENGLISH YAPP!</title>

    <!-- google login -->
    <script src="https://apis.google.com/js/platform.js?onload=init"  async defer></script>
    <meta name="google-signin-client_id" content="458170960749-rn3gpvnh2pkdld8atv4bjb7vvde2j4g6.apps.googleusercontent.com">

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500|Nanum+Gothic" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/menu.css" rel="stylesheet">
    <link href="../css/yapp.min.css" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>

  <body id="page-top">

<!------로그인하지 않은 경우-------------->
<?php if(strlen($userID) == null) { ?>

<div id="inDiv" class="col-sm-9">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">

    <a class="navbar-brand js-scroll-trigger" href="./index.php">
      <span class="d-block d-lg-none">ENGLISH YAPP!</span>
      <span class="d-none d-lg-block">
        <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../img/yapp.png" alt="" >
      </span>
    </a>

    <button class="navbar-toggler" onclick="showToggle()>
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="./voca_main.php" >단어장</a>
       </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="./voca_new.php" >단어 추출</a>
        </li>
        <button id="sign" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">sign in</button>
        </div>
      </ul>
    </div>

  </nav>
</div>

<?php } else {?>

<div id="outDiv" class="col-sm-9">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="./index.php">
        <span class="d-block d-lg-none">ENGLISH YAPP!</span>
        <span class="d-none d-lg-block">
          <img class="img-fluid img-profile rounded-circle mx-auto mb-2" src="../img/yapp.png" alt="">
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="./quizList.php" >학습하기</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="./my_note.php" >나의 학습</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="./createNewNote.php" >새 단어장 만들기</a>
          </li>
          <br>
          <h6 class="mb-2">[<?php echo $nickName ?> 님]</h6>
          <a href="../src/myPage.php" id="mypage"  class="btn btn-danger" style="margin-bottom: 2px;" active" role="button" aria-pressed="true">마이페이지</a>
          <a href="../process/logout.php" id="sign"  class="btn btn-info" active" role="button" aria-pressed="true" onclick="signOut();">log out</a>
          </div>
        </ul>
      </div>
    </nav>
  </div>
<?php }?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/yapp.min.js"></script>


  <!-- log in section -->

  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">

     <form action="../process/login.php" class="form" method="POST">
	    <div id="afterGoogleSignIn">
      <div>
        	    <input style="width: 100%" type="text" class="log_info" name="yapp_email" autofocus placeholder="Email" value="<?php if(isset($_COOKIE["yapp_email"])){ echo $_COOKIE["yapp_email"]; } ?>">
     	    </div>
        <br>
      	<div>
      		<input style="width: 100%" type="password" class="log_info" name="yapp_password" placeholder="Password" value="<?php if(isset($_COOKIE["yapp_password"])){ echo $_COOKIE["yapp_password"]; } ?>">
        </div>
        <br>
	<input type="checkbox" name="remember" <?php if(isset($_COOKIE["yapp_email"])) { ?> checked <?php } ?> /> Remember me
        <div>
        <input style="width: 100%; margin-left: 0;" type="submit" id="log_on" value="로그인">
        </div>
	<br>
        <p class="mb-1" style="text-align: center;"><a id = "signOn" href="./sign_in.php">비밀번호를 잊으셨습니까?</a></p>
        <p class="mb-1" style="text-align: center;"><a id = "signOn" href="./createAccount.php">아직 회원이 아니신가요?</a></p>
    </form>
    
	<hr>
	<div id="gSign" class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
	<p id="demo"></p>

        </div>
      </div>
    </div>
  </div>


  <script>
  	var auth2;

  		function init() {
  			gapi.load('auth2', function(){
      				auth2 = gapi.auth2.init({
        			client_id: '458170960749-rn3gpvnh2pkdld8atv4bjb7vvde2j4g6.apps.googleusercontent.com',
        			cookiepolicy: 'single_host_origin',
 				});
   			 });
  		};

		function onSignIn(googleUser) {
			var profile=googleUser.getBasicProfile();
			var email=profile.getEmail();
			var nickName=profile.getName();

			signOut();
			location.href="../process/snsLogin.php?email="+email+"&nickName="+nickName+"";
		}

  		function signOut() {
    		var auth2 = gapi.auth2.getAuthInstance();
    		auth2.signOut().then(function () {
     			console.log('User signed out.');
    		});
		}

  	</script>
  </body>

</html>
