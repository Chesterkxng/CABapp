<?php
namespace Application\Model\NDS;

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class NDS
{
    public int $nds_id;
    public string $reference;
    public string $object;
    public string $recipient;
    public string $edition_date;
    public string $url;
}

class NDSRepository
{
    public DatabaseConnection $connection;

    public function addNDS(string $reference, string $recipient, string $object, string $edition_date, string $url): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `nds`(`REFERENCE`, `RECIPIENT`, `OBJECT`, `EDITION_DATE`, `URL`) 
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

    public function getNDSs(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `nds` ORDER BY `EDITION_DATE` DESC"
        );
        $NDSs = [];
        while ($row = $statement->fetch()) {
            $NDS = new NDS();
            $NDS->nds_id = $row['NDS_ID'];
            $NDS->reference = $row['REFERENCE'];
            $NDS->recipient = $row['RECIPIENT'];
            $NDS->object = $row['OBJECT'];

            $NDS->edition_date = $row['EDITION_DATE'];
            $NDS->url = $row['URL'];
            $NDSs[] = $NDS;
        }
        return $NDSs;
    }

    public function getNDS(int $nds_id): NDS
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `nds` WHERE `NDS_ID` = ?"
        );
        $statement->execute([$nds_id]);
        while ($row = $statement->fetch()) {
            $NDS = new NDS();
            $NDS->nds_id = $row['NDS_ID'];
            $NDS->reference = $row['REFERENCE'];
            $NDS->recipient = $row['RECIPIENT'];
            $NDS->object = $row['OBJECT'];

            $NDS->edition_date = $row['EDITION_DATE'];
            $NDS->url = $row['URL'];
        }
        return $NDS;
    }

    public function updateNDS(string $reference, string $recipient, string $object, string $edition_date, int $nds_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `nds` 
            SET 
            `REFERENCE`= ?,
            `RECIPIENT`= ?,
            `OBJECT`= ?,
            `EDITION_DATE`= ?
             WHERE `NDS_ID`= ?"
        );
        $statement->execute([$reference, $recipient, $object, $edition_date, $nds_id]);
        $affectedline = $statement->rowCount();
        return $affectedline == 1;
    }

    public function deleteNDS(int $nds_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `nds` WHERE `NDS_ID`= ?"
        );
        $statement->execute([$nds_id]);
        $affectedline = $statement->rowCount();
        return $affectedline == 1;
    }

}