<?php

$page_title = "Supplier Details";

require_once ('php/header.php');
require_once('php/connect.php');
//retrieve supplier id from a query string
if(!filter_has_var(INPUT_GET, 'id')){
    echo "Error: supplier id was not found.";
    require_once('php/footer.php');
    exit();
}
$supplier_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM supplier WHERE supplier_id=" . $supplier_id;

//execute the query
$query = $conn->query($sql);

//retrieve results
$row = $query->fetch_assoc();


//Handle selection errors
if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    //include the footer
    require_once ('php/footer.php');
    exit;
}
//display results in a table
?>
    <!-- all content goes in between these two tags -->
    <h1>The Vegetable People</h1>
    <hr>

    <h2>Supplier Details</h2>

    <table class="userlist">
        <tr>
            <th>Supplier</th>
            <td><?php echo $row['name']?></td>
        </tr>
        <tr>
            <th>State</th>
            <td><?php echo $row['State']?></td>
        </tr>
        <tr>
            <th>Address</th>
            <td><?php echo $row['address']?></td>
        </tr>

    </table>

    <p><a href="suppliers.php">Back to Suppliers</a></p>

<?php
// clean up resultsets when we're done with them!
$query->close();

// close the connection.
$conn->close();
?>


    <!-- all content goes in between these two tags -->
    <script src="js/script.js"></script>
<?php
require_once ('php/footer.php');
?>