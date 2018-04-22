<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="style.css" rel="stylesheet" type="text/css">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
  <div class="wrapper">
    <div class="banner">
      <div class="row">
        <div class="column-1">
          <div class="content">
            <h2>Don't have an account?</h2> <hr/>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id incidunt blanditiis non sunt dolore quasi molestiae maiores.</p>
          </div>
          <input type="button" name="signup" value="SIGN UP" class="button-blue" id="slideLeft"/>
        </div>
        <div class="column-2">
          <div class="content">
            <h2>Have an account?</h2> <hr/>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </p>
          </div>
          <input type="button" name="login" value="LOGIN" class="button-blue" id="slideRight"/>
        </div>
      </div>
    </div>
    <div class="white-banner">
      <div id="login">
        <div class="login-form-container" id="login-form">
          <div class="login-form-content">
            <div class="login-form-header">
              <h2>Login</h2> <span class="logo"><img src="images/logo.png"/></span><hr/>
            </div>
            <form method="POST" action="php/login.php" class="login-form">
              <div class="input-container">
                <i class="fa fa-envelope"></i>
                <input type="email" class="input" name="email" placeholder="Email"/>
              </div>
              <div class="input-container">
                <i class="fa fa-lock"></i>
                <input type="password"  id="login-password" class="input" name="password" placeholder="Password"/>
              </div>
              <div class="button-container">
                <input type="submit" name="login" value="LOGIN" class="button-orange"/>
                <a class="forgot-password" href="#">Forgot?</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div id="signup">
        <div class="signup-form-container" id="signup-form">
          <div class="signup-form-content">
            <div class="signup-form-header">
              <h2>Sign Up</h2> <span class="logo"><img src="images/logo.png"/></span><hr/>
            </div>
            <form method="POST" action="php/signup.php" class="signup-form">
              <div class="input-container">
                <i class="fa fa-user"></i>
                <input type="name" class="input" name="username" placeholder="Name"/>
              </div>
              <div class="input-container">
                <i class="fa fa-envelope"></i>
                <input type="email" class="input" name="email" placeholder="Email"/>
              </div>
              <div class="input-container">
                <i class="fa fa-lock"></i>
                <input type="password"  id="signup-password" class="input" name="password" placeholder="Password"/>
              </div>
              <div class="button-container">
                <input type="submit" name="signup" value="SIGN UP" class="button-orange"/>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<footer></footer>
<script src="/js/index.js"></script>
</body>
</html>
