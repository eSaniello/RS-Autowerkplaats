<?php

include "../../database/dbh.php";

//query to get data from the table
$query = sprintf("SELECT datum, COUNT(reparatie_id) as count FROM reparatie GROUP BY datum");

//execute query
$result = $conn->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$conn->close();

//now print the data
print json_encode($data);
