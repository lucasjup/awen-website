<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Raleway&amp;subset=latin-ext" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../style/normalize.css">
  <link rel="stylesheet" type="text/css" href="../style/main.css">
  <title>Log in</title>
</head>

<body>
  <img class="logoDesktop" src="..\img\awenDesktop.svg" alt="Het logo van Awen">
  <img class="logoMobile" src="..\img\awenMobile.svg" alt="Het logo van Awen">
  <div class=loginContainer>
  <form action="../includes/login.inc.php" method="POST">
    <div class="row">
      <div class="col-3">
        <input type="email" name="user_email" placeholder="e-mail">
      </div>
      <div class="col-3">
        <input type="password" name="user_pwd" placeholder="wachtwoord">
      </div>
    </div>
    <div class="col-3">
      <button type="submit" name="submit">Log in</button>
    </div>
  </form>
  <div class="col-3">
    <a href="../pages/inclusiedans.php"><h1>HOME</h1></a>
  </div>
  </div>
</body>
