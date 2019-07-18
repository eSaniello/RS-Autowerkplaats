<!DOCTYPE html>
<html>

<head>
    <script type="text/javascript">
        function searchFunction() {
            // Declare variables 
            var input, filter, table, tr, td, i, txtValue;
            //ID VAN JE SEARCHBAR
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            //ID VAN JE REPARATIE TABEL
            table = document.getElementById("reparatieTabel");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                //merk
                td = tr[i].getElementsByTagName("td")[0];
                //model
                td2 = tr[i].getElementsByTagName("td")[1];
                //bouwjaar
                td3 = tr[i].getElementsByTagName("td")[2];
                //kentekennr
                td4 = tr[i].getElementsByTagName("td")[3];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 || txtValue4.toUpperCase().indexOf(filter) > -1) {
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
    <input type="search" id="search" onkeyup="searchFunction()" placeholder="Zoeken..">
    <br><br>
    <table id="reparatieTabel">
        <tr>
            <th>merk</th>
            <th>model</th>
            <th>bouwjaar</th>
            <th>kentekennr</th>
        </tr>
        <tr>
            <td>toyota</td>
            <td>ractis</td>
            <td>2013</td>
            <td>8757</td>
        </tr>
        <tr>
            <td>toyota</td>
            <td>mark-x</td>
            <td>2015</td>
            <td>8757</td>
        </tr>
        <tr>
            <td>kia</td>
            <td>optima</td>
            <td>2016</td>
            <td>9869</td>
        </tr>
        <tr>
            <td>nissan</td>
            <td>skyline</td>
            <td>2005</td>
            <td>7648</td>
        </tr>
    </table>
</body>

</html>