<?php
	session_start();
	
	$user_id=$_SESSION['user_id'] ;
	
	 if($_SESSION['loginState']=="true") 
	{
		$loginState=0;
	} else {
		$loginState=1;
	}
?>


<!DOCTYPE html>
<html>
  <head>
    <title>Compamigo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../css/clic_first.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </head>
  <body>
      



	<!--div>
		<a href="./clic_first.php"><img id="menuImg" src="../img/compamigo.png" alt="abclic"></img></a>

	<?php if($loginState == 1) { ?>

			<div class="dropdown">
			<a  id ="firstMenu" href="../src/intro.php?pageOption=1">Compamigo</a>
			<div class="dropdown-content">
    				<a href="../src/intro.php?pageOption=1">What is Compamigo</a>
    				<a href="../src/intro.php?pageOption=2">How it works</a>
  			</div>
			</div>

			<a id ="firstMenu" href="../src/search.php?searchMode='false'">Search</a>
			<a id ="firstMenu" href="../src/community.php">Community</a>

<div  id="menuIconImg" class="dropdown">
  <img id="menuIconImg" src="../img/icon/menu.png" alt="abclic">
  <div class="dropdown-content">
			<a id ="firstSmallMenu" href="../src/intro.php?pageOption=1">Compamigo</a>
			<a id ="firstSmallMenu" href="../src/search.php?searchMode='false'">Search</a>
			<a id ="firstSmallMenu" href="../src/community.php">Community</a>
  </div>
</div>

	
	<button id="sign" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter">sign in</button> 
	
	<?php } else { ?>

			<a id ="firstMenu" href="../src/new_voca.php">Vocabulary Note</a>
			<a id ="firstMenu" href="../src/my_note.php">My Voca Note</a>
			<a id ="firstMenu" href="../src/search.php?searchMode='false'">Search</a>
			<a id ="firstMenu" href="../src/voca.php">Extraction</a>
			<a id ="firstMenu" href="../src/voca.php">Study</a>
			<a id ="firstMenu" href="../src/community.php">Community</a>

<div  id="menuIconImg" class="dropdown">
  <img id="menuIconImg" src="../img/icon/menu.png" alt="abclic">
  <div class="dropdown-content">
    <a id ="firstSmallMenu" href="../src/new_voca.php">Vocabulary Note</a>
<a id ="firstSmallMenu" href="../src/my_note.php">My Voca Note</a>
<a id ="firstSmallMenu" href="../src/search.php?searchMode='false'">Search</a>
<a id ="firstSmallMenu" href="../src/voca.php">Extraction</a>
<a id ="firstSmallMenu" href="../src/voca.php">Study</a>
<a id ="firstSmallMenu" href="../src/community.php">Community</a>
  </div>
</div>

	<?php echo $user_id ?>
	<a href="../process/logout.php" id="sign"  class="btn btn-info" active" role="button" aria-pressed="true">log out</a>
	
	<?php } ?>

	</div-->


	<div id="start1">
	Lets start the new way of learning english <br>
	with<img id="start1Img" src="../img/compamigo.png" alt="abclic"></img>
	</div>

<div id="start2">
	단어를 보고 쓰는 것 뿐만 아니라 <br>단어를 듣고 말하고 녹음하고 <br>퀴즈를 통해 쓰면서 <br>
</div>

<div id="start3">
<p id="start3txt">새로운 방법으로 영어를 배워보세요</p>

</div>

	<div id="start4" class="row">
		<div class="col-sm-6">
	<img id="start4Img" src="../img/language.jpg" alt="abclic"></img>
	</div>
	<div class="col-sm-6" id="star4txtarea">
	<img id="start4Title" src="../img/compamigo.png" alt="abclic">
	<br><br><br>
	compamigo는 companion과 amigo의 합성어로 <br>
	친구와 같은 마음으로 친숙하게 영어공부를 돕겠다는 의미로 <br>
	지어진 이름입니다. 
	<br><br>
	자신에게 최적화된 형태로 만들어진 언어 학습을 경험해 보세요.
	<br><br>
	<a href="./create_account.php"  id="ok" class="btn btn-secondary btn-lg">지금 무료로 시작하기</a>
	</div>
	</div>

<!--------log in section ------------>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
        
	<form action="../process/login.php" class="form" method="POST">
      	<div>
        	<input type="text" class="log_info" name="userID" autofocus placeholder="ID">
     	</div>
      <br>
      	<div>
      		<input type="password" class="log_info" name="password" placeholder="PASSWORD">
     	 </div>
      <br><!--br-->
      <div>
      <input type="submit" id="log_on" value="로그인">
	<br>
		<a id = "signOn" href="./sign_in.php">비밀번호를 잊으셨습니까?</a>
		<br>
		<a id = "signOn" href="./create_account.php">아직 회원이 아니신가요?</a>
      </form>

      </div>
    </div>
  </div>
</div>















  
  

  </body>
</html>
