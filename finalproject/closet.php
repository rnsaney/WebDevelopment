<html>
<?php
    include "navigation.php";
?>
    <table>
        <tr>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Color</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Low Temp</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Medium Temp</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">High Temp</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Type</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Clean</th>
            <th style="font-size: 28px; padding: 20px; text-align: center;">Description</th>
        </tr>
<?php
include 'Clothes.php';
include 'ClosetArray.php';
$closet = Closet::getCloset();

//table of all clothes
foreach($closet as $c)
{    
    echo "<tr>";
    
    echo "<td>";
    echo $c->color;
    echo "</td>";
    
    echo "<td>";
    echo $c->low;
    echo "</td>";
    
    echo "<td>";
    echo $c->medium;
    echo "</td>";
    
    echo "<td>";
    echo $c->high;
    echo "</td>";
    
    echo "<td>";
    echo $c->type;
    echo "</td>";
    
    echo "<td>";
    echo $c->clean;
    echo "</td>";
    
    echo "<td>";
    echo $c->description;
    echo "</td>";
    
    echo "</tr>";
}
?>

</table>
</html>