<?php

class mainClass extends globalClass {

    public function getAllClasses() {
        return parent::qQuery("SELECT * FROM `" . $GLOBALS["table"]["classes"] . "` ORDER BY `unix` DESC ", array());
    }

    public function getAvailableClasses() {
        return parent::qQuery("SELECT * FROM `" . $GLOBALS["table"]["classes"] . "`  WHERE `full` = :full AND `unix` > :time ORDER BY `unix` DESC ", array("full" => 0, "time" => time()));
    }

}

?>