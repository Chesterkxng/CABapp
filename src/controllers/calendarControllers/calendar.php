<?php
namespace Application\Controllers\CalendarControllers\Calendar;

session_start();
require_once ('src/lib/database.php');
require_once ('src/model/event.php');
use Application\Lib\Database\DatabaseConnection;
use Application\Model\Event\EventRepository;

class Calendar
{
    public function calendar()
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $events = $eventRepository->getEventsByPersonal($personal_id);
        require ('templates/calendar/calendar.php');
    }

    public function sharedCalendar()
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        $events = $eventRepository->getSharedEvents();
        require ('templates/calendar/sharedCalendar.php');
    }

    public function eventsList()
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $events = $eventRepository->getEventsByPersonal($personal_id);
        $sharedEvents = $eventRepository->getSharedEvents();
        require ('templates/calendar/eventList.php');
    }

    public function eventUpdateForm(int $event_id)
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        //$personal_id = $_SESSION['PERSONAL_ID']; 
        $event = $eventRepository->getEvent($event_id);
        require ('templates/calendar/updateForm.php');
    }

    public function updateEvent(array $input, int $event_id)
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        //$personal_id = $_SESSION['PERSONAL_ID']; 
        $event = $eventRepository->getEvent($event_id);
        require ('templates/calendar/updateForm.php');
        if ($input !== null) {
            $title = null;
            $starting_date = null;
            $starting_hour = null;
            $ending_date = null;
            $ending_hour = null;
            if (!empty($input['title']) && !empty($input['starting_date']) && !empty($input['ending_date'])) {
                $title = htmlspecialchars($input['title']);
                ;

                if (!empty($input['starting_hour']) && !empty($input['ending_hour'])) {
                    $starting_hour = "T" . htmlspecialchars($input['starting_hour']);
                    $ending_hour = "T" . htmlspecialchars($input['ending_hour']);
                } else {
                    $starting_hour = "";
                    $ending_hour = "";
                }
                $starting_date = htmlspecialchars($input['starting_date']) . $starting_hour;
                $ending_date = htmlspecialchars($input['ending_date']) . $ending_hour;
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $success = $eventRepository->updateEvent(strtoupper($title), $starting_date, $ending_date, $event_id);
            if ($success == 0) {
                echo '<script type="text/javascript">
                    updateErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        updateSuccessAlert()
                    </script>';
            }
        }

    }
    public function sendDeletePopup(int $event_id)
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $events = $eventRepository->getEventsByPersonal($personal_id);
        $sharedEvents = $eventRepository->getSharedEvents();
        require ('templates/calendar/eventList.php');
        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }

    public function deleteEvent(int $event_id)
    {
        $eventRepository = new EventRepository();
        $eventRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $events = $eventRepository->getEventsByPersonal($personal_id);
        $sharedEvents = $eventRepository->getSharedEvents();
        require ('templates/calendar/eventList.php');
        $bool = $eventRepository->deleteEvent($event_id);
        if ($bool == 1) {
            echo '<script type="text/javascript">
                        deletingSuccessAlert()
                    </script>';
        } else {
            echo '<script type="text/javascript">
                    deletingErrorAlert()
                </script>';
        }

    }



}