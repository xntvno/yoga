<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>

<form method="post" enctype="multipart/form-data">
    <div class="parenSelector">
        <table class="formTable geoDisplay">
            <tr>
                <td>
                    <label for="instructor">Instructor</label>
                    <input type="text" name="instructor" class="inputStyle" value='<?php echo $info["instructor"] ?>' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="style">Style</label>
                    <select name="style" class="inputStyle" required>
                        <option value="Hatha" <?php echo ($info["style"] == "Hatha") ? "selected=" : "" ?>>Hatha</option>
                        <option value="Ashtanga" <?php echo ($info["style"] == "Ashtanga") ? "selected=" : "" ?>>Ashtanga</option>
                        <option value="Vinyasa" <?php echo ($info["style"] == "Vinyasa") ? "selected=" : "" ?>>Vinyasa</option>
                    </select>
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="duration">Duration</label>
                    <select name="duration" class="inputStyle" required>
                        <option value="30" <?php echo ($info["duration"] == "30") ? "selected=" : "" ?>>30</option>
                        <option value="60" <?php echo ($info["duration"] == "60") ? "selected=" : "" ?>>60</option>
                    </select>
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="maximum">Maximum</label>
                    <input type="text" name="maximum" class="inputStyle" value='<?php echo $info["maximum"] ?>' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="date">Date</label>
                    <input type="date" name="date" class="inputStyle" value='<?php echo $info["date"] ?>' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="time">Time</label>
                    <input type="time" name="time" class="inputStyle" value='<?php echo $info["time"] ?>' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="full">Full</label>
                    <input type="checkbox" name="full" <?php echo ($info["full"]) ? "checked" : "" ?>  />
                </td>
            </tr>
        </table>

        <table class="formTable visibleAlways">
            <tr><td class="form_label_title">Image</td></tr>
            <tr><td><input type="file" name="attach"  /></td></tr>
            <tr><td height="15"></td><tr>
            <tr><td><input type="submit" name="updateClass" class="saveStyle" value="Update"/></td></tr>
        </table>
    </div>
</form>