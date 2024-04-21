<?php

namespace Application\Model\Bordereau;

require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Bordereau
{
    public int $bordereau_id;
    public string $reference;
    public string $object;
    public string $recipient;
    public string $edition_date;
    public string $url;
}

class BordereauRepository
{
    public DatabaseConnection $connection;

    public function addBordereau(
        string $reference,
        string $recipient,
        string $object,
        string $edition_date,
        string $url
    ): bool {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `bordereau`(`REFERENCE`, `RECIPIENT`,`OBJECT`,`EDITION_DATE`, `URL`) 
            VALUES (?,?,?,?,?)"
        );
        $statement->execute([$reference, $recipient, $object, $edition_date, $url]);
        $affectedLines = $statement->rowCount();
        if ($affectedLines == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getBordereau(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `bordereau` ORDER BY `EDITION_DATE` DESC"
        );
        $bordereaux = [];
        while ($row = $statement->fetch()) {
            $bordereau = new Bordereau();
            $bordereau->bordereau_id = $row['BORDEREAU_ID'];
            $bordereau->reference = $row['REFERENCE'];
            $bordereau->recipient = $row['RECIPIENT'];
            $bordereau->object = $row['OBJECT'];
            $bordereau->edition_date = $row['EDITION_DATE'];
            $bordereau->url = $row['URL'];
            $bordereaux[] = $bordereau;
        }
        return $bordereaux;
    }
    public function getBE(int $bordereau_id): Bordereau
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `bordereau` WHERE `BORDEREAU_ID` = ?"
        );
        $statement->execute([$bordereau_id]);
        while ($row = $statement->fetch()) {
            $bordereau = new Bordereau();
            $bordereau->bordereau_id = $row['BORDEREAU_ID'];
            $bordereau->reference = $row['REFERENCE'];
            $bordereau->recipient = $row['RECIPIENT'];
            $bordereau->object = $row['OBJECT'];
            $bordereau->edition_date = $row['EDITION_DATE'];
            $bordereau->url = $row['URL'];
        }
        return $bordereau;
    }

    public function updateBordereau(string $reference, string $recipient, string $object, string $edition_date, int $bordereau_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `bordereau` 
            SET 
            `REFERENCE`= ?,
            `RECIPIENT`= ?,
            `OBJECT`= ?,
            `EDITION_DATE`= ?
             WHERE `BORDEREAU_ID`= ?"
        );
        $statement->execute([$reference, $recipient, $object, $edition_date, $bordereau_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function deleteBE(int $bordereau_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `bordereau` WHERE `BORDEREAU_ID`= ?"
        );
        $statement->execute([$bordereau_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }
    }
}
