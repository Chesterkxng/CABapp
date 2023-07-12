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
        <h5 class="mb-3"><strong>TODO LIST</strong></h5>

        <h5 class="mb-3"><strong> OWN </strong></h5>

        <div class="row">
            <?php 
                $currentDate = new DateTime(date('Y-m-d'));
            
                foreach($ownTodo as $todo){
                $deadline = substr($todo->deadline,0,10); 
                $time_limit = substr($todo->deadline,11,16); 
                $deadlineday = new DateTime($deadline);

                $datediff = date_diff($deadlineday, $currentDate);
                
                ?>
            <div class="col-sm-4" style="margin-top: 10px;">
                <?php if ($deadlineday < $currentDate){ ?>
                <div class="card text-white bg-danger mb-3">
                <?php } elseif($datediff->days < 1) {?>
                <div class="card text-white bg-info mb-3">
                    <?php } else { ?>
                <div class="card shadow-sm">
                        <?php } ?>
                    <div class="card-body">
                        <h5 class="card-title"><strong><?= $todo->title ?></strong></h5>
                        <p class="card-text p-typo"><strong>DETAILS:</strong> 
                        <?= nl2br($todo->details)?> </p>
                        <p class="card-text p-typo"><strong>DEADLINE:</strong> <?= $deadline." A ".$time_limit ?> </p>
                        
                        
                        <div style="display: flex; justify-content: right;">
                            <form action="index.php?action=markAsdonePopup&todo_id=<?= $todo->todo_id ?>" method="post">
                                <button type="submit" class="btn btn-success icon-round shadow">
                                        <i class="fa fa-check"></i>
                                </button>
                            </form>

                            <form action="index.php?action=updateTodoForm&todo_id=<?= $todo->todo_id ?>" method="post">
                                <button type="submit" class="btn btn-warning icon-round shadow">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </form>

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
                        
                        <div style="display: flex; justify-content: right;">
                            <form action="index.php?action=markAsdonePopup&todo_id=<?= $todo->todo_id ?>" method="post">
                                <?php 
                                $status = $todo->status; 
                                if($status == 0) {?>
                                    <button type="submit" class="btn btn-primary icon-round shadow">
                                            <i class="fa fa-check"></i>
                                    </button>
                                <?php } elseif($status == 1){ ?>
                                    <button type="submit" class="btn btn-success icon-round shadow">
                                            <i class="fa fa-check"></i>
                                    </button>
                                    <?php } ?>
                            </form>

                            <form action="index.php?action=updateTodoForm&todo_id=<?= $todo->todo_id ?>" method="post">
                                <button type="submit" class="btn btn-warning icon-round shadow">
                                    <i class="fa fa-pencil"></i>
                                </button>
                            </form>

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
                        
                        <div style="display: flex; justify-content: right;">
                            <form action="index.php?action=markAsTraitedPopup&todo_id=<?= $todo->todo_id ?>" method="post">
                                <button type="submit" class="btn btn-info icon-round shadow">
                                        <i class="fa fa-bell"></i>
                                </button>
                            </form>

                
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