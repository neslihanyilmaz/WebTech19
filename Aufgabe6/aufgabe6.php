<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <title>Aufgabe 6</title>
    <?php
        require_once "./mockdataarray.php";
    ?>
</head>
<body>
<div class="container">
    <h1>Teilnehmerinnen</h1>
    <?php
    /*  die print_r()-Funktion ist nur zur Kontrolle, ob das $members-Array
        befüllt ist. Kommentieren Sie diese Anweisung aus.
        Das Auslesen des $members-Array erfolgt dann unten in der Tabelle
    */


   /* print_r($members); */
    /*
        in diesem php-Tag könnten Sie stattdessen prüfen, ob das $_GET-Array
        oder das $_POST-Array befüllt ist
        falls $_GET-Array, dann Formular mit den passenden Werten
        falls $_POST-Array, dann das Array ändern und in die Datei schreiben
        In die Datei schreiben:
            $datei = fopen("./mockdataarray.php", "r+");
            $output = '<?php $members='.var_export($members, true).'; ?>';
            fwrite($datei, $output);
            fclose($datei);
    */

    if(isset($_GET['id']))
    {
      $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

        echo "
    <form action='./aufgabe6.php' method='post'>
    <div class='form group row'>
    <label for='vorname' class='col-2'>Vorname</label>
    <div class='col-10'>
    <input type='text' class='form-control' name='vorname' value='".$members[$id][0]."'/>
    </div>
        </div>


    <div class='form group row'>
    <label for='nach' class='col-2'>Nachname</label>
    <div class='col-10'>
    <input type='text' class='form-control' name='nachname' value='".$members[$id][1]."'/>
     </div>
        </div>

     <div class='form group row'>
      <label for='email' class='col-2'>E-Mail</label>
      <div class='col-10'>
    <input type='text' class='form-control' name='email' value='".$members[$id][2]."'/>
     </div>
        </div>
        
        <button type='submit' class='btn btn-primary'>Save changes</button>
        
     </form>
     
    ";




    }
    else {


      
      
    
       
       
        
        




    ?>
    <table class="table table-striped table-responsive">
        <thead>
        <th>Vorname</th>
        <th>Nachname</th>
        <th>E-Mail</th>
        <th>Edit</th>
        </thead>
        <tbody>
        <!-- hier die einzelnen Zeilen einfügen
             jede Zeile ist ein Array aus dem 2-dimensionalen
             $members-Array
             -->
        <?php
        foreach($members as $key => $entry) {

         echo"<tr>";
        foreach ($entry as $value)
        {

             echo "<td>$value</td>";

        }
            echo "<td><a href='./aufgabe6.php?id=".$key."' >Edit</a></td>";
         echo "</tr>";
        }
        ?>
        </tbody>
    </table>


</div>
<?php
}?>
</body>
</html>
