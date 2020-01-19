<!DOCTYPE html>
<html lang="de">
<head>
    <title> Grundger&uuml;st </title>
    <meta charset=utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- hier können Sie Stylesheets einbinden -->
    <?php
    // hier können Sie Funktionen definieren
    // oder auch php-Dateien einbinden (mit include oder require) ?>
    <style type="text/css">
        header{
            background-color: #AFAFAF;
            color: #888888;
            font-weight: bold;
            text-align: center;
            width: 100%;

        }
        div > p{
            color: red;
            text-align: center;
        }
        footer{
            background-color: #AFAFAF;
            color: #888888;
            text-align: center;
            bottom: 0px;
            position: absolute;
            width: 100%;

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
<h1>Klausur 2.PZ</h1>
</header>
<?php
if(isset($_GET['spalten']))
{
    if(isset($_GET['bilder']))
    {
        $spalten=filter_var($_GET['spalten'],FILTER_SANITIZE_NUMBER_INT);
        $bilder=filter_var($_GET['bilder'],FILTER_SANITIZE_NUMBER_INT);
        echo "<div class='container-fluid'>";
        echo "<div class='row'>";
        for($i=0;$i<$bilder;$i++)
        {
            for($j=0;$j<$spalten;$j++)
            {
                echo "<div class='karte col'>".$i."</div>";
            }
            echo "<div class='w-100'></div>";
        }
        echo "</div>";
        echo "</div>";
    }
}else{
?>
<div>
<p>Wählen Sie die Anzahl der Spalten (1-4) und die Anzahl der Bilder (4-10) aus</p>
    <form action="probeklausur2.php" method="get">
        <div class="form-group row col-12">
            <label for="spalten" class="col-sm-2 col-form-label">Anzahl Spalten (1-4):</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="spalten" name="spalten" >
            </div>
        </div>
        <div class="form-group row col-12">
            <label for="bilder" class="col-sm-2 col-form-label">Anzahl Bilder (4-10):</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="bilder" name="bilder" >
            </div>
        </div>
        <div class="form-group row col-12">
            <div class="col-3">
                <button type="submit" class="btn btn-primary">Weiter</button>
            </div>
        </div>
    </form>

</div>
<?php
}?>
<footer>
    <p>Neslihan Yilmaz</p>

</footer>

</body>
</html>
