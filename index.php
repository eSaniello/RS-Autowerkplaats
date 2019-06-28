<!DOCTYPE html>
<html>
<head>
	<title>Autowerkplaats</title>
	 <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Anton|Merriweather|Open+Sans+Condensed:300|Roboto+Condensed" rel="stylesheet">
    <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="materialize/css/materialize.css"  media="screen,projection"/>
    <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Import javascript file -->
        <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</head>
<body>
    <p>tabel wegsleep: afhaal_datum = null</p>
	<!-- KEURING MODAL -->
	<div id="modal2" class="modal" style="height: 600px; width: 1000px;">
     	<div class="modal-content">
     		<h3>Keuring Verlengen</h3>
     		<br><br>
     		<div class="row">
     			<form class="col s12" action="incl/keuring.php" method="post">
		      		<div class="row">
		      			<div class="input-field col s6">
		      				<select name="voertuig" required>
			                    <?php
                                    $date = date('y-m-d');
				                    include 'incl/db.php';
				                    $sql = "SELECT * FROM voertuig WHERE keuring_vervaldatum <= '$date' ORDER BY kenteken_nr ASC";
				                    $result = mysqli_query($link, $sql);

				                    while($row = mysqli_fetch_array($result)) {
				                    	echo "<option value=". $row['voertuig_id'] . ">" . $row['merk'] . " " . $row['model'] . "	| " . $row['kenteken_nr'] . "    | " . $row['categorie'] . "</option>";
				                    }
			                    ?>
			                 </select>
		                  	<label>Voertuig</label> 
		      			</div>
		      			<div class="input-field col s6">
		      				<input name="nieuw-keuring" type="text" class="datepicker" required>
		      				<label for="nieuw-keuring">Nieuw keuring vervaldatum</label>
		      			</div>
		      		</div>
		      		<div class="row">
		      			<div class="input-field col s6">
			      			<button class="blue darken-4 waves-effect waves-light btn modal-trigger" href="#modal1">Voertuig registreren</button>
			      			<button class="blue darken-4 waves-effect waves-light btn" name="submit">Opslaan</button>
		      			</div>
		      		</div>
		      	</form>
		    </div>
            <div class="row">
                <table class="tarief">
                    <thead>
                        <th> </th>
                        <th>P1</th>
                        <th>P2</th>
                        <th>P3</th>
                        <th>P4</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tarief</td>
                            <td>SRD 50</td>
                            <td>SRD 100</td>
                            <td>SRD 150</td>
                            <td>SRD 200</td>
                        </tr>
                    </tbody>
                </table>
            </div>
	    </div>
    </div>

    <!-- REPARATIE MODAL -->
    <div id="modal1" class="modal" style="height: 600px; width: 1000px;">
    	<div class="modal-content">
    		<h3>Reparatie</h3>
    		<br><br>
    	</div>
    </div>

    <!-- WEGSLEPEN MODAL -->
    <div id="modal3" class="modal" style="height: 600px; width: 1000px;">
    	<div class="modal-content">
    		<h3>Wegslepen</h3>
    		<br><br>
    		<div class="row">
    			<form class="col s12" action="incl/wegslepen.php" method="post">
    				<div class="row">
    					<div class="input-field col s6">
    						<input type="text" name="merk" required>
    						<label for="merk">Merk</label>
    					</div>
    					<div class="input-field col s6">
    						<input type="text" name="model" required>
    						<label for="model">Model</label>
    					</div>
    				</div>
    				<div class="row">
    					<div class="input-field col s6">
    						<label for="kentekennummer">Kentekennummer</label>
    						<input type="text" name="kentekennummer">
    					</div>
                        <div class="input-field col s6">
                            <input type="number" name="afstand" required>
                            <label for="afstand">Afstand (Km)</label>

                        </div>
    				</div>
                    <div class="row">
                        <div class="input-field col s6">
                            <button class="blue darken-4 waves-effect waves-light btn" name="submit">Opslaan</button>
                        </div>
                    </div>
    			</form>
    		</div>
    	</div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn">
		<a class="btn-floating btn-large yellow darken-2">
	    	<i class="large material-icons">add</i>
	 	</a>
		<ul>
		    <li><a class="btn-floating red darken-1 modal-trigger" href="#modal3"><i class="material-icons"><i class="material-icons"><img src="img/tow-truck.png" style="height: 18px; width: 26px;"></i></a></li>
		    <li><a class="btn-floating blue darken-4 modal-trigger" href="#modal2"><i class="material-icons"><img src="img/car-icon.png" style="height: 24px; width: 24px;"></i></a></li>
		    <li><a class="btn-floating yellow darken-2 modal-trigger" href="#modal1"><i class="material-icons"><img src="img/wrench.png" style="height: 24px; width: 24px;"></i></a></li>
		</ul>
	</div>

	<!-- JAVASCRIPT -->
    <script type="text/javascript">
    	M.AutoInit();

    	document.addEventListener('DOMContentLoaded', function() {
		    var elems = document.querySelectorAll('.fixed-action-btn');
			    var instances = M.FloatingActionButton.init(elems, {
			    	direction: 'top',
			    	hoverEnabled: false
			    });
		});

    </script>
</body>
</html>