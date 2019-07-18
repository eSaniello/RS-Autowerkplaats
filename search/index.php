<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
        function myFunction() {
            // Declare variables 
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td2 = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search..">
    <br><br>
    <table id="myTable">
        <tr>
            <th>naam</th>
            <th>land</th>
        </tr>
        <tr>
            <td>Alfreds Futterkiste</td>
            <td>Germany</td>
        </tr>
        <tr>
            <td>Berglunds snabbkop</td>
            <td>Sweden</td>
        </tr>
        <tr>
            <td>Island Trading</td>
            <td>UK</td>
        </tr>
        <tr>
            <td>Koniglich Essen</td>
            <td>Germany</td>
        </tr>
    </table>
</body>

</html>