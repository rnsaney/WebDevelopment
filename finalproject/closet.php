<html>
<?php
    include "navigation.php";
?>
    <table>
        <tr>
            <th>Color</th>
            <th>Low Temp</th>
            <th>Medium Temp</th>
            <th>High Temp</th>
            <th>Type</th>
            <th>Clean</th>
            <th>Description</th>
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