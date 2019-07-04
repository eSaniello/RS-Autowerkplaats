<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>RS Autoverhuur</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css" media="screen,projection">
  <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</head>

<body class="white">
  <div class="header">
    RS Autowerkplaats
  </div>
  </div>

  <form action="login.php" method="post">
    <table cellspacing="20" cellpadding="0" width="0%">
      <div class="center-align2">
        <div class="texthead">Log in!</div>
        <br>
        <i class="material-icons prefix">people <input type="text" name="gebruikersnaam" placeholder="Gebruikersnaam" required autocomplete="off"></i>
        <br>
        <i class="material-icons prefix">remove_red_eye <input type="password" name="wachtwoord" placeholder="Wachtwoord" required autocomplete="off"></i>
        <br><br>
        <button class="btn waves-effect waves-light indigo darken-4" type="submit" name="login">Login<i class="material-icons right">done_all</i>
      </div>

    </table>
</body>

</html>