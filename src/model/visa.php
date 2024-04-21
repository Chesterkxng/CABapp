<?php

namespace Application\Model\Visa;

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Visa
{
    public int $visa_id;
    public string $visaNumber;
    public string $passNumber;
    public string $deliveryDate;
    public string $expirationDate;

}

class VisaRepository
{
    public DatabaseConnection $connexion;

    public function addVisa(string $visaNumber, string $passNumber, string $deliveryDate, string $expirationDate): bool
    {

        $statement = $this->connexion->getConnection()->prepare(
            "INSERT INTO `visa`(`VISA_NUMBER`, `PASSNUMBER`, `DELIVERY_DATE`, `EXPIRATION_DATE`)
             VALUES (?, ?, ?, ?)"
        );
        $statement->execute([$visaNumber, $passNumber, $deliveryDate, $expirationDate]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getAvailableVisas(): array
    {
        $statement = $this->connexion->getConnection()->prepare(
            "SELECT * FROM `visa` 
            WHERE EXPIRATION_DATE >= ?"
        );
        $date = date("Y-m-d");
        $statement->execute([$date]);
        $visas = [];
        while ($row = $statement->fetch()) {
            $visa = new Visa();
            $visa->visa_id = $row["VISA_ID"];
            $visa->visaNumber = $row["VISA_NUMBER"];
            $visa->passNumber = $row["PASSNUMBER"];
            $visa->deliveryDate = $row["DELIVERY_DATE"];
            $visa->expirationDate = $row["EXPIRATION_DATE"];
            $visas[] = $visa;
        }
        return $visas;

    }
    public function getExpiredVisas(): array
    {
        $statement = $this->connexion->getConnection()->prepare(
            "SELECT * FROM `visa` 
            WHERE EXPIRATION_DATE < ?"
        );
        $date = date("Y-m-d");
        $statement->execute([$date]);
        $visas = [];
        while ($row = $statement->fetch()) {
            $visa = new Visa();
            $visa->visa_id = $row["VISA_ID"];
            $visa->visaNumber = $row["VISA_NUMBER"];
            $visa->passNumber = $row["PASSNUMBER"];
            $visa->deliveryDate = $row["DELIVERY_DATE"];
            $visa->expirationDate = $row["EXPIRATION_DATE"];
            $visas[] = $visa;
        }
        return $visas;

    }

    public function getVisa(int $visa_id): Visa
    {
        $statement = $this->connexion->getConnection()->prepare(
            "SELECT * FROM `visa` 
            WHERE `VISA_ID` = ?"
        );
        $statement->execute([$visa_id]);
        while ($row = $statement->fetch()) {
            $visa = new Visa();
            $visa->visa_id = $row["VISA_ID"];
            $visa->visaNumber = $row["VISA_NUMBER"];
            $visa->passNumber = $row["PASSNUMBER"];
            $visa->deliveryDate = $row["DELIVERY_DATE"];
            $visa->expirationDate = $row["EXPIRATION_DATE"];
        }
        return $visa;

    }

    public function updateVisa(string $visaNumber, string $passNumber, string $deliveryDate, string $expirationDate, int $visa_id): bool
    {
        $statement = $this->connexion->getConnection()->prepare(
            "UPDATE `visa` 
            SET 
            `VISA_NUMBER` = ?,
            `PASSNUMBER` = ?,
            `DELIVERY_DATE` = ? ,
            `EXPIRATION_DATE`= ? 
            WHERE `VISA_ID`= ?"
        );
        $statement->execute([$visaNumber, $passNumber, $deliveryDate, $expirationDate, $visa_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }

    }
    public function deleteVisa(int $visa_id): bool
    {
        $statement = $this->connexion->getConnection()->prepare(
            "DELETE FROM `visa` WHERE `VISA_ID`= ?"
        );
        $statement->execute([$visa_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }

    }


}