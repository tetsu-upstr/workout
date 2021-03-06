<?php
  include("includes/config.php"); // DB Connect
  include("includes/classes/Account.php"); // DB Insert
  include("includes/classes/Constants.php"); // Validate Message

  $account = new Account($con);

  include("includes/handlers/login-handler.php"); // Login & Ridirect with SESSION

  // inputのvalueにPOSTで渡った値を表示
  function getInputValue($name) {
    if(isset($_POST[$name])) {
      echo $_POST[$name];
    }
  }

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Noto+Sans+JP:400,700" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/register.css">
  <title>login</title>
</head>
<body>

<header class="header show">
    <div class="headerContainer wrapper">
      <div>
          <a href="index.php"><img src="assets/images/icons/logo_transparent.png" class="logo" alt="logo"></a>
      </div>
  
      <nav>
        <ul>
          <li><a href=""></a></li>
          <li><a href=""><?php echo !empty($username) ? '<a href="profile.php">' . $username . '</a>' : '<a href="login.php">Log in</a>'; ?></a></li>
          <li><a href="register.php">Sign up</a></li> 
          <li><a href="">Contact</a></li> 
          <li><a href="" class="logout">Log out</a></li> 
        </ul>
      </nav>
    </div>

  </header>

  <div class="wrapper">

    <main class="loginContainer">

      <div class="inputContainer">
          <form id="loginForm" action="login.php" method="POST">
            <h2>Log in</h2>
            <p>
              <?php echo $account->getError(Constants::$loginFailed); ?>
              <label for="loginUsername">user name</label>
              <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Johnny" value="<?php getInputValue('loginUsername') ?>" required>
            </p>

            <p>
              <label for="loginPassword">password</label>
              <input id="loginPassword" name="loginPassword" type="password" placeholder="your password" required autocomplete="off">
            </p>

            <button type="submit" name="loginButton">Log in</button>
            <a href="index.php">Back to Home</a>
            <br>
            <p style="text-align: center">テストユーザーでログインできます<br>username:  test / password:  11111</p>
          </form>
      </div>

    <main>

  </div>

</body>
</html>