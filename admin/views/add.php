<?php defined('root') OR exit('No direct script'); ?>
<?php (isset($auth->info["status"])) ? true : die("auth error"); ?>

<form method="post" enctype="multipart/form-data">
    <div class="parenSelector">

        <table class="formTable geoDisplay">
            <tr>
                <td>
                    <label for="instructor">Instructor</label>
                    <input type="text" name="instructor" class="inputStyle" value='' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="style">Style</label>
                    <select name="style" class="inputStyle" required>
                        <option value="Hatha">Hatha</option>
                        <option value="Ashtanga">Ashtanga</option>
                        <option value="Vinyasa">Vinyasa</option>
                    </select>
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="duration">Duration</label>
                    <select name="duration" class="inputStyle" required>
                        <option value="30">30</option>
                        <option value="60">60</option>
                    </select>
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="maximum">Maximum</label>
                    <input type="text" name="maximum" class="inputStyle" value='' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="date">Date</label>
                    <input type="date" name="date" class="inputStyle" value='' required />
                </td>
            </tr>
            <tr><td height="15"></td><tr>
            <tr>
                <td>
                    <label for="time">Time</label>
                    <input type="time" name="time" class="inputStyle" value='' required />
                </td>
            </tr>
        </table>


        <table class="formTable visibleAlways">
            <tr><td class="form_label_title">Image</td></tr>
            <tr><td><input type="file" name="attach" /></td></tr>
            <tr><td height="15"></td><tr>
            <tr><td><input type="submit" name="addClass" class="saveStyle" value="Add"/></td></tr>
        </table>
    </div>
</form>