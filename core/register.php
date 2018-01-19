<?php

require './config.php';

class register extends globalClass {

    public function insert() {
        $check = parent::qResult("SELECT * FROM `" . $GLOBALS["table"]["classes"] . "`  WHERE `id` = :course ", array("course" => $_POST["course"]));
        if ($check["full"]) {
            echo json_encode(array("status" => "full"), true);
        } else {
            parent::qQuerySingle("INSERT INTO `" . $GLOBALS["table"]["apps"] . "` SET
            `course-id` = :course,
            `name` = :name,
            `phone` = :phone,
            `email` = :email,
            `comment` = :comment", array(
                ':course' => $_POST["course"],
                ':name' => $_POST["name"],
                ':phone' => $_POST["phone"],
                ':email' => $_POST["email"],
                ':comment' => $_POST["comment"]
            ));
            parent::qQuerySingle('UPDATE `' . $GLOBALS["table"]["classes"] . '` SET `applicants` = `applicants` + 1 WHERE `id` = :course ', array("course" => $_POST["course"]));
            $this->full($_POST["course"]);
            echo json_encode(array("status" => "success"), true);
        }
    }

    private function full($id) {
        $check = parent::qResult("SELECT * FROM `" . $GLOBALS["table"]["classes"] . "`  WHERE `id` = :course ", array("course" => $id));
        if ($check["applicants"] == $check["maximum"]) {
            parent::qQuerySingle('UPDATE `' . $GLOBALS["table"]["classes"] . '` SET `full` = :full WHERE `id` = :course ', array("full" => 1, "course" => $id));
        }
        return true;
    }

}

$call = new register();
if (isset($_POST["course"])) {
    $call->insert();
}
?>