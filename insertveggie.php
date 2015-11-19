<?php

/*
 * Author: Ryan McCrory
 * Date: 11-19-15
 * File: insertveggie.php
 * Description: Add a book to be displayed with other books
 *
 */
 
$page_title = "PHP Online Bookstore Add Book";
require_once 'php/header.php';
require_once('php/connect.php');

//if the script did not received post data, display an error message and then terminate the script immediately
//if (!filter_has_var(INPUT_POST, 'veggie') ||
//        !filter_has_var(INPUT_POST, 'supp') ||
//        !filter_has_var(INPUT_POST, 'upc') ||
//        !filter_has_var(INPUT_POST, 'desc')) {
//
//    echo "There were problems retrieving the veggie details. New veggie cannot be added.";
//    require_once 'php/footer.php';
//    $conn->close();
//    die();
//}

//add your code here
$veggie = $conn->real_escape_string(trim(filter_input(INPUT_GET, "veggie", FILTER_SANITIZE_STRING)));
$supp = $conn->real_escape_string(trim(filter_input(INPUT_GET, "supp", FILTER_SANITIZE_STRING)));
$upc = $conn->real_escape_string(trim(filter_input(INPUT_GET, "upc", FILTER_SANITIZE_STRING)));
$desc = $conn->real_escape_string(trim(filter_input(INPUT_GET, "desc", FILTER_SANITIZE_STRING)));


$sql = "INSERT INTO vegetables VALUES (NULL, '$veggie', '$desc', '$upc', '$supp')";

//determine the id of the newly added book
$id = $conn->insert_id;

$result = @$conn-> query($sql); //a Boolean value is returned.

if(!$result){
    //error handling.
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    include 'php/footer.php';
    exit;
}


//display a confirmation message and a link to display details of the new book
echo "You have successfully inserted the new vegetable into the database.";
echo "<p><a href='vegetabledetails.php?id=$id'>Vegetable Details</a></p>";
// close the connection.
$conn->close();

require_once 'php/footer.php';
