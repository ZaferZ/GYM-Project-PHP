<?php 
// Страница за оторизация за влизане в административната част
require 'layout/init.inc';
	$errorMessage = NULL;
// Конфигуриране на променливите $navigation и $page_title
	$navigation = ' / <a href="'.$_SERVER['PHP_SELF'].'">Вход</a>';
	

	if($_POST){
	  $_POST['username'] = $mysqli->escape_string(trim($_POST['username']));
	  $_POST['pass'] = $mysqli->escape_string(trim($_POST['pass'])); 
	  $query = "SELECT * FROM accounts WHERE username='".$_POST['username']."' AND password='".$_POST['pass']."'";
	  $result = $mysqli->query($query);
	  if($row = $result->fetch_assoc() ) {
	  	 // записваме важни данни в сесията - ползват се в другите страници
		 $_SESSION['Account_Id'] = $row['Account_ID'];
		 $_SESSION['Person_Type'] = $row['Person_Type']; // ползва се за горното менюто и в админ-страниците  		
	  	 header("Location: index.php"); // отива се в страницата за редактиране на животни
		 exit;
	  } else {  
	  $errorMessage = 'Грешка: невалидни потребителско име и/или парола!';
	  }
	}	
	
	require 'layout/nav.inc';

print'<div align="center"> <!-- Центриране в content-а -->';
	
	if($errorMessage!=NULL){
		print'<div class="errorBlock">'.$errorMessage.'</div>';
	}
	print'
	<br>
	<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card login-form">
          <div class="card-header">
            Login
          </div>
          <div class="card-body">
            <form method="post" name="f" action="'.$_SERVER['PHP_SELF'].'">
              <div class="form-group">
                <label for="usernameid">Username</label>
                <input type="text" class="form-control"  name="username" id="usernameid" placeholder="Enter username">
              </div>
              <div class="form-group">
                <label for="passid">Password</label>
                <input type="password" class="form-control" name="pass" id="passid" placeholder="Password">
              </div>
              <button type="submit"  name="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
	';
require 'layout/footer.inc'; 
?> 