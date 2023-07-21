<?php
namespace Application\Model\OM;

require_once('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class OM
{
    public int $om_id;
    public string $recipient;
    public string $country;
    public string $city;
    public string $companions;
    public string $object;
    public string $means;
    public string $departure_date;
    public string $return_date;
    public string $type;
    public string $edition_date;
    public string $url;
}
class OMRepository
{
    public DatabaseConnection $connection;

    public function addOM(
        string $recipient, string $country, string $city, string $companions, string $object, string $means,
        string $departure_date, string $return_date, string $type
    ): bool {

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `om`(`RECIPIENT`, `COUNTRY`, `CITY`, `COMPANIONS`, `OBJECT`, `MEANS`, `DEPARTURE_DATE`, `RETURN_DATE`, `TYPE`,`EDITION_DATE`) 
            VALUES (?,?,?,?,?,?,?,?,?,?)"
        );
        $edition_date = date('Y-m-d');
        $statement->execute([$recipient, $country, $city, $companions, $object, $means, $departure_date, $return_date, $type, $edition_date]);
        $affectedLines = $statement->rowCount();
        if ($affectedLines == 1) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getOMs(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `om`"
        );
        $OMs = [];
        while ($row = $statement->fetch()) {
            $OM = new OM();
            $OM->om_id = $row["OM_ID"];
            $OM->recipient = $row["RECIPIENT"];
            $OM->country = $row["COUNTRY"];
            $OM->city = $row["CITY"];
            $OM->companions = $row["COMPANIONS"];
            $OM->object = $row["OBJECT"];
            $OM->means = $row["MEANS"];
            $OM->departure_date = $row["DEPARTURE_DATE"];
            $OM->return_date = $row["RETURN_DATE"];
            $OM->type = $row["TYPE"];
            $OM->edition_date = $row["EDITION_DATE"];

            $OMs[] = $OM;
        }
        return $OMs;
    }
    public function getOM(int $om_id): OM
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `om` 
            WHERE `OM_ID` = ? "
        );
        $statement->execute([$om_id]);
        while ($row = $statement->fetch()) {
            $OM = new OM();
            $OM->om_id = $row["OM_ID"];
            $OM->recipient = $row["RECIPIENT"];
            $OM->country = $row["COUNTRY"];
            $OM->city = $row["CITY"];
            $OM->companions = $row["COMPANIONS"];
            $OM->object = $row["OBJECT"];
            $OM->means = $row["MEANS"];
            $OM->departure_date = $row["DEPARTURE_DATE"];
            $OM->return_date = $row["RETURN_DATE"];
            $OM->type = $row["TYPE"];
            $OM->edition_date = $row["EDITION_DATE"];
            $OM->url = $row["URL"];
        }
        return $OM;
    }
    public function getIntOMs()
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `om` WHERE `TYPE`= 'INTERIEUR' 
            ORDER BY `EDITION_DATE` DESC"
        );
        $OMs = [];
        while ($row = $statement->fetch()) {
            $OM = new OM();
            $OM->om_id = $row["OM_ID"];
            $OM->recipient = $row["RECIPIENT"];
            $OM->country = $row["COUNTRY"];
            $OM->city = $row["CITY"];
            $OM->companions = $row["COMPANIONS"];
            $OM->object = $row["OBJECT"];
            $OM->means = $row["MEANS"];
            $OM->departure_date = $row["DEPARTURE_DATE"];
            $OM->return_date = $row["RETURN_DATE"];
            $OM->type = $row["TYPE"];
            $OM->edition_date = $row["EDITION_DATE"];
            $OM->url = $row["URL"];

            $OMs[] = $OM;
        }
        return $OMs;

    }
    public function getExtOMs()
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `om` WHERE `TYPE`='EXTERIEUR'
            ORDER BY `EDITION_DATE` DESC"
        );
        $OMs = [];
        while ($row = $statement->fetch()) {
            $OM = new OM();
            $OM->om_id = $row["OM_ID"];
            $OM->recipient = $row["RECIPIENT"];
            $OM->country = $row["COUNTRY"];
            $OM->city = $row["CITY"];
            $OM->companions = $row["COMPANIONS"];
            $OM->object = $row["OBJECT"];
            $OM->means = $row["MEANS"];
            $OM->departure_date = $row["DEPARTURE_DATE"];
            $OM->return_date = $row["RETURN_DATE"];
            $OM->type = $row["TYPE"];
            $OM->edition_date = $row["EDITION_DATE"];
            $OM->url = $row["URL"];

            $OMs[] = $OM;
        }
        return $OMs;

    }
    public function getDOMs()
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `om` WHERE `TYPE`='DEMANDE D\'OM'
            ORDER BY `EDITION_DATE` DESC"
        );
        $OMs = [];
        while ($row = $statement->fetch()) {
            $OM = new OM();
            $OM->om_id = $row["OM_ID"];
            $OM->recipient = $row["RECIPIENT"];
            $OM->country = $row["COUNTRY"];
            $OM->city = $row["CITY"];
            $OM->companions = $row["COMPANIONS"];
            $OM->object = $row["OBJECT"];
            $OM->means = $row["MEANS"];
            $OM->departure_date = $row["DEPARTURE_DATE"];
            $OM->return_date = $row["RETURN_DATE"];
            $OM->type = $row["TYPE"];
            $OM->edition_date = $row["EDITION_DATE"];
            $OM->url = $row["URL"];

            $OMs[] = $OM;
        }
        return $OMs;

    }

    public function uploadMO(string $url, int $om_id): bool
    {

        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `om`
            SET `URL` = ? 
            WHERE `OM_ID` = ?"
        );
        $statement->execute([$url, $om_id]);
        $affectedLines = $statement->rowCount();
        if ($affectedLines == 1) {
            return 1;
        } else {
            return 0;
        }

    }

}