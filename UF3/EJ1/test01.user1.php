<?php

require("class.Customer.php");

$objCustomer2 = new Customer();
$objCustomer2->setCust_code("123");
$objCustomer2->setCust_name("John Doe");
$objCustomer2->setCust_city("Cityville");
$objCustomer2->setWorking_area("Downtown");
$objCustomer2->setCust_country("Countryland");
$objCustomer2->setGrade("A");
$objCustomer2->setOpening_amt(1000);
$objCustomer2->setReceive_amt(500);
$objCustomer2->setPayment_amt(200);
$objCustomer2->setPhone_no("123-456-7890");
$objCustomer2->setAgent_code("789");


$objCustomer1 = new Customer();
$objCustomer1->setCust_code("456");
$objCustomer1->setCust_name("Jane Smith");
$objCustomer1->setCust_city("Townsville");
$objCustomer1->setWorking_area("Suburb");
$objCustomer1->setCust_country("Otherland");
$objCustomer1->setGrade("B");
$objCustomer1->setOpening_amt(800);
$objCustomer1->setReceive_amt(300);
$objCustomer1->setPayment_amt(150);
$objCustomer1->setPhone_no("987-654-3210");
$objCustomer1->setAgent_code("456");






// Print details for Customer 1
echo "Customer 1 Code is ". $objCustomer1->getCust_code() . "<br/>";
echo "Customer 1 Name is ". $objCustomer1->getCust_name() . "<br/>";
echo "Customer 1 City is ". $objCustomer1->getCust_city() . "<br/>";
echo "Customer 1 Working Area is ". $objCustomer1->getWorking_area() . "<br/>";
echo "Customer 1 Country is ". $objCustomer1->getCust_country() . "<br/>";
echo "Customer 1 Grade is ". $objCustomer1->getGrade() . "<br/>";
echo "Customer 1 Opening Amount is ". $objCustomer1->getOpening_amt() . "<br/>";
echo "Customer 1 Receive Amount is ". $objCustomer1->getReceive_amt() . "<br/>";
echo "Customer 1 Payment Amount is ". $objCustomer1->getPayment_amt() . "<br/>";
echo "Customer 1 Phone Number is ". $objCustomer1->getPhone_no() . "<br/>";
echo "Customer 1 Agent Code is ". $objCustomer1->getAgent_code() . "<br/>";



// Print details for Customer 2
echo "<br/>";
echo "Customer 2 Code is ". $objCustomer2->getCust_code() . "<br/>";
echo "Customer 2 Name is ". $objCustomer2->getCust_name() . "<br/>";
echo "Customer 2 City is ". $objCustomer2->getCust_city() . "<br/>";
echo "Customer 2 Working Area is ". $objCustomer2->getWorking_area() . "<br/>";
echo "Customer 2 Country is ". $objCustomer2->getCust_country() . "<br/>";
echo "Customer 2 Grade is ". $objCustomer2->getGrade() . "<br/>";
echo "Customer 2 Opening Amount is ". $objCustomer2->getOpening_amt() . "<br/>";
echo "Customer 2 Receive Amount is ". $objCustomer2->getReceive_amt() . "<br/>";
echo "Customer 2 Payment Amount is ". $objCustomer2->getPayment_amt() . "<br/>";
echo "Customer 2 Phone Number is ". $objCustomer2->getPhone_no() . "<br/>";
echo "Customer 2 Agent Code is ". $objCustomer2->getAgent_code() . "<br/>";


?>