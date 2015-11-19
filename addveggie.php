<?php
/*
 * Author: Ryan McCrory
 * Date: 11-19-15
 * File: addveggie.php
 * Description: Add a veggie to the list
 * 
 */
$page_title = "Add a veggie";
require_once 'php/header.php';
?>

<h2>Add New Veggie</h2>
<form action="insertveggie.php" method="get">
    <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
        <tr>
            <td style="text-align: right; width: 100px">Vegetable: </td>
            <td><input name="veggie" type="text" size="100" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">Supplier: </td>
            <td><input name="supp" type="text" size="40" required /></td>
        </tr>
        <tr>
            <td style="text-align: right">UPC: </td>
            <td><input name="upc" type="number" required /></td>
        </tr>
        <tr>
            <td style="text-align: right; vertical-align: top">Description:</td>
            <td><textarea name="desc" rows="6" cols="65"></textarea></td>
        </tr>
    </table>
    <div class="addVeggie">
        <input type="submit" value="Add Veggie" />
        <input type="button" value="Cancel" onclick="window.location.href='vegetables.php'" />
    </div>
</form>

<?php
require_once 'php/footer.php';