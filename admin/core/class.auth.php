<?php defined('root') OR exit('No direct script'); ?>
<?php

class global_functions {

    public $info;

    public static function qQuerySingle($sql, $array) {
        $res = Connection::$pdo->prepare($sql);
        return ($res->execute($array) ) ? true : false;
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

}

class authentication extends global_functions {

    public $cookie_time = 3000;
    public $cookie_remember_time = 25920000;
    public $response;
    public $domain = 'index.php';
    public $cookie;
    public $u_info;
    public $cookie_secret_key = "3287sjdh$#&^djhg3#$%^$&&^^6!!!!";
    public $password_secret_key = "23424$%^%df$%&*#gd@#%^^&&*";

    public function check_cookie() {
        $this->cookie = $_COOKIE;
        if (isset($_GET["ck"])) {
            (empty($this->cookie)) ? $this->response = array("response_value" => "not_supported_cookie", "status" => false) : header('Location:' . $this->domain);
        } else {
            (empty($this->cookie)) ? $this->check_cookie_support() : $this->check_cookie_status();
        }
    }

    public function check_user_private_cookie() {
        $result = parent::qResult("SELECT * FROM `users` WHERE `id` = :id AND `user_session` = :usession ", array(":id" => $this->cookie["user_id"], ":usession" => $this->cookie["sess_id"]));
        return ($result) ? $this->u_info = $result : false;
    }

    public function check_cookie_status() {
        if (!empty($this->cookie["sess_id"]) && !empty($this->cookie["user_id"]) && $this->check_user_private_cookie()) {
            $this->register_user_cookie();
        } else {
            $this->register_game_cookie();
        }
    }

    public function check_cookie_support() {
        setcookie("cookie_support", "1", time() + $this->cookie_time);
        header('Location: ' . $this->domain . '?ck=1');
    }

    public function remember_cookies() {
        if (isset($_POST["remember"])) {
            $this->cookie_time = $this->cookie_remember_time;
            setcookie("remember", "1", time() + $this->cookie_time);
        } else {
            ($this->u_info["private_time"]) ? $this->cookie_time = $this->u_info["private_time"] : $this->cookie_time;
        }
    }

    public function register_user_cookie() {
        $sess_id = hash_hmac('sha1', md5("#*" . rand("11111", "99999") . "^*" . microtime(true)), $this->cookie_secret_key);
        parent::qQuerySingle("UPDATE `users` SET `user_session` = :user_session,`session_time` = :session_time WHERE `id` = :id ", array(":user_session" => $sess_id, ":session_time" => time(), ":id" => $this->u_info["id"]));

        (empty($this->cookie["remember"])) ? $this->remember_cookies() : $this->cookie_time = $this->cookie_remember_time;
        setcookie("sess_id", $sess_id, time() + $this->cookie_time);
        setcookie("user_id", $this->u_info["id"], time() + $this->cookie_time);
        $this->response = array("response_value" => "success_auth", "uid" => $this->u_info["id"], "status" => true);
    }

    public function register_game_cookie() {
        (isset($_POST["login"])) ? $true = true : $true = false;
        if ($true) {
            $user_pass = hash_hmac('sha1', $_POST["password"], $this->password_secret_key);
            $result = parent::qResult("SELECT * FROM `users` WHERE `user_name` = :user_name AND `user_pass` = :user_pass ", array(":user_name" => $_POST["username"], ":user_pass" => $user_pass));
            if ($result) {
                $this->u_info = $result;
                $this->register_user_cookie();
            } else {
                $this->response = array("response_value" => "Check Username/Password", "status" => false);
            }
        } else {
            $this->response = array("response_value" => "Auth=0", "status" => false);
        }
    }

    public function logout() {
        setcookie("sess_id", '', time() + $this->cookie_time);
        setcookie("user_id", '', time() + $this->cookie_time);
        setcookie("remember", '', time() + $this->cookie_time);
        $this->response = array("response_value" => "logout", "status" => false);
    }

    public function __construct() {
        (isset($_POST["logout"])) ? $this->logout() : $this->check_cookie();
        $this->info = $this->response;
    }

}

?>