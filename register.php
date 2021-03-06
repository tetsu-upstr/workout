<?php
  include("includes/config.php"); // DB Connect
  include("includes/classes/Account.php"); // DB Insert
  include("includes/classes/Constants.php"); // Validate Message

  $account = new Account($con);

  include("includes/handlers/register-handler.php"); // Sanitize

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
  <title>signup</title>
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

    <main class="registerContainer">
      <div class="inputContainer">
          <form id="registerForm" action="register.php" method="POST">
            <h2>Sign up</h2>
            <p>
              <?php echo $account->getError(Constants::$usernameCharacters); ?>
              <?php echo $account->getError(Constants::$usernameTaken); ?>
              <label for="username">user name</label>
              <input id="username" name="username" type="text" placeholder="e.g. Johnny" value="<?php getInputValue('username') ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$firstNameCharacters); ?>
              <label for="firstName">first name</label>
              <input id="firstName" name="firstName" type="text" placeholder="e.g. John" value="<?php getInputValue('firstName') ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$lastNameCharacters); ?>
              <label for="lastName">last name</label>
              <input id="lastName" name="lastName" type="text" placeholder="e.g. Smith" value="<?php getInputValue('lastName') ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
              <?php echo $account->getError(Constants::$emailInvalid); ?>
              <?php echo $account->getError(Constants::$emailTaken); ?>
              <label for="email">email</label>
              <input id="email" name="email" type="email" placeholder="e.g. test@gmai.com" value="<?php getInputValue('email') ?>" required>
            </p>

            <p>
              <label for="email2">email confirm</label>
              <input id="email2" name="email2" type="email" placeholder="e.g. test@gmai.com" value="<?php getInputValue('email2') ?>" required>
            </p>

            <p>
              <?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
              <?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
              <?php echo $account->getError(Constants::$passwordCharacters); ?>
              <label for="password">password</label>
              <input id="password" name="password" type="password" placeholder="your password" required autocomplete="off">
            </p>

            <p>
              <label for="password2">password confirm</label>
              <input id="password2" name="password2" type="password" placeholder="your password" required autocomplete="off">
            </p>

            <button type="submit" name="registerButton">Sing up</button>
            <a href="index.php">Back to Home</a>
          </form>
      </div>

    <main>

  </div>

</body>
</html>