<?php

class Config {

    public static $baseUrl = "/";
    public static $uploadsUrl = "uploads/";
    public static $layoutUrl = "layout/";
    public static $projectTitle = "Yoga Studio";
    public static $theme = "default";

}

$connection = new Connection(
        "localhost", //host
        "root", //user
        "", //pass
        "yoga" //database
);

class Connection {

    public $var;
    public static $pdo;
    protected $link;
    private $server, $username, $password, $db;

    public function __construct($server, $username, $password, $db) {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
        $this->connect();
    }

    private function connect() {
        try {
            $conn = new PDO('mysql:host=' . $this->server . ';dbname=' . $this->db, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->exec("set names utf8");
            self::$pdo = $conn;
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }
    }

}

class globalClass {

    public static function qQuerySingle($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        return ($res->execute($array) ) ? true : false;
    }

    public static function qQuerySingleLast($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        return ($res->execute($array) ) ? Connection::$pdo->lastInsertId() : false;
    }

    public static function qQuery($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        $res->execute($array);
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function qResult($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        $res->execute($array);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function menuTable() {
        return array(
            "apps" => "applications",
            "classes" => "classes"
        );
    }

    public static $lang;

}

$GLOBALS["table"] = globalClass::menuTable();
?>