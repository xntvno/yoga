<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>
<div id="sideBar">
    <ul class="sideBarParent">
        <div class="relAtive doSideHover">
            <li>
                <a href="index.php?action=view-classes" class="title <?php echo ($_GET["action"] == "view-classes") ? "current" : "" ?>" data-child="direct"> 
                    Classes<span class="ico down"></span>
                    <span class="icoSelected"></span>
                </a>
                <a href="index.php?action=view-applicants" class="title <?php echo ($_GET["action"] == "view-applicants") ? "current" : "" ?>" data-child="direct"> 
                    Applicants<span class="ico down"></span>
                    <span class="icoSelected"></span>
                </a>
            </li>
        </div>
    </ul>
</div>