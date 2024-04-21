<?php
session_start();
require_once('src/lib/database.php');
require_once('src/model/event.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Event\EventRepository;

if (isset($_POST)) {
    $eventRepository = new EventRepository();
    $eventRepository->connection = new DatabaseConnection();

    try {
        $personal_id = $_SESSION['PERSONAL_ID'];
        for ($i = 1; $i <= count($_POST); $i++) {
            $event = $_POST["$i"];
            $title = $event['title'];
            $start = $event['start'];
            $end = $event['end'];
            $sharing_status = 0;

            $eventRepository->addEvent($title, $start, $end, $personal_id, $sharing_status);
        }
        echo json_encode(["code" => 200, "msg" => "Success"]);
    } catch (\Throwable $th) {
        //throw $th;
        echo json_encode(["code" => 400, "msg" => "Failled"]);
    }
}
