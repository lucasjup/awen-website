<?php session_start(); ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Awen - inclusiedans</title>

	<!-- STYLING -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&amp;subset=latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../style/normalize.css" />
	<link rel="stylesheet" type="text/css" href="../style/agenda.css" />
</head>
<body>
  <?php if (isset($_SESSION['u_id'])) { ?>
  <div id="header">
    <form action="../includes/logout.inc.php" method="post">
      <button type="submit" name="submit">Uitloggen</button>
    </form>
  </div>
  <div class="agendaContainer">

    <div class="agendaSegment">
      <img class="logoDesktop" src="..\img\awenDesktop.svg" alt="Het logo van Awen">
    	<img class="logoMobile" src="..\img\awenMobile.svg" alt="Het logo van Awen">
      <h1>Agenda</h1>
      <h2>Door het vakje aan te vinken van de cursus schrijft u zich in en krijgt u een e-mail ter bevestiging. Vergeet de afspraak niet in uw agenda te noteren.</h2>
    </div>

    <div class="agendaSegment">
      <?php
        //Require DB settings with connection variable
        require_once "../includes/dbh.inc.php";

        //Get the result set from the database with a SQL query
        $query = "SELECT * FROM inclusie_cursus";
        $result = mysqli_query($conn, $query);

        //Loop through the result to create a custom array
        $cursussen = [];
        while ($row = mysqli_fetch_assoc($result)) {
          $cursussen[] = $row;
        }
        //Close connection
        mysqli_close($conn);
        ?>
        <div><h1>De cursussen:</h1></div>
        <form class="" action="join.cursus.inc.php" method="post">
          <?php foreach ($cursussen as $cursus) { ?>
            <div class="col-5 row agendaCursus">
              <div class="heightWrapper10 col-12"><h4><?= $cursus['inclusie_name']; ?></h4></div>
              <div class="heightWrapper10 col-12"><h5><?= $cursus['inclusie_location']; ?></h5></div>
              <div class="heightWrapper25 col-12"><h5><?= $cursus['inclusie_description']; ?></h5></div>
              <div class="heightWrapper10 col-6"><h5><?= $cursus['inclusie_start']; ?></h5></div>
              <div class="heightWrapper10 col-6"><h5><?= $cursus['inclusie_end']; ?></h5></div>
              <div class="heightWrapper10 col-12">
                <input id="enter.<?=$cursus[inclusie_id]?>" type="checkbox" name="enter.<?=$cursus[inclusie_id]?>" value="<?=$cursus[inclusie_id]?>">
                <label for="enter.<?=$cursus[inclusie_id]?>">
                  <h5>Inschrijven</h5>
                </label>
              </div>
              <?php if ($_SESSION['u_admin'] == 1) { ?>
              <div class="col-6"><a href="edit.php?id=<?= $cursus['id']; ?>">Edit</a></div>
              <div class="col-6"><a href="delete.php?id=<?= $cursus['id']; ?>">Delete</a></div>
						<?php } else {} ?>
            </div>
          <?php } ?>
          <button type="button" name="submit"><h4>Inschrijven</h4></button>
        </form>
    </div>

    <div class="agendaSegment">
      <h1>Contact</h1>
      <form class="contactForm" action="contact.inc.php" method="post" autocomplete="on">
				<div class="row">
					<div class="heightWrapper15 col-6">
						<input type="text" name="name" placeholder="Uw volledige naam">
					</div>
					<div class="heightWrapper15 col-6">
						<input type="email" name="email" placeholder="Uw e-mail adres">
					</div>
				</div>
				<div class="heightWrapper15 col-12">
					<input type="text" name="subject" placeholder="Onderwerp">
				</div>
				<div class="heightWrapper20 col-12">
					<textarea name="message" placeholder="Uw bericht of vraag"></textarea>
				</div>
        <div class="heightWrapper15 col-12">
				  <button type="submit" name="submit">Verzenden</button>
        </div>
			</form>
    </div>
  </div>
</body>
<?php
} else {
  header("Location: ../pages/login.php");
  exit();
}
?>
