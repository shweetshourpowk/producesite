<?php

$page_title = "Suppliers";

require_once ('php/header.php');
require_once('php/connect.php');
$sql = "SELECT * FROM supplier";
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

    <table class="supplierlist">
        <tr>
            <th>Supplier</th>
            <th>State</th>
            <th>Address</th>
        </tr>

        <?php

        while (($row = $query->fetch_assoc())!==NULL){
            echo "<tr>";
            echo "<td><a href=supplierdetails.php?id=",$row['supplier_id'], ">",
            $row['name'],"</a></td>";
            echo "<td>",$row['State'], "</td>";
            echo "<td>",$row['address'], "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- all content goes in between these two tags -->
    <script src="js/script.js"></script>
<?php
require_once ('php/footer.php');
?>