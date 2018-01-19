<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yoga</title>
        <meta name="robots" content="noindex,nofollow">
        <meta name="robots" content="NOODP">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="assets/css/style.css" />
        <script type="text/javascript" src="assets/js/jquery-1.11.1.min.js"></script>
    </head>
    <body>
        <div id="header" class="cf">
            <span class="logoutWrapp fr cf"><form method="post" action="index.php" class="formTable"><input type="submit" name="logout" class="logoutStyle  fr" value="" /></form></span>
        </div>

        <div id="content">
            <?php require 'views/sidebar.php'; ?>
            <div id="main">
                <div id="moduleWrapper">
                    <?php
                    require 'core/core.php';
                    $core = new Core();

                    if (isset($_GET["action"])) {
                        switch ($_GET["action"]) {
                            case "view-classes":
                                require 'views/classes.php';
                                break;
                            case "add-classes":
                                (isset($_POST["addClass"])) ? $core->add() : null;
                                require 'views/add.php';
                                break;
                            case "update-classes":
                                $info = $core->getClass($_GET["id"]);
                                (isset($_POST["updateClass"])) ? $core->update($_GET["id"]) : null;
                                require 'views/edit.php';
                                break;
                            case "delete-classes":
                                $core->delete($_GET["id"]);
                                break;
                            case "view-applicants":
                                require 'views/applicants.php';
                                break;
                            default:
                                break;
                        }
                    }
                    ?>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>


    </body>
</html>



