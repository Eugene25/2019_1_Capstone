<!DOCTYPE html>
<html>
 <head>
 	<title>create an account</title>
	<meta charset="utf-8">
   	<link rel="stylesheet" type="text/css" href="../css/create_account.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
 </head>
 <body>
 	<div class = "web_title">
		<a href="./clic_first.php">
        	<img src="../img/compamigo.png" alt="abclic"></img>
		</a>
      	</div>


<div class="container">
  <div class="row">
    <div class="col-sm-2">
      One of three columns
    </div>
    <div class="col-sm-10">
     
<form action="../process/create_account.php" class="form" method="POST">
		<br>

		<div class="form-row">
			<div class="form-group col-md-3">
      				<label>First Name</label>
      				<input type="text" class="form-control" name="firstName" autofocus placeholder="First Name">
    			</div>
			<div class="form-group col-md-3">
      				<label>Last Name</label>
      				<input type="text" class="form-control" name="lastName"  autofocus placeholder="Last Name">
    			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-3">
      				<label>Email</label>
      				<input type="email" class="form-control" name="emailAddress" autofocus placeholder="Email">
    			</div>
			<div class="form-group col-md-3">
      				<label >Nick Name</label>
      				<input type="text" class="form-control" name="nickName"  autofocus placeholder="Nick Name">
    			</div>
		</div>
		
		<!--input type="email" name="emailAddress" autofocus placeholder="Email"-->
		<div class="form-row">
			<div class="form-group col-md-3">
      				<label>ID</label>
      				<input type="text" class="form-control" name="userID"  autofocus placeholder="ID">
    			</div>
			<div class="form-group col-md-3">
      				<label>Password</label>
      				<input type="password" class="form-control" name="password" autofocus placeholder="Password">
    			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-1">
				<label>Gender</label>
				<select name="gender" class="form-control">
					<option value="prferNot" selected >성별</option>
  					<option value="M">남자</option>
  					<option value="F">여자</option>
 		 			<option value="prferNot">응답거부</option>
				</select>
			</div>
			<div class="form-group col-md-2">
				<label>Birthday</label>
				<input class="form-control" type="date" name="birthDay" >
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-3">
				<label>Phone Number</label>
				<input type="tel" class="form-control" name="phoneNumber" autofocus placeholder="Phone">
			</div>
		</div>
		
		<br>
		<button id="ok"  type="submit" class="btn btn-secondary">Create an account</button>
		<!--input id="ok" class="form-control" type="submit" value="Create an account"-->

	</div>
	</form>


    </div>
    <div class="col-sm-2">
      One of three columns
    </div>
  </div>
</div>



	


 </body>
</html>
