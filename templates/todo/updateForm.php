<?php session_start() ?>
<!doctype html>
<html lang="en">

<head>
    <title>CABapp</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="templates\pagesComponents\navbar\assets\img\insigneAir.png" type="image/icon type">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php require('templates/pagesComponents/navbar/navbarHeader.php'); ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>
    <?php require('templates/pagesComponents/navbar/navbar.php'); ?>
    <?php
    ?>
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>TODO updating </strong></h5>
        <div class="row">
            <div class="col-sm-12">
                <div class="mt-4 mb-3 p-3  button-container bg-white border shadow-sm">
                    <h6 class="mb-4">TODO INFOS</h6>
                    <form action="index.php?action=updateTodo&todo_id=<?= $todo->todo_id ?>" method="post">

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="passnumber">TITLE</label>
                            <div class="col-sm-5">
                                <input type="text" style="text-transform: uppercase;" class="form-control" id="title" name="title" value="<?= $todo->title ?>" required />
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="details">DETAILS</label>
                            <div class="col-sm-5">
                                <textarea type="text" autocomplete="off" rows="4" class="form-control" id="details" name="details" required><?= $todo->details ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="surname">DEADLINE</label>
                            <div class="col-sm-5">
                                <input type="datetime-local" autocomplete="off" class="form-control" id="deadline" name="deadline" value="<?= $todo->deadline ?>" required />
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-sm-3" for="recipient">TO</label>
                            <div class="col-sm-5">
                                <select class="custom-select text-center" name="recipient" id="recipient" required>
                                    <option class="option" value=""></option>
                                    <option class="option" value="<?= $_SESSION['PERSONAL_ID'] ?>"> ME</option>
                                    <?php foreach ($personnel as $recipient) { ?>
                                        <option class="option" value="<?= $recipient->personal_id ?>"><?= $recipient->grade . " " . $recipient->surname . " " . $recipient->first_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label col-sm-3" for=""></label>
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info btn-lg btn-block"><strong>UPDATE
                                    </strong></button>
                            </div>
                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('templates/pagesComponents/popup/todo.php') ?>
    <?php require('templates/pagesComponents/navbar/navbarFooter.php'); ?>
</body>

</html>