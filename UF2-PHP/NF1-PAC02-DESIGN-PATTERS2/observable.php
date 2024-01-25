<?php

abstract class Observable {

    private $observers = array();

    public function addObserver(Observer $observer) {

        array_push($this->observers, $observer);
    }

    public function notifyObserver() {
        for ($i = 0; $i < count($this->observers); $i++) {
            $widget = $this->observers[$i];
            $widget->update($this);
        }
    }
}

class DataSource extends Observable {

    private $labels;
    private $datas;
    private $bgColors;

    function __construct() {
        $this->labels = array();
        $this->datas = array();
        $this->bgColors = array();
    }

    public function addRecord($label, $data, $bgColor) {
        array_push($this->labels, $label);
        array_push($this->datas, $data);
        array_push($this->bgColors, $bgColor);
        $this->notifyObserver();
    }

    public function getData() {
        return array($this->labels, $this->datas, $this->bgColors);
    }
}
?>
