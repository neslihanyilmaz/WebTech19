<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Probeklausur 2 - PHP</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <style>
        body {
            font-family: Verdana;
        }

        header {
            background-color:lightgray;
            color:darkgray;
            width:100%;
            height:80px;
            font-size:1.2em;
            font-weight:bold;
            text-align:center;
        }

        footer {
            position:absolute;
            bottom:0px;
            background-color:lightgray;
            width:100%;
            height:60px;
            text-align:center;
            padding-top:10px;
        }

        footer a:link, footer a:hover, footer a:visited {
            text-decoration: none;
            color: black;
        }
        .message{
            text-align: center;
            margin:10px;
            font-size: large;
            color:darkred;
        }

        .karte{
            background-color:darkgray;
            height:100px;
            text-align:center;
            line-height:100px;
            color:green;
            margin:5px;
            box-shadow: 5px 10px #888888;
        }
    </style>

</head>

<body class="container-fluid">

    <header>
        <h1>Probeklausur 2 - PHP</h1>
    </header>


<?php
    if($_GET && isset($_GET['anzahlSpalten']) && isset($_GET['anzahlBilder']))
    {
        $spalten = filter_var($_GET['anzahlSpalten'], FILTER_SANITIZE_NUMBER_INT);
        $zeilen = filter_var($_GET['anzahlBilder'], FILTER_SANITIZE_NUMBER_INT);
        $fehlerSpalten = false;
        $fehlerZeilen = false;
        $fehlerMessage = "";
        if($spalten<1 || $spalten>4)
        {
            $fehlerSpalten = true;
            $fehlerMessage .= "Anzahl der Spalten muss zwischen 1 und 4 (inkl.) sein!<br/>";
        }
        if($zeilen<4 || $zeilen>10)
        {
            $fehlerZeilen = true;
            $fehlerMessage .= "Anzahl der Bilder muss zwischen 4 und 10 (inkl.) sein!<br/>";
        }
    }
    if((isset($fehlerSpalten) && $fehlerSpalten) || (isset($fehlerZeilen) && $fehlerZeilen))
    {
        // Eingaben nicht korrekt -> Formular erneut
        echo '
                    <div class="message" style="color:red;">Korrigieren Sie Ihre Eingabe!</div>
                    <div class="container">
                        <form role="form" class="form-horizontal" action="'.$_SERVER["PHP_SELF"].'" method="GET">
    
                        <div class="form-group row">
                            <label class="control-label col-sm-6 col-md-4" for="anzahlSpalten">Anzahl Spalten (1-4):</label>
                            <div class="col-sm-6 col-md-8">';
                            if(isset($fehlerSpalten) && $fehlerSpalten)
                            {
                                // Angabe der Spalten nicht korrekt
                                echo '<input class="form-control is-invalid" type="number" name="anzahlSpalten">
                                        <div class="invalid-feedback">
                                            Anzahl der Spalten muss zwischen 1 und 4 (inkl.) sein!
                                        </div>';
                            }
                            else
                            {
                                // Angabe Spalten koorekt
                                echo '<input class="form-control" type="number" name="anzahlSpalten" value="'.$spalten.'">';
                            }
                            echo '</div>  <!-- col-* -->
                        </div> <!-- form-group -->
                            
                        <div class="form-group row">
                            <label class="control-label col-sm-6 col-md-4" for="anzahlBilder">Anzahl Bilder (4-10):</label>
                            <div class="col-sm-6 col-md-8">';
                            if(isset($fehlerZeilen) && $fehlerZeilen)
                            {
                                // Angabe der Zeilen nicht korrekt
                                echo '<input class="form-control is-invalid" type="number" name="anzahlBilder">
                                        <div class="invalid-feedback">
                                            Anzahl der Bilder muss zwischen 4 und 10 (inkl.) sein!
                                        </div>';
                            }
                            else
                            {
                                echo '<input class="form-control" type="number" name="anzahlBilder" value="'.$zeilen.'">';
                            }
                            echo '</div> <!-- col- -->
                        </div> <!-- form-group -->
            
                        <div class="form-group row">
                            <div class="col-sm-offset-6 col-sm-6 col-md-offset-4 col-md-8">
                                <button type="submit" class="btn btn-primary">Weiter</button>
                            </div> <!-- col- -->
                        </div> <!-- form-group -->
                    </form>
                   </div> <!-- container -->';
    }
    else if((isset($fehlerSpalten) && !$fehlerSpalten) && (isset($fehlerZeilen) && !$fehlerZeilen))
    {
        // Eingaben korrekt --> Kacheln erzeugen
        echo '<div class="container-fluid">';
        echo '<div class="row">';
        for ($j = 0; $j < $zeilen; $j++)
        {
            for ($i = 0; $i < $spalten; $i++)
            {
                echo '<div class="karte col">' . $j . '</div>';
            }
            echo '<div class="w-100"></div>';
        }
        echo '</div> <!-- row -->';
        echo '</div> <!-- container-fluid -->';
    }
    else
    {
        // nicht GET (Anfang --> normales Formular)
        echo '
                    <div class="message" id="message">Wählen Sie die Anzahl der Spalten (1-4) und die Anzahl der Bilder (4-10) aus</div>
                        <div class="container">
                            <form role="form" class="form-horizontal" action="'.$_SERVER["PHP_SELF"].'" method="GET">
                        
                                <div class="form-group row">
                                    <label class="control-label col-sm-6 col-md-4" for="spaltenInput">Anzahl Spalten (1-4):</label>
                                    <div class="col-sm-6 col-md-8">
                                        <input class="form-control" type="number" id="spaltenInput" name="anzahlSpalten">
                                    </div>
                                </div>
                                
                                    <div class="form-group row">
                                    <label class="control-label col-sm-6 col-md-4" for="zeilenInput">Anzahl Bilder (4-10):</label>
                                    <div class="col-sm-6 col-md-8">
                                        <input class="form-control" type="number" id="zeilenInput" name="anzahlBilder">
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <div class="col-sm-offset-6 col-sm-6 col-md-offset-4 col-md-8">
                                        <button type="submit" class="btn btn-primary">Weiter</button>
                                    </div>
                                </div>
                            </form>
                        </div>';
    }

?>



<footer>
    <a href="studi.f4.htw-berlin.de/~freiheit/index.php"> Jörn Freiheit </a>
</footer>

<script>
    function changeColor(e)
    {
        if(e.style.backgroundColor == 'red')
        {
            e.style.backgroundColor = 'darkgrey';
            e.style.color = 'darkgreen';
        }
        else {
            e.style.backgroundColor = 'red';
            e.style.color = 'white';
        }
    }
</script>
</body>
</html>