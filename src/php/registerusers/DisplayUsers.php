
<?php
include("Signupdb.php");

$sql = "SELECT * FROM gebruiker";
if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result)  > 0) {

                echo "<table border=1>";
                echo "<thead>";
                echo "<tr>";

                echo "<th>Naam</th>";
                echo "<th>Voornaam</th>";
                echo "<th>Gebruikersnaam</th>";
                echo "<th>Telefoonnummer</th>";
                echo "<th>Edit</th>";
                echo "<th>Delete</th>";

                echo "</tr>";
                echo "</thead>";
                echo "</tbody>";
                while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['naam'] . "</td>";
                        echo "<td>" . $row['voornaam'] . "</td>";
                        echo "<td>" . $row['gebruikersnaam'] . "</td>";
                        echo "<td>" . $row['Telefoonnummer'] . "</td>";


                        echo "<td>";
                        echo "<a href='Edit.php?Telefoonnummer=" . $row['Telefoonnummer'] . "' class='edit_btn' >Edit</a>";
                        echo "</td>";



                        echo "<td>";
                        echo "<a href='Delete.php?gebruikersnaam=" . $row['gebruikersnaam'] . "'>Delete </a>";
                        echo "</td>";

                        echo "</td>";
                        echo "</tbody>";
                        echo "</tabel>";
                }
        }
}
?>