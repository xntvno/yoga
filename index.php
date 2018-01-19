<?php
require 'core/config.php';
require 'core/main.php';
$core = new mainClass();
?>

<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <link rel="stylesheet" href="css/main.css" />
        <link rel="stylesheet" href="css/bootstrap-overwrite.css" />
        <title>Yoga Studio</title>
    </head>
    <body data-spy="scroll" data-target=".navbar" data-offset="276">
        <header><?php require 'parts/header.php'; ?></header>
        <section id="home">
            <?php require 'parts/carousel.php'; ?>
        </section>
        <section id="about">
            <?php require 'parts/about.php'; ?>
        </section>
        <section id="classes">
            <?php require 'parts/classes.php'; ?>
        </section>
        <section id="apply">
            <?php require 'parts/apply.php'; ?>
        </section>
        <section id="contact">
            <?php require 'parts/contact.php'; ?>
        </section>
        <section>
            <?php require 'parts/footer.php'; ?>
        </section>
        <?php require './parts/modal.php'; ?>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmngLl9vxv9LGTUsahiiHcmg_r2kjiMko&libraries=places"></script> 
        <script type="text/javascript" src="js/map.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>