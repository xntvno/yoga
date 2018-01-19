<?php

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

$connection = new Connection("localhost", "root", "", "yoga");

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

    public static function qQueryLimit($sql, $empty, $skip, $max) {
        $res = Connection::$pdo->prepare($sql);
        $res->bindValue(':empty', $empty, PDO::PARAM_STR);
        $res->bindValue(':skip', (int) trim($skip), PDO::PARAM_INT);
        $res->bindValue(':max', (int) trim($max), PDO::PARAM_INT);
        $res->execute() or die(print_r($res->errorInfo()));
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function qCount($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        $res->execute($array);
        return $res->fetchColumn();
    }

    public static function qResult($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        $res->execute($array);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    public static function uploadMaterial($path, $file_name, $temp_name, $rename) {
        $folder = $path;
        $expld = explode(".", $file_name);
        $ext = $expld[count($expld) - 1];
        $randNam = md5(time() . rand(111, 999));
        $new_name = ($rename) ? $randNam . "-high." . strtolower($ext) : strtolower($file_name . "." . $ext);
        $pathFinal = $folder . $new_name;
        if (move_uploaded_file($temp_name, $pathFinal)) {
            return array("attach" => $new_name, "attachThumb" => $randNam . "." . strtolower($ext));
        }
    }

}

?>