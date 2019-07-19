<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bewerk</title>

    <!-- materialize -->
    <link rel="stylesheet" href="../../lib/materialize/css/materialize.css">
    <script src="../../lib/materialize/js/materialize.js"></script>
</head>

<body class="grey lighten-4">
    <div class="container">
        <div class="row">
            <h1 class="flow-text center red-text">Bewerken van Keuring</h1>
        </div>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <select required>
                            <option value="1">Shaniel Samadhan</option>
                            <option value="2">Kenson Latchmansing</option>
                            <option value="3">Andojo Mack</option>
                        </select>
                        <label>Kies een klant</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="bouwjaar" type="text" class="validate" required>
                        <label for="bouwjaar">Bouwjaar</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="chassis_nr" type="text" class="validate" required>
                        <label for="chassis_nr">Chassis nr.</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="categorie" type="text" class="validate" required>
                        <label for="categorie">Categorie</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="keuring" type="text" class="validate" required>
                        <label for="keuring">Keuring Vervaldatum</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect blue col s12" type="submit">Bewerken</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        M.AutoInit();
    </script>
</body>

</html>