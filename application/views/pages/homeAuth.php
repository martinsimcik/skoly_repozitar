<html>
    <head>
        <title>Domovská stránka</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <style>
            #myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f1f1f1;
}
        </style>
        <script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    //Column 1
    td_1 = tr[i].getElementsByTagName("td")[0];
    //Column 2
    td_2 = tr[i].getElementsByTagName("td")[1];
    //Column 3
    td_3 = tr[i].getElementsByTagName("td")[2];
    //Column 3
    td_4 = tr[i].getElementsByTagName("td")[3];
    if (td_1 || td_2 || td_3 || td_3) {
      if (td_1.innerHTML.toUpperCase().indexOf(filter) > -1 || td_2.innerHTML.toUpperCase().indexOf(filter)> -1 || td_3.innerHTML.toUpperCase().indexOf(filter)> -1 || td_4.innerHTML.toUpperCase().indexOf(filter)> -1) {
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
        
        
  <div class="container" class="text-center">
<h1>Seznam škol v ČR</h1>
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Hledejte..">  
        
        
        <table id="myTable">
            <tr>
                <th>Název školy</th>
                <th>Město</th>
                <th>Počet přijatých</th>
                <th>Obor</th>
            </tr>
            <?php
            $conn = mysqli_connect("localhost","root","","skoly");
            $sql ="SELECT skola.nazev as 'Škola', mesto.nazev as 'Město', pocet_prijatych.pocet as 'Počet přijatých', obor.nazev as 'Obor' from skola INNER JOIN mesto ON mesto.id=skola.mesto INNER join pocet_prijatych ON pocet_prijatych.skola = skola.id INNER JOIN obor ON obor.id = pocet_prijatych.obor";
            $result = $conn-> query($sql);
            
            if($result->num_rows > 0) {
                while ($row = $result-> fetch_assoc()) {
                    echo "<tr><td>" . $row["Škola"] . "</td><td>" . $row["Město"] . "</td><td>" . $row["Počet přijatých"] . "</td><td>" . $row["Obor"] ;
                }
            }
            else {
            echo "No results";
                
            }
            $conn-> close();
            
            ?>
        </table>
        </div>
        <div>
            <p></p>
        </div>
    </body>
</html>