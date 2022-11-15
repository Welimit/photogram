<?
  $signup = false;
  if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['email_address']) and isset($_POST['phone']) ) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email_address'];
    $phone = $_POST['phone'];
    $error = User::signup( $username, $password, $email, $phone);
    $signup = true;
  }
?>
  <?php
    if ($signup){
      if (!$error){
        ?>
        <main class="container">
          <div class="bg-light p-5 rounded mt-3">
          <h1>Signup Sucessfully</h1>
            <p class="lead">login here <a href="/login.php">here</a></p>  
 
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
    }  else {
    ?>
  <main class="form-signup w-50 m-auto">
    <form method="POST" action="signup.php">
      <h1>We Signup</h1>
      <h1 class="h5 mb-4 fw-normal">Secured Portal</h1>
      <div class="form-floating">
        <input name="username" type="text" class="form-control" id="floatingInputUsername" placeholder="Username">
        <label for="floatingInputUsername">Username</label>
      </div>
      <div class="form-floating">
        <input name="phone" type="text" class="form-control" id="floatingInputPhone" placeholder="PhoneNumber">
        <label for="floatingInputPhone">Phone</label>
      </div>
      <div class="form-floating">
        <input name="email_address" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating mb-3">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">© 2020–2024</p>
    </form> 
  </main>

  <?
    }
  ?>