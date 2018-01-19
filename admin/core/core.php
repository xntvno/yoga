<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>
<?php

class Core extends globalClass {

    private function prepareImg($getOld, $folder, $file) {
        $uploadMainImg = parent::uploadMaterial("../" . $folder, $file['name'], $file['tmp_name'], 1);
        ($getOld["attach"]) ? unlink("../" . $folder . $getOld["attach"]) : null;
        return $uploadMainImg;
    }

    public function getClassList() {
        return parent::qQuery("SELECT * FROM `classes` ORDER BY id Desc ", array());
    }

    public function getApplicantList() {
        return parent::qQuery("SELECT * FROM `applications` ORDER BY id Desc ", array());
    }
    
    public function getClass($id) {
        return parent::qResult("SELECT * FROM `classes` WHERE `id` = :id  ", array("id" => $id));
    }

    public function update($id) {
        $getOld = parent::qResult("SELECT * FROM `classes` WHERE `id` = :id ", array(':id' => $id));
        $uploadMainImg = ($_FILES["attach"]["error"]) ? $getOld : $this->prepareImg($getOld, "uploads/classes/", $_FILES["attach"]);
        parent::qQuerySingle("UPDATE `classes` SET
            `instructor` = :instructor,
            `style` = :style,
            `duration` = :duration,
            `full` = :full,
            `maximum` = :maximum,
            `date` = :date,
            `time` = :time,
            `unix` = :unix,
            `attach` = :attach WHERE `id` = :id", array(
            ':instructor' => $_POST["instructor"],
            ':style' => $_POST["style"],
            ':duration' => $_POST["duration"],
            ':full' => isset($_POST["full"]) ? 1 : 0,
            ':maximum' => $_POST["maximum"],
            ':date' => $_POST["date"],
            ':time' => $_POST["time"],
            ':unix' => strtotime($_POST["date"] . " " . $_POST["time"]),
            ':attach' => $uploadMainImg["attach"],
            ':id' => $id
        ));
        header("location: index.php?action=update-classes&id=" . $_GET["id"]);
    }

    public function add() {
        $uploadMainImg = ($_FILES["attach"]["error"]) ? array("attach" => "") : $this->prepareImg(false, "uploads/classes/", $_FILES["attach"]);
        $query = parent::qQuerySingle("INSERT INTO `classes` SET
            `instructor` = :instructor,
            `style` = :style,
            `duration` = :duration,
            `maximum` = :maximum,
            `date` = :date,
            `time` = :time,
            `unix` = :unix,
            `attach` = :attach", array(
                    ':instructor' => $_POST["instructor"],
                    ':style' => $_POST["style"],
                    ':duration' => $_POST["duration"],
                    ':maximum' => $_POST["maximum"],
                    ':date' => $_POST["date"],
                    ':time' => $_POST["time"],
                    ':unix' => strtotime($_POST["date"] . " " . $_POST["time"]),
                    ':attach' => $uploadMainImg["attach"]
        ));
        header("location: index.php?action=view-classes");
    }

    public function delete($id) {
        $folder = "../uploads/classes/";
        $fromMain = parent::qResult("SELECT * FROM `classes` WHERE `id` = :id ", array(":id" => $id));
        ($fromMain["attach"]) ? unlink($folder . $fromMain["attach"]) : null;
        $query = parent::qQuerySingle("DELETE FROM `classes` WHERE `id` = :id ", array(':id' => $id));
        header("location: index.php?action=view-classes");
    }

}

?>
