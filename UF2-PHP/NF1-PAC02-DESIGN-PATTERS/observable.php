<?php


abstract class Observable{

    private $observers = array();

    public function addObserver(Observer $observer){
        array_push($this->observers, $observer);
    }

    public function notifyObservers(){
        for($i=0;$i<count($this->observers);$i++){
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }



}


class DataSource extends Observable{

    private $elementos;
   


    function __construct(){
        $this->elementos = array();
        
    }

    public function addRecord($elemento){
        array_push($this->elementos, $elemento);
        $this->notifyObservers();
    }

    public function getData(){
        return array($this->elementos);
    }



















}