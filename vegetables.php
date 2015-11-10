<?php

$page_title = "Vegetables";

require_once ('php/header.php');
require_once('php/connect.php');
$sql = "SELECT * FROM vegetables";
//execute the query
$query = $conn->query($sql);

//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
?>
    <!-- all content goes in between these two tags -->
    <h1>The Vegetable People</h1>
<hr>

    <table class="vegetablelist">
        <tr>
            <th>Vegetable</th>
            <th>Description</th>
            <th>UPC</th>
            <th>Supplier</th>
        </tr>

        <?php

        while (($row = $query->fetch_assoc())!==NULL){
            echo "<tr>";
            echo "<td><a href=vegetabledetails.php?id=",$row['id'], ">",
            $row['name'],"</a></td>";
            echo "<td>",$row['description'], "</td>";
            echo "<td>",$row['upc'], "</td>";
            echo "<td>",$row['supplier_id'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>



    <!-- all content goes in between these two tags -->
    <script src="js/script.js"></script>
<?php
require_once ('php/footer.php');
?>