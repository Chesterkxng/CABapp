<?php
namespace Application\Model\Event;

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Event
{
    public int $event_id;
    public string $title;
    public string $start;
    public string $end;
    public int $personal_id;
    public int $sharing_status;
}
class EventRepository
{
    public DatabaseConnection $connection;

    public function getEvents(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `event`"
        );
        $events = [];
        while ($row = $statement->fetch()) {
            $event = new Event();
            $event->event_id = $row['EVENT_ID'];
            $event->title = $row['TITLE'];
            $event->start = $row['START'];
            $event->end = $row['END'];
            $event->personal_id = $row['PERSONAL_ID'];
            $events[] = $event;
        }
        return $events;

    }

    public function getEventsByPersonal(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `event` 
            WHERE PERSONAL_ID = ? AND 
            SHARING_STATUS = 0
            ORDER BY `START` DESC"
        );
        $statement->execute([$personal_id]);
        $events = [];
        while ($row = $statement->fetch()) {
            $event = new Event();
            $event->event_id = $row['EVENT_ID'];
            $event->title = $row['TITLE'];
            $event->start = $row['START'];
            $event->end = $row['END'];
            $event->personal_id = $row['PERSONAL_ID'];
            $events[] = $event;
        }
        return $events;

    }

    public function getSharedEvents(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `event` 
            WHERE SHARING_STATUS = 1
            ORDER BY `START` DESC"
        );
        $events = [];
        while ($row = $statement->fetch()) {
            $event = new Event();
            $event->event_id = $row['EVENT_ID'];
            $event->title = $row['TITLE'];
            $event->start = $row['START'];
            $event->end = $row['END'];
            $event->personal_id = $row['PERSONAL_ID'];
            $events[] = $event;
        }
        return $events;

    }


    public function getEvent(int $event_id): Event
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `event` WHERE `EVENT_ID` = ?"
        );
        $statement->execute([$event_id]);
        while ($row = $statement->fetch()) {
            $event = new Event();
            $event->event_id = $row['EVENT_ID'];
            $event->title = $row['TITLE'];
            $event->start = $row['START'];
            $event->end = $row['END'];
        }
        return $event;

    }

    public function deleteEvent(int $event_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `event` WHERE `EVENT_ID` = ?"
        );
        $statement->execute([$event_id]);

        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }


    public function addEvent(string $title, string $start, string $end, int $personal_id, int $sharing_status): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `event`(`TITLE`, `START`, `END`,`PERSONAL_ID`,`SHARING_STATUS`) 
            VALUES (?, ?, ?, ?, ?)"
        );
        $statement->execute([$title, $start, $end, $personal_id, $sharing_status]);

        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }


    public function updateEvent(string $title, string $start, string $end, int $event_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `event` 
            SET
            `TITLE`= ?,
            `START`= ?,
            `END`= ? 
            WHERE `EVENT_ID` = ?"
        );
        $statement->execute([$title, $start, $end, $event_id]);

        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }

}