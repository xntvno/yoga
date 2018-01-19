<div class="container-fluid  x-bg-silver">
    <div class="container">
        <div class="row">
            <div class="col-md-8 x-padding">
                <form>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input type="email" name="email" data-check="email" class="form-control js-inputs" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" data-check="empty" class="form-control js-inputs" id="nameInput" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="phoneInput">Phone</label>
                        <input type="text" data-check="empty" class="form-control js-inputs" id="phoneInput" placeholder="Phone">
                    </div>
                    <div class="form-group">
                        <label for="courseId">Select Class</label>
                        <select class="form-control js-inputs" id="courseId" data-check="empty" id="classes-list">
                            <?php foreach ($core->getAvailableClasses() as $keyNames => $valueNames) : ?>
                                <option value="<?php echo $valueNames["id"] ?>"><?php echo $valueNames["style"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentTextarea">Comment</label>
                        <textarea class="form-control js-inputs" data-check="empty" id="commentTextarea" rows="3"></textarea>
                    </div>

                    <div class="btn btn-primary jq-submit">Apply</div>
                </form>
            </div>
        </div>
    </div>
</div>