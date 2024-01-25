<?php

require_once('observable.php');
require_once('widgetGrafic.php');

$dat = new DataSource();

$widget = new Grafic();

$dat->addObserver($widget);

$dat->addRecord('Red', 300, 'rgb(255, 99, 132)');
$dat->addRecord('Blue', 30, 'rgb(54, 162, 235)');
$dat->addRecord('Yellow', 100, 'rgb(255, 205, 86)');

$widget->draw();
?>