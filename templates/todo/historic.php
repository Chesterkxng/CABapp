<?php
session_start();

use Application\Lib\Database\DatabaseConnection;

?>
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
    <div class="col-sm-9 col-xs-12 content pt-3 pl-0">
        <h5 class="mb-3"><strong>TODO LIST HISTORIC</strong></h5>

        <h5 class="mb-3"><strong> OWN </strong></h5>

        <div class="row">
            <?php foreach($ownTodo as $todo){
                $deadline = substr($todo->deadline,0,10); 
                $time_limit = substr($todo->deadline,11,16); 
                
                ?>
            <div class="col-sm-4" style="margin-top: 10px;">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $todo->title ?></strong></h5>
                        <p class="card-text p-typo"><strong>DETAILS:</strong> 
                        <?= $todo->details ?> </p>
                        <p class="card-text text-danger p-typo"><strong>DEADLINE: <?= $deadline." A ".$time_limit ?></strong> </p>
                        
                        
                        <div style="display: flex; justify-content: right;">

                            <form action="index.php?action=todoDeletePopup&todo_id=<?= $todo->todo_id ?>" method="post">
                                <button type="submit" class="btn btn-danger icon-round shadow">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
            <?php } ?>



        </div>

        <h5 class="mb-3" style="margin-top: 20px;" ><strong> GIVEN </strong></h5>

        <div class="row">
            <?php foreach($givenTodo as $todo){
                $deadline = substr($todo->deadline,0,10); 
                $time_limit = substr($todo->deadline,11,16); 
                
                ?>
            <div class="col-sm-4" style="margin-top: 10px;">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $todo->title ?></strong></h5>
                        <p class="card-text p-typo"><strong>DETAILS:</strong> 
                        <?= $todo->details ?> </p>
                        <p class="card-text text-danger p-typo"><strong>DEADLINE: <?= $deadline." A ".$time_limit ?></strong> </p>
                        
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>


        <h5 class="mb-3" style="margin-top: 20px;" ><strong> RECEIVED </strong></h5>

        <div class="row">
            <?php foreach($receivedTodo as $todo){
                $deadline = substr($todo->deadline,0,10); 
                $time_limit = substr($todo->deadline,11,16); 
                
                ?>
            <div class="col-sm-4" style="margin-top: 10px;">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $todo->title ?></strong></h5>
                        <p class="card-text p-typo"><strong>DETAILS:</strong> 
                        <?= $todo->details ?> </p>
                        <p class="card-text text-danger p-typo"><strong>DEADLINE: <?= $deadline." A ".$time_limit ?></strong> </p>
                        
        
                    </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>




    </div>

    <?php
    require('templates/pagesComponents/popup/todo.php'); 
    require('templates/pagesComponents/navbar/navbarFooter.php'); ?>


</body>

</html>