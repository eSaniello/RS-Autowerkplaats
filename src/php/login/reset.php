<?php
// Initialize the session
session_start();
 
/*// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}*/
 
// Include config file
require_once '../../database/dbh.php';
 
// Define variables and initialize with empty values

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty($_POST["newwachtwoord"])){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["newwachtwoord"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["newwachtwoord"]);
    }
    
    // Validate confirm password
    if(empty($_POST["wachtwoord2"])){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["wachtwoord2"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE gebruiker SET wachtwoord = $new_password WHERE id = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location:../../../index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
    mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($conn);
}
?>

<!doctype html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RS Autowerkplaats</title>
  <!-- Google icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- materialize -->
  <link rel="stylesheet" href="../../lib/materialize/css/materialize.css">
  <script src="../../lib/materialize/js/materialize.js"></script>
</head>

<body style="background: #e5e5e5">
  <div class="row">
    <nav class="waves-effect waves-light z-depth-0">
      <div class="nav-wrapper indigo darken-4">
        <a class="brand-logo center">RS AUTOWERKPLAATS</a>
      </div>
    </nav>
  </div>

  <div class="row">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="col s12">
        <div class="container center">
          <div class="container center">
            <div class="row">
              <form class="col s12">
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="wachtwoord" type="password" name="newwachtwoord" class="validate" required>
                    <label for="wachtwoord">Wachtwoord</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <i class="material-icons prefix">lock</i>
                    <input id="wachtwoord" type="password" name="wachtwoord2" class="validate" required>
                    <label for="wachtwoord">Bevestig wachtwoord</label>
                  </div>
                </div>
                <div class="row">
                  <!--<button class="btn waves-effect waves-light indigo darken-4 col s12" type="submit" name="action">
                    Wachtwoord veranderen
                    <i class="material-icons right">send</i>-->

                    <button class="btn waves-effect waves-light indigo darken-4 col s12"><a href="../../../index.php">Wachtwoord veranderen</a>
                   
                    <i class="material-icons right">send</i></button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
  </div>
</body>
</html>