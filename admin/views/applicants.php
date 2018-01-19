<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>
<h2 class="direct">LIST</h2>
<div>
    
        <div>
            <div class="fl">
                <form method="post" action="" enctype="multipart/form-data">
                    <table class="formTableList noMargin"  width="500" border="1" cellpadding="0" cellspacing="0">
                        <?php foreach ($core->getApplicantList() as $key => $value) : ?>
                        <tr class="<?php echo ($key % 2 == 0) ? "tr1" : "tr2"; ?>">
                            <td><?php echo $core->getClass($value["course-id"])["style"]; ?></td>
                            <td><?php echo mb_substr($value["name"], 0, 50, "utf-8"); ?></td>
                            <td><?php echo $value["email"]; ?></td>
                            <td><?php echo $value["phone"]; ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </form>
            </div>
            <div class="cb"></div>
        </div>
    
</div>

