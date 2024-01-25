<?php

require_once("observable.php");
require_once("widgets.php");

$dat = new DataSource();

$widgetA =  new BasicWidget();


$dat->addObserver($widgetA);


$dat->addRecord("drum");
$dat->addRecord("hola");
$dat->addRecord("Javi");
$dat->addRecord("Guapo");

$widgetA->draw();
