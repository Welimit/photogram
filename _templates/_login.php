<?php

// if( isset($_POST['password']) && ($_POST['email_address'])){
//  $username = $_POST['email_address'];
//  $password = $_POST['password'];
    
//  $result = validate_credentials($username, $password);
// }

$login = false;
if( isset($_POST['password']) && ($_POST['email_address'])){
  $username = $_POST['email_address'];
  $password = $_POST['password'];
  $error = login($username ,$password);
  $login = true;
}
?>
  <?php
    if ($login){
      if (!$error){
        ?>
        <main class="container">
          <div class="bg-light p-5 rounded mt-3">
            <h1>Logged In Sucessfully</h1>  
          </div>
        </main>        
        <?php
          } else {
      ?>
      <main class="container">
          <div class="bg-light p-5 rounded mt-3">
          <h1>Something went wrong, <?=$error?></h1>    
          </div>
        </main>
      <?php 
          }   
  } else {
?>
<main class="form-signin w-50 m-auto">
          <form method="POST" action="login.php">
            <h1>We</h1>
            <h1 class="h3 mb-4 fw-normal">Please sign in</h1>

            <div class="form-floating">
              <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
              <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2020–2024</p>
          </form>
  </main>

<?
  }
?>