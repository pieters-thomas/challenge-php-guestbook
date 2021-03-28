<?php require 'includes/header.php' ?>


    <div class="container">
        <h1>Guestbook</h1>

        <form method="post">
            <fieldset>
                <legend>Leave us a Message</legend>

                <div class="form-group col-md-6">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="content">Message:</label>
                    <input type="text" name="content" id="content" class="form-control" required>
                </div>

            </fieldset>
            <fieldset>
                <button type="submit" class="btn btn-primary">Post!</button>
            </fieldset>
        </form>
    </div>

<?php

// echo "<div class='alert alert-warning' role='alert'>" .$error."</div>" .PHP_EOL;

/** @var $toDisplay */
/** @var $posts */
for ($i = 0; $i < $toDisplay; $i++): ?>
    <div class="border col-6 mx-auto mb-3 rounded">
        <h3><?php echo htmlspecialchars($posts[$i]->getTitle(), ENT_NOQUOTES); ?></h3>
        <p><?php echo htmlspecialchars($posts[$i]->getContent(), ENT_NOQUOTES); ?></p>
        <p>Sincerely <?php echo htmlspecialchars($posts[$i]->getName(), ENT_NOQUOTES); ?></p>
        <p class="border-top"><sub><i><?php echo htmlspecialchars($posts[$i]->getTime(), ENT_NOQUOTES); ?></i></sub></p>
    </div>
<?php endfor; ?>

<?php require 'includes/footer.php' ?>