<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Uebung 9</title>
    <?php
    require_once "./player.php";
    ?>
    <style type="text/css">
        header{
            background-color: gray;
            color: white;
            text-align: center;
            height: 80px;
            padding-top: 15px;
            width:100%;
            font-weight: bold;
        }

        footer{
            color: white;
            background-color: gray;
            text-align: center;
            text-decoration: none;
            width:100%;
            bottom:0px;        /*damit der footer immer unten bleibt */
            position:absolute;
            height: 80px;
            padding-top: 20px;
            font-weight: bold;

        }
        #seitezwei {
            display: flex;
            flex-wrap: nowrap;
        }
        .flex-item4{
            flex:1;
        }

        .flex-item5{
            flex:1;
        }

        #zuege{
            background-color: darkslateblue;
            color: white;
            text-align: center;
            height: 50px;
            padding-top: 10px;

        }

        .karte{
            background-color: blue;
            height: 150px;

        }
        @media screen and (max-width: 769px) {
            #mitte{
                visibility: hidden;
            }
        }
        @media screen and (min-width: 770px) {
            .flex-container {
                display: flex;
                flex-wrap: nowrap;
            }

            .flex-item1 {
                flex: 1;
            }

            .flex-item2 {
                flex: 1;
            }

            .flex-item3 {
                flex: 1;
            }
        }

    </style>
</head>
<body>
<?php
if(isset($_GET['id']))
{
   $id=filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);

   echo "<header>";
       echo "<h1>".$player["$id"]["name"]." spielt</h1>";
   echo "</header>
   <div id='zuege'>
   <h4>Anzahl Zuege:</h4>
   </div>
   <div  id='seitezwei'>
   <div id='spalteeins' class='flex-item4'>
   <div class='karte col-3'>" ."</div>
   
</div>
<div id='spaltezwei' class='flex-item5'>
   <p>Liste der Würfe</p>
</div>
</div>
   ";


}else{
if(isset($_GET['name']))
{
    $name=filter_var($_GET['name'], FILTER_SANITIZE_STRING);
    echo "<header>";
    echo "<h1>$name spielt </h1>";
    echo "</header>
   <div id='zuege'>
   <h4>Anzahl Zuege:</h4>
   </div>
   <div  id='seitezwei'>
   <div id='spalteeins' class='flex-item4'>
   Test
</div>
<div id='spaltezwei' class='flex-item5'>
   <p>Liste der Würfe</p>
</div>
</div>
   ";

}
else{?>

<div class="container-fluid">
    <header>
        <h1>Ein Spiel</h1>
    </header>
    <div class="flex-container">
    <div id="links" class="flex-item1">
        <h3>Auswahl Spielerin</h3>
        <?php

        echo "
        <ul class='list-group'> ";
        for($i=0; $i<count($player);$i++)
        {
            echo "<li class='list-group-item'><a href='./index.php?id=".$i."'>".$player["$i"]["name"]."(".$player["$i"]["moves"].")</a></li>";
        }


        echo "</ul>";

        ?>

    </div>
    <div id="mitte" class="flex-item2">
        <h3>oder</h3>

    </div>
    <div id="rechts" class="flex-item3">
     <h3>Neue Spielerin anlegen</h3>

        <form action='./index.php' method="get" class="form-inline">

            <div class="form-group mx-sm-3 mb-2">
                <input type="text" class="form-control" name="name" placeholder="Name">  
            </div>
            <div class="form-group mx-sm-3 mb-2">
            <button type="submit" class="btn btn-primary mb-2">Neue Spielerin anlegen</button>
                </div>
        </form>


    </div>
    </div>
    <footer>
        <p> Neslihan Yilmaz</p>
    </footer>

</div>

<?php } }?>
</body>
</html>