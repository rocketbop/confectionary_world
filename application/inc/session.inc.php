<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] != 1) {

header("Location: index.php");

}

?>
