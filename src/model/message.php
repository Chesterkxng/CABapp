<?php

namespace Application\Model\Message;

require_once ('src/lib/database.php');

use Application\Controllers\CourierControllers\Message\MSG;
use Application\Lib\Database\DatabaseConnection;

class Message
{
    public int $message_id;
    public int $type;
    public string $reference;
    public string $object;
    public string $recipient;
    public string $edition_date;
    public string $url;
}

class MessageRepository
{
    public DatabaseConnection $connection;

    public function addMessage(
        int $type,
        string $reference,
        string $recipient,
        string $object,
        string $edition_date,
        string $url
    ): bool {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `message`(`TYPE`,`REFERENCE`, `RECIPIENT`,`OBJECT`,`EDITION_DATE`, `URL`) 
            VALUES (?,?,?,?,?,?)"
        );
        $statement->execute([$type, $reference, $recipient, $object, $edition_date, $url]);
        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;
    }

    public function getInMessages(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `message`  
            WHERE `TYPE` = '0'
            ORDER BY `EDITION_DATE` DESC"
        );
        $messages = [];
        while ($row = $statement->fetch()) {
            $message = new Message();
            $message->message_id = $row['MSG_ID'];
            $message->type = $row['TYPE'];
            $message->reference = $row['REFERENCE'];
            $message->recipient = $row['RECIPIENT'];
            $message->object = $row['OBJECT'];
            $message->edition_date = $row['EDITION_DATE'];
            $message->url = $row['URL'];
            $messages[] = $message;
        }
        return $messages;
    }
    public function getOutMessages(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `message` 
             WHERE `TYPE` = '1'
             ORDER BY `EDITION_DATE` DESC"
        );
        $messages = [];
        while ($row = $statement->fetch()) {
            $message = new Message();
            $message->message_id = $row['MSG_ID'];
            $message->type = $row['TYPE'];
            $message->reference = $row['REFERENCE'];
            $message->recipient = $row['RECIPIENT'];
            $message->object = $row['OBJECT'];
            $message->edition_date = $row['EDITION_DATE'];
            $message->url = $row['URL'];
            $messages[] = $message;
        }
        return $messages;
    }

    public function getMSG(int $msg_id): Message
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `message` WHERE `MSG_ID`= ?"
        );
        $statement->execute([$msg_id]);
        while ($row = $statement->fetch()) {
            $message = new Message();
            $message->message_id = $row['MSG_ID'];
            $message->type = $row['TYPE'];
            $message->reference = $row['REFERENCE'];
            $message->recipient = $row['RECIPIENT'];
            $message->object = $row['OBJECT'];
            $message->edition_date = $row['EDITION_DATE'];
            $message->url = $row['URL'];
        }
        return $message;
    }

    public function updateMessage(int $type, string $reference, string $recipient, string $object, string $edition_date, int $message_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `message` 
            SET 
            `TYPE`= ?,
            `REFERENCE`= ?,
            `RECIPIENT`= ?,
            `OBJECT`= ?,
            `EDITION_DATE`= ?
             WHERE `MSG_ID`= ?"
        );
        $statement->execute([$type, $reference, $recipient, $object, $edition_date, $message_id]);
        $affectedline = $statement->rowCount();
        return $affectedline == 1;
    }

    public function deleteMSG(int $msg_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `message` WHERE `MSG_ID`= ?"
        );
        $statement->execute([$msg_id]);
        $affectedline = $statement->rowCount();
        return $affectedline == 1;
    }
}
