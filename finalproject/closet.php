<html>
<?php
    include "navigation.php";
?>
    <table>
        <tr>
            <th style="font-size: 28px">Color</th>
            <th style="font-size: 28px">Low Temp</th>
            <th style="font-size: 28px">Medium Temp</th>
            <th style="font-size: 28px">High Temp</th>
            <th style="font-size: 28px">Type</th>
            <th style="font-size: 28px">Clean</th>
            <th style="font-size: 28px">Description</th>
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