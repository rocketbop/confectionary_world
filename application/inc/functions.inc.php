<?php

/*
 * This constant is declared in index.php
* It prevents this file being called directly
*/
defined('MY_APP') or die('Restricted access');

// Added some basic validation PB 23 12 2013
// Corrected typo in function name PB 23 12 2013
// Used a swtich statement instead of ifs and fixed a logic error as was always returning true. PB 26 12 2013
// Removed mf_id and taste validation, as always selected by default. PB 26 12 2013
function validateProduct($product) { 
	

	$productValid = true;
	
	switch("") {

		case ($product['title']):
		$productValid = false;
		break;
		case ($product['price']):
		$productValid = false;
		break;
		case ($product['description']):
		$productValid = false;
		break;
		default:
		$productValid = true;
		break;
	}
	return $productValid;
}

/*
* Fixed typos in query,
* changed $items to $product,
*
*/
//Added description PB 26 12 2013
function saveProduct($product) { 
	$sqlQuery = "INSERT INTO `products` (`title`, `mf_id`, `price`,
	`taste`, `description`)
	VALUES ('{$product['title']}','{$product['mf_id']}', '{$product['price']}', '{$product['taste']}', '{$product['description']}')";
	
	$result = mysql_query($sqlQuery);

	if (!$result) {
		echo $sqlQuery;
		die("error" . mysql_error());
	} 
	return mysql_insert_id();	
}

/* 
 * Realistically, you would pass function $_FILES array, but here we are assuming it's available
 * UPLOAD_PATH is defined in config.inc.php
 */

// Amended the destination parameter of move_uploaded_file to include file name as cannot be a directory PB 26 12 2013

function uploadFiles($product_id) {
	if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], UPLOAD_PATH . '/' . $_FILES['uploadedfile']['name'])) {
	
		saveImageRecord($product_id, basename( $_FILES['uploadedfile']['name']));	
		//echo basename( $_FILES['uploadedfile']['name']); 
	}
	else {
		echo "<p>There was an error uploading the file, please try again!</p>"; //Closed a <p> tag PB 26 12 2013
	}
}

// Fixed typos: movie_id, correct quoting PB 23 12 2013
// Fixed typo: $imageName should be quoted before passed as MySQL query PB 26 12 2013
function saveImageRecord($product_id, $imageName) {
	$sqlQuery = "UPDATE `products` SET `imagefile` = '$imageName' WHERE `product_id` = '$product_id'";
	//echo "<p>$sqlQuery</p>"; // Test echo PB 23 12 2013
	$result = mysql_query($sqlQuery);			
}

/*
 * Typical things that go wrong with next script
 * You must update the insert.php file to capture any new fields
 * You must ensure there are commas on any new lines you create
 * To resolve issues, uncomment the lines which echo the $sqlQuery  and die();
 */


function updateMovie($product) {
    $productID = (int) $product['movie_id'];
    $sqlQuery = "UPDATE products SET ";
     $sqlQuery .= " taste = '" . $produc['taste'] . "',";
     $sqlQuery .= " price = '". $product['price'] . "',";
     $sqlQuery = " title = '". $product['ttle'] . "',";
     $sqlQuery = " description = '". $product['description'] . "', ";
     $sqlQuery .= " mf_id = '". $product['mf_id'] . "'";
    
    $sqlQuery .= " WHERE productid = $productID";
    
  //  echo $sqlQuery;
 //  die("...");
    
    $result = mysql_query($sqlQuery);
	
    
    
	if (!$result) {
		die("error" . mysql_error());
        }
	
    
}


function deleteProduct($id) {
    $productID = (int) $id;
    $sqlQuery = "DELETE FROM `products` WHERE `product_id` = $productID;"; // Put in name of table to be deleted PB 23 12 2013
    
    $result = mysql_query($sqlQuery);
    if (!$result) {
		die("error" . mysql_error());
        }
}


function retrieveMovie($id) {

	$sqlQuery = "SELECT * from  WHERE product_id = $id";

	$result = mysql_query($sqlQuery);
	
	if(!$result) die("error" . mysql_error());
	
	
	//echo $sqlQuery;


	return mysql_fetch_assoc($result);
	
}




function output_edit_link($id) {
	
	return "<a href='edit.php?id=$id'>Edit</a>"; // Amended to edit.php PB 22 12 2013
	
	
}
function output_delete_link($id) {

	return "<a href='delete.php?id=$id'>Delete</a>"; //Amended to delete.php PB 22 12 2013


}

function output_selected($currentValue, $valueToMatch) {
	
	
	if ($currentValue == $valueToMatch) {
		
		return "selected ='selected'";
		
	}
	
}

function authenticate($username, $password) {   
    $boolAuthenticated = false;
    
    $sqlQuery = "SELECT * FROM `adminusers` WHERE "; //put adminusers in quotes PB 22 12 2013
    $sqlQuery .= "`username` = '" . $username . "'"; //put username in quotes PB 22 12 2013
    $sqlQuery .= " AND ";
    $sqlQuery .= "`password` = '" . $password . "';"; //put password in quotes PB 22 12 2013
    //echo "$sqlQuery"; // print out the full query to check it looks okay - PB 22 12 2013
    
    $result = mysql_query($sqlQuery);
    
    if (!$result)  die("Error: " . $sqlQuery . mysql_error());
    
    if (mysql_num_rows($result)==1) {
        $boolAuthenticated = true;
    }
    
    return $boolAuthenticated;
}