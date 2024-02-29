<?php
require("class.pdofactory.php");
require("abstract.databoundobject.php");
require("class.user3.php");
require("class.rental.php");
require("class.store.php");
require("class.staff.php");

print "Running...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Usuario
// $objUser = new User($objPDO);

// $objUser->setFirstName("Steve");
// $objUser->setLastName("Nowicki");
// $objUser->setDateAccountCreated(date("Y-m-d"));

// print "First name is " . $objUser->getFirstName() . "<br />";
// print "Last name is " . $objUser->getLastName() . "<br />";

// print "Saving...<br />";

// //$objUser->Save();

// $idUser = $objUser->getID();
// print "ID in database is " . $idUser . "<br />";

// print "Destroying object...<br />";
// unset($objUser);

// print "Recreating object from ID $idUser<br />";
// $objUser = new User($objPDO, $idUser);

// print "First name is " . $objUser->getFirstName() . "<br />";
// print "Last name is " . $objUser->getLastName() . "<br />";

// print "Committing a change.... Steve will become Steven, 
//        Nowicki will become Nowickcow<br/>";
// $objUser->setFirstName("Steven");
// $objUser->setLastName("Nowickcow");
// print "Saving...<br />";
// //$objUser->Save();

// print "<hr>";

// // Alquiler
$objRental = new Rental($objPDO,4);

$objRental->setRentalDate('2024-02-29 15:30:00');

$objRental->setInventoryID(4);
$objRental->setCustomerID(9);
$objRental->setReturnDate('2023-02-28 14:30:00');
$objRental->setStaffID(23);
$objRental->setLastUpdate('2022-02-28 14:30:00');

$objRental->Save();


print "Rental date is " . $objRental->getRentalDate() . "<br />";
print "Inventory ID is " . $objRental->getInventoryID() . "<br />";
print "Customer ID is " . $objRental->getCustomerID() . "<br />";    
print "Return date is " . $objRental->getReturnDate() . "<br />";
print "Staff ID is " . $objRental->getStaffID() . "<br />";
print "Last update is " . $objRental->getLastUpdate() . "<br />";
// $objRental->Save();
$objRental->MarkForDeletion();
unset($objRental);

// print "<hr>";

// $objStore = new Store($objPDO,2);

// //$objStore->setStoreName("Mi Tienda");
// $objStore->setManagerStaffID(99);
// $objStore->setAddressID(3);
// $objStore->setLastUpdate(date("Y-m-d H:i:s"));
// $objStore->Save();

// //echo "Nombre de la tienda: " . $objStore->getStoreName() . "<br />";
// echo "ID del personal gerente: " . $objStore->getManagerStaffID() . "<br />";
// echo "ID de dirección: " . $objStore->getAddressID() . "<br />";
// echo "Última actualización: " . $objStore->getLastUpdate() . "<br />";

// $objStore->Save();
// $objStore->MarkForDeletion();
// unset($objStore);


// print "<hr>";




// $objStaff = new Staff($objPDO,4);

// // Setters
// $objStaff->setFirstName("Dani2");
// $objStaff->setLastName("Doe2");
// $objStaff->setAddressID(1232);
// $objStaff->setEmail("john@example.com2");
// $objStaff->setStoreID(7892);
// $objStaff->setActive(true);
// $objStaff->setUsername("john_doe2");
// $objStaff->setPassword("hashed_password2");
// $objStaff->setLastUpdate(date("Y-m-d H:i:s"));
// $objStaff->setPicture('binaryImageDat2');
// $objStaff->Save();
// // Getters
// echo "First Name: " . $objStaff->getFirstName() . "<br />";
// echo "Last Name: " . $objStaff->getLastName() . "<br />";
// echo "Address ID: " . $objStaff->getAddressID() . "<br />";
// echo "Email: " . $objStaff->getEmail() . "<br />";
// echo "Store ID: " . $objStaff->getStoreID() . "<br />";
// echo "Active: " . $objStaff->getActive() . "<br />";
// echo "Username: " . $objStaff->getUsername() . "<br />";
// echo "Password: " . $objStaff->getPassword() . "<br />";
// echo "Last Update: " . $objStaff->getLastUpdate() . "<br />";
// echo "Picture: " . base64_encode($objStaff->getPicture()) . "<br />";


// //$objStaff->Save();

// $objStaff->MarkForDeletion();
// unset($objRental);


print "<hr>";print "<hr>";







?>
