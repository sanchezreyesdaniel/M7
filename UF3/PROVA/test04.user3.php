<?php
require("class.pdofactory.php");
require("abstract.databoundobject.php");
require("class.userApp.php");

echo "Ejecutando...<br />";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432";
$objPDO = PDOFactory::GetPDO($strDSN, "postgres", "root", array());
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Crear objeto UserApp y pasar $objPDO como argumento

ECHO "HOLA";

$objUserApp1 = new UserApp($objPDO);


$objUserApp1->setNom("Dani");
$objUserApp1->setGroup("Grupo1");
$objUserApp1->setCreated(date("Y-m-d H:i:s"));
$objUserApp1->setLastUpdated(date("Y-m-d H:i:s"));
$objUserApp1->setIsActive(true);
// $objUserApp1->Save();

echo "ID de UserApp: " . $objUserApp1->getID() . "<br />";
echo "Nombre de UserApp: " . $objUserApp1->getNom() . "<br />";
echo "Grupo de UserApp: " . $objUserApp1->getGroup() . "<br />";
echo "Created de UserApp: " . $objUserApp1->getCreated() . "<br />";
echo "Last Updated de UserApp: " . $objUserApp1->getLastUpdated() . "<br />";
echo "IsActive de UserApp: " . ($objUserApp1->getIsActive() ? 'true' : 'false') . "<br />";

$objUserApp2 = new UserApp($objPDO);


$objUserApp2->setNom("Dani2");
$objUserApp2->setGroup("Grupo2");
$objUserApp2->setCreated(date("Y-m-d H:i:s"));
$objUserApp2->setLastUpdated(date("Y-m-d H:i:s"));
$objUserApp2->setIsActive(true);
// $objUserApp2->Save();

echo "ID de UserApp: " . $objUserApp2->getID() . "<br />";
echo "Nombre de UserApp: " . $objUserApp2->getNom() . "<br />";
echo "Grupo de UserApp: " . $objUserApp2->getGroup() . "<br />";
echo "Created de UserApp: " . $objUserApp2->getCreated() . "<br />";
echo "Last Updated de UserApp: " . $objUserApp2->getLastUpdated() . "<br />";
echo "IsActive de UserApp: " . ($objUserApp2->getIsActive() ? 'true' : 'false') . "<br />";



$objUserApp3 = new UserApp($objPDO);


$objUserApp3->setNom("Dani3");
$objUserApp3->setGroup("Grupo3");
$objUserApp3->setCreated(date("Y-m-d H:i:s"));
$objUserApp3->setLastUpdated(date("Y-m-d H:i:s"));
$objUserApp3->setIsActive(true);
// $objUserApp3->Save();

echo "ID de UserApp: " . $objUserApp3->getID() . "<br />";
echo "Nombre de UserApp: " . $objUserApp3->getNom() . "<br />";
echo "Grupo de UserApp: " . $objUserApp3->getGroup() . "<br />";
echo "Created de UserApp: " . $objUserApp3->getCreated() . "<br />";
echo "Last Updated de UserApp: " . $objUserApp3->getLastUpdated() . "<br />";
echo "IsActive de UserApp: " . ($objUserApp3->getIsActive() ? 'true' : 'false') . "<br />";

// print "Deleting...";

// $objActor->MarkForDeletion();

// unset($objActor);

echo '<hr>';

$objUserApp1 = new UserApp($objPDO,4);

$objUserApp1->setNom("DaniModificado");
$objUserApp1->setGroup("GrupoModificado");
$objUserApp1->setCreated(date("2023-03-14"));
$objUserApp1->setLastUpdated(date("2023-03-13"));
$objUserApp1->setIsActive(true);
$objUserApp1->Save();

echo "ID de UserApp: " . $objUserApp1->getID() . "<br />";
echo "Nombre de UserApp: " . $objUserApp1->getNom() . "<br />";
echo "Grupo de UserApp: " . $objUserApp1->getGroup() . "<br />";
echo "Created de UserApp: " . $objUserApp1->getCreated() . "<br />";
echo "Last Updated de UserApp: " . $objUserApp1->getLastUpdated() . "<br />";
echo "IsActive de UserApp: " . ($objUserApp1->getIsActive() ? 'true' : 'false') . "<br />";


$objUserApp1->MarkForDeletion();
unset($objUserApp1);
?>
