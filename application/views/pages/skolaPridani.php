<?php
    $connect = mysqli_connect("localhost","root","","skoly");
    if(isset($_POST['submitinserdetails'])) {
        
        $nazev = $_POST['skola'];
        $geolat = $_POST['geolat'];
        $geolong = $_POST['geolong'];
        $mesto = $_POST['mesto'];
        $pocet = $_POST['pocet']??'';
        $obor = $_POST['obor']??'';
    
        
       //$sql = "INSERT INTO skola.nazev as 'Škola', skola.geo-lat as 'geolat', skola.geo-long as 'geolong', mesto.nazev as 'Město', pocet_prijatych.pocet as 'Počet přijatých', obor.nazev as 'Obor' from skola INNER JOIN mesto ON mesto.id=skola.mesto INNER join pocet_prijatych ON pocet_prijatych.skola = skola.id INNER JOIN obor ON obor.id = pocet_prijatych.obor"
         //                      . " VALUES ('$skola','$geolat','$geolong','$mesto','$pocetprijatych','$obor')" ;
        //$sql1 = "INSERT INTO skola (nazev) values (, 'paprikaaaaaaaaaaaaa')";
        //$sql2 = "INSERT INTO skola (id, nazev) values ('1003', 'paprikaaaaaaaaaaaaaaaaaaaaaaaaa')";
        
        
        // Přidat nové měssto do tabulky
        // Dotaz, který najde id nově přidaného města podle názvu města
        // Přidat školu a vložit id města
        
                
        $sql2 = "SELECT id from mesto where nazev = id" . $mesto ;
                               
        $sql1 = "INSERT INTO skola (`nazev`, `geo-lat`, `geo-long`, `mesto`)"
                               . " VALUES ('$nazev','$geolat','$geolong', '$mesto')" ;
        
        $sql3 = "INSERT INTO pocet_prijatych (`pocet`)"
                               . " VALUES ('$pocet')" ;
        
        $sql4 = "select id from obor where nazev =" . $obor ; 
                               
    $qry2 = mysqli_query($connect, $sql2);
    if($qry2){
        echo "<p style='color:#ffffff;text-align:center'>Škola byla úspěšně přidána!</p>", $mesto;
    }   
        
    $qry1 = mysqli_query($connect, $sql1);
    if($qry1){
        
    }  

    $qry3 = mysqli_query($connect, $sql3);
    if($qry3){
        
    }  
    $qry4 = mysqli_query($connect, $sql4);
    if($qry4){
        
    }  
    
    }
    
?>
<html>
    <head>
        <title>Přidání školy</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
html {
  height: 100%;
}
body {
  margin:0;
  padding:0;
  font-family: sans-serif;
  background: linear-gradient(#fb8500, #ffb703);
}

.box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background: rgba(0,0,0,.5);
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.box .user-box {
  position: relative;
}

.box .user-box input {
  width: 100%;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  margin-bottom: 30px;
  border: none;
  border-bottom: 1px solid #fff;
  outline: none;
  background: transparent;
}
.box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 5px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}

.box .user-box input:focus ~ label,
.box .user-box input:valid ~ label {
  top: -20px;
  left: 0;
  color: #ffb703;
  font-size: 12px;
}

.box form a {
  position: relative;
  display: inline-block;
  padding: 10px 20px;
  color: #fff;
  font-size: 16px;
  text-decoration: none;
  text-transform: uppercase;
  overflow: hidden;
  transition: .5s;
  margin-top: 40px;
  letter-spacing: 4px
}

.box a:hover {
  background: #ffb703;
  color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 5px #ffb703,
              0 0 25px #ffb703,
              0 0 50px #ffb703,
              0 0 100px #ffb703;
}

.box a span {
  position: absolute;
  display: block;
}

.box a span:nth-child(1) {
  top: 0;
  left: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(90deg, transparent, #ffb703);
  animation: btn-anim1 1s linear infinite;
}

@keyframes btn-anim1 {
  0% {
    left: -100%;
  }
  50%,100% {
    left: 100%;
  }
}

.box a span:nth-child(2) {
  top: -100%;
  right: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(180deg, transparent, #ffb703);
  animation: btn-anim2 1s linear infinite;
  animation-delay: .25s
}

@keyframes btn-anim2 {
  0% {
    top: -100%;
  }
  50%,100% {
    top: 100%;
  }
}

.box a span:nth-child(3) {
  bottom: 0;
  right: -100%;
  width: 100%;
  height: 2px;
  background: linear-gradient(270deg, transparent, #ffb703);
  animation: btn-anim3 1s linear infinite;
  animation-delay: .5s
}

@keyframes btn-anim3 {
  0% {
    right: -100%;
  }
  50%,100% {
    right: 100%;
  }
}

.box a span:nth-child(4) {
  bottom: -100%;
  left: 0;
  width: 2px;
  height: 100%;
  background: linear-gradient(360deg, transparent, #ffb703);
  animation: btn-anim4 1s linear infinite;
  animation-delay: .75s
}

@keyframes btn-anim4 {
  0% {
    bottom: -100%;
  }
  50%,100% {
    bottom: 100%;
  }
}
.vertical-center {
  
  position: absolute;
  bottom: 78%;
  right: 22%;

}
</style>
    </head>
    <body>
        
        <div class="box">
            <h2>Přidání školy</h2>
        <form action="" method="POST">
             
            <p style="color:#fff"> Město:</p>
  <select name="mesto">
    <option disabled selected>-- Výběr města --</option>
    <?php
        include "dbConn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT id From mesto");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>"  .$data['mesto'] ."  </option>"; // displaying data in option menu
        }	
    ?>  
  </select>

            <?php mysqli_close($db);  // close connection ?>
  <div>
      <p></p>
  </div>
            <div class="user-box">
<input type="text" name="skola" required="">
<label for="skola">Název školy:</label>
            </div>
            
            <div class="user-box">
<input type="text" name="pocet" required="">
<label for="pocetprijatych">Počet přijatých:</label>
            </div>
            <p style="color:#fff"> Obor:</p>
  <select name="obor">
    <option disabled selected>-- Výběr oboru --</option>
    <?php
        include "dbConn.php";  // Using database connection file here
        $records = mysqli_query($db, "SELECT * From obor");  // Use select query here 

        while($data = mysqli_fetch_array($records))
        {
            echo "<option value='". $data['id'] ."'>" .$data['nazev'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

            <?php mysqli_close($db);  // close connection ?>
  <div>
      <p></p>
  </div>
            <div class="user-box">
<input type="text" name="geolat" required="">
<label for="geolat">Geo-lat:</label>
            </div>
            <div class="user-box">
<input type="text" name="geolong" required="">
<label for="geolong">Geo-long:</label>
            </div>
<input type="submit" class="btn btn-yellow" class="vertical-center" name="submitinserdetails" value="Odeslat">
</form>
    </div>
    </body>
</html>