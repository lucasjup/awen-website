<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title> Verificatie </title>
    <link href="../style/verify.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../style/normalize.css" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&amp;subset=latin-ext" rel="stylesheet">
</head>
<body>
        <h1>Verificatie van uw account</h1>

    <!-- start wrap div -->
    <div id="wrap">

        <?php
        include_once 'dbh.inc.php';
        mysqli_connect($host, $user, $password, $database);

        if(isset($_GET['user_email']) && !empty($_GET['user_email']) AND isset($_GET['user_hash']) && !empty($_GET['user_hash'])){
            // Verify data
            $email = mysql_escape_string($_GET['user_email']); // Set email variable
            $hash = mysql_escape_string($_GET['user_hash']); // Set hash variable

            $search = mysql_query("SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'") or die(mysql_error());
            $match  = mysql_num_rows($search);

            if($match > 0){
                // We have a match, activate the account
                mysql_query("UPDATE users SET active='1' WHERE user_email='".$email."' AND user_hash='".$hash."' AND user_active='0'") or die(mysql_error());
                echo 'Je account is succesvol geactiveerd';
            }else{
                // No match -> invalid url or account has already been activated.
                echo 'De link is ongeldig of u heeft uw account al geactiveerd';
            }

        }else{
            // Invalid approach
            echo 'Oeps, er is iets fout gegaan. Gebruik de link die is gestuurd via uw e-mail adres';
        }
        ?>
        <!-- stop PHP Code -->


    </div>
    <!-- end wrap div -->
</body>
</html>
