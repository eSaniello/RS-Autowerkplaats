<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RS Autowerkplaats</title>
  <!-- Google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- materialize -->
  <link rel="stylesheet" href="src/lib/materialize/css/materialize.css">
  <script src="src/lib/materialize/js/materialize.js"></script>
</head>

<body class="white">
  <div class="row">
    <nav class="waves-effect waves-light z-depth-0">
      <div class="nav-wrapper indigo darken-4">
        <a class="brand-logo center">RS AUTOWERKPLAATS</a>
      </div>
    </nav>
  </div>

  <div class="row">
    <form action="src/php/login/login.php" method="POST">
      <div class="col s12">
        <div class="container center">
          <div class="container center">
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="gebruikersnaam" type="text" name="gebruikersnaam" class="validate" required>
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="wachtwoord" type="password" name="wachtwoord" class="validate" required>
                    <label for="wachtwoord">Wachtwoord</label>
                  </div>
                </div>
                <div class="row">
                  <button class="btn waves-effect waves-light indigo darken-4 col s12" type="submit" name="login">
                    Login
                    <i class="material-icons right">send</i>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</body>

</html>