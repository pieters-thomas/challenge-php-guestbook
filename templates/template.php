<?php
$file = ''; ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" type="text/css"
          rel="stylesheet"/>
    <title>Guestbook</title>
</head>
<body>
<div class="container">
    <h1>Guestbook</h1>

    <form method="post">
        <fieldset>
            <legend>Leave us a Message</legend>

            <div class="form-group col-md-6">
                <label for="street">Title:</label>
                <input type="text" name="title" id="title" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="street">Name:</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group col-md-6">
                <label for="street">Message:</label>
                <input type="text" name="content" id="content" class="form-control">
            </div>

        </fieldset>
        <fieldset>
            <button type="submit" class="btn btn-primary">Post!</button>
        </fieldset>
    </form>
</div>


</body>
</html>



