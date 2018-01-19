<div class="container">
    <div class="row">
        <?php foreach ($core->getAllClasses() as $keyClasses => $valueClasses) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <a href="#"><img class="card-img-top" src="uploads/classes/<?php echo $valueClasses["attach"]; ?>" alt=""></a>
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $valueClasses["style"]; ?></h4>
                        <h5 class="x-blue"><span class="x-purple">Duration:</span> <?php echo $valueClasses["duration"]; ?> Minute</h5>
                        <h5 class="x-blue"><span class="x-purple">Participants Limit:</span> <?php echo $valueClasses["maximum"]; ?></h5>
                        <p class="card-text">
                            <?php echo $valueClasses["style"]; ?> class, instructed by <?php echo $valueClasses["instructor"]; ?> <br />
                            Starting: <strong><?php echo $valueClasses["date"]; ?></strong> / <strong><?php echo $valueClasses["time"]; ?> </strong>
                        </p>
                    </div>
                    <div class="card-footer">
                        <?php if ($valueClasses["full"]): ?>
                            <div class="alert alert-danger" role="alert">Class is full</div>
                        <?php elseif (time() > $valueClasses["unix"]): ?>
                            <div class="alert alert-danger" role="alert">Expired</div>
                        <?php else: ?>
                            <div class="alert alert-success x-jump x-selectClassJs" data-select="<?php echo $valueClasses["id"] ?>" role="alert" href="#apply">Apply</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
