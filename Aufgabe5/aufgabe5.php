<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
function zufzahl($max, $anzahl, $stellen)
{
    echo "<table class='table table-striped'>";
    echo "<thead> <tr> <th scope=col>Zufallszahl</th>";
    for($j=1; $j<=$stellen; $j++)
    {
        echo "<th scope=col>gerundet $j</th>";

    }
    echo "</tr></thead><tbody>";
    for($i=1; $i<=$anzahl; $i++)
        {
            $zzahl = rand(1,$max);
            if($zzahl>=100000)
            {
                echo "<tr style='background-color: #AFAFAF'> <td>$zzahl </td>";
            }else {
                if ($zzahl >= 10000) {
                    echo "<tr style='background-color: gold'> <td>$zzahl </td>";
                } else {
                    if ($zzahl >= 1000) {
                        echo "<tr style='background-color: lightskyblue'> <td>$zzahl </td>";
                    } else {
                        echo "<tr> <td>$zzahl </td>";
                    }
                }
            }
            for($j=1; $j<=$stellen; $j++)
            {
               echo "<td>".abschneiden($zzahl, $j)."</td>";

            }

            echo "</tr>";



        }
    echo "</tbody></table>";
}
function abschneiden($zahl,$stellen)
{
    $base = pow(10,$stellen);
    return $zahl - ($zahl % $base);
}
?>
</head>

<body>
<h1>Zufallszahlen</h1>
<p></p>
<div>
    <?php zufzahl(200000, 20,4); ?>
</div>
</body>

</html>
