<?php defined('root') OR exit('No direct script'); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Yoga</title>
        <meta name="robots" content="noindex,nofollow">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Load theme -->
        <link rel="stylesheet" href="assets/css/style.css" />
        <!-- /Load theme -->
    </head>
    <body style="background-color: #111111;">
        <div id="authForm">
            <table width="100%" height="100%" style="position: absolute;">
                <tr>
                    <td width="100%" height="100%" valign="center">
                        <form method="post" action="index.php?action=view-classes">
                            <table class="authForm" border="0" cellpadding="0" cellspacing="0">
                                <tr><td class="authFirstBlock" colspan="2">Login</td></tr>
                                <tr><td height="30"></td></tr>
                                <tr><td class="formTitle" width="130" height="33">Username</td><td><input type="text" name="username" class="inputStyle" placeholder="username" /></td></tr>
                                <tr><td height="20"></td></tr>
                                <tr><td class="formTitle" width="130" height="33">Password</td><td><input type="password" name="password" class="inputStyle" placeholder="password" /></td></tr>
                                <tr><td height="25"></td></tr>
                                <tr><td></td><td class="rememberMe"><input type="checkbox" name="remember" /> Remember me</td></tr>
                                <tr><td></td><td height="30"><input type="submit" name="login" class="submitStyle" value="Login"/></td></tr>
                                <tr><td height="20"></td></tr>
                            </table>
                        </form>
                    </td>
                </tr>
            </table>
        </div>

    </body>
</html>



