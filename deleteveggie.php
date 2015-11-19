<?php

/*
 * Author: Ryan McCrory
 * Date: 11-19-15
 * File: deleteveggie.php
 * Description: Gives the option to delete a veggie
 *
 */
$page_title = "PHP Online Bookstore Delete Book";
require_once 'php/header.php';
require_once('php/connect.php');

//if there were problems retrieving book id, the script must end.
if(!filter_has_var(INPUT_GET, 'id')) {
    echo "Deletion cannot continue since there were problems retrieving veggie id";
    include('php/footer.php');
    exit;
}

//add your code here
$veggie_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "DELETE FROM vegetables WHERE id= $veggie_id";

$query = @$conn->query($sql);

if (!$query) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
}
//close database connection
$conn->close();

//display a confirmation message
echo "You have successfully deleted the veggie from the database.<br><br>";

require_once 'php/footer.php';