<?php
namespace Application\Model\Courier;

require_once('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Courier
{
    public int $courier_id;
    public string $recipient;
    public string $object;
    public string $details;
    public string $edition_date;
    public string $url;
}

class CourierRepository
{
    public DatabaseConnection $connection;

    public function addCourier(string $recipient, string $object, string $details, string $edition_date, string $url): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `courier`(`RECIPIENT`, `OBJECT`, `DETAILS`, `EDITION_DATE`, `URL`) 
            VALUES (?,?,?,?,?)"
        );
        $statement->execute([$recipient, $object, $details, $edition_date, $url]);
        $affectedLines = $statement->rowCount();
        if ($affectedLines == 1) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getCouriers(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `courier`"
        );
        $couriers = [];
        while ($row = $statement->fetch()) {
            $courier = new Courier();
            $courier->courier_id = $row['COURIER_ID'];
            $courier->recipient = $row['RECIPIENT'];
            $courier->object = $row['OBJECT'];
            $courier->details = $row['DETAILS'];
            $courier->edition_date = $row['EDITION_DATE'];
            $courier->url = $row['URL'];

            $couriers[] = $courier;
        }
        return $couriers;

    }

}