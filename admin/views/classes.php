<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>
<div class="cf">
    <a class="buttonGreen" href="index.php?action=add-classes">Add Class</a>
</div>
<h2 class="direct">LIST</h2>
<div>
    <?php foreach ($core->getClassList() as $key => $value) : ?>
        <div>
            <div class="fl">
                <form method="post" action="" enctype="multipart/form-data">
                    <table class="formTableList noMargin"  width="500" border="1" cellpadding="0" cellspacing="0">
                        <tr class="<?php echo ($key % 2 == 0) ? "tr1" : "tr2"; ?>">
                            <td><?php echo mb_substr($value["style"], 0, 50, "utf-8"); ?></td>
                            <td width="50" align="center"><a href="index.php?action=update-classes&id=<?php echo $value["id"]; ?>">Edit</a></td>
                            <td width="50" align="center"><a href="index.php?action=delete-classes&id=<?php echo $value["id"]; ?>">Delete</a></td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="cb"></div>
        </div>
    <?php endforeach; ?>
</div>

