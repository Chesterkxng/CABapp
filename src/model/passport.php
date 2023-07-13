<?php

namespace Application\Model\Passport;

require_once('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Passport
{
    public int $passport_id;
    public string $passNumber;
    public string $grade;
    public string $surname;
    public string $firstname;
    public string $deliveryDate;
    public string $expirationDate;

}

class PassportRepository
{
    public DatabaseConnection $connexion;

    public function addPassport(
        string $passNumber, string $grade, string $surname,
        string $firstname, string $deliveryDate, string $expirationDate
    ): bool {

        $statement = $this->connexion->getConnection()->prepare(
            "INSERT INTO `passport`(`PASSNUMBER`, `GRADE`, `SURNAME`, `FIRST_NAME`, `DELIVERY_DATE`, `EXPIRATION_DATE`)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
        $statement->execute([$passNumber, $grade, $surname, $firstname, $deliveryDate, $expirationDate]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getPassports(): array
    {
        $statement = $this->connexion->getConnection()->query(
            "SELECT * FROM `passport`"
        );
        $passports = [];
        while ($row = $statement->fetch()) {
            $passport = new Passport();
            $passport->passport_id = $row["PASSPORT_ID"];
            $passport->passNumber = $row["PASSNUMBER"];
            $passport->grade = $row["GRADE"];
            $passport->surname = $row["SURNAME"];
            $passport->firstname = $row["FIRST_NAME"];
            $passport->deliveryDate = $row["DELIVERY_DATE"];
            $passport->expirationDate = $row["EXPIRATION_DATE"];
            $passports[] = $passport;
        }
        return $passports;

    }

    public function getPassport(int $passport_id): Passport
    {
        $statement = $this->connexion->getConnection()->prepare(
            "SELECT * FROM `passport` 
            WHERE `PASSPORT_ID` = ?"
        );
        $statement->execute([$passport_id]);
        while ($row = $statement->fetch()) {
            $passport = new Passport();
            $passport->passport_id = $row["PASSPORT_ID"];
            $passport->passNumber = $row["PASSNUMBER"];
            $passport->grade = $row["GRADE"];
            $passport->surname = $row["SURNAME"];
            $passport->firstname = $row["FIRST_NAME"];
            $passport->deliveryDate = $row["DELIVERY_DATE"];
            $passport->expirationDate = $row["EXPIRATION_DATE"];
        }
        return $passport;

    }
    public function getPassportByPassNumber(string $passNumber): Passport
    {
        $statement = $this->connexion->getConnection()->prepare(
            "SELECT * FROM `passport` 
            WHERE `PASSNUMBER` = ?"
        );
        $statement->execute([$passNumber]);
        while ($row = $statement->fetch()) {
            $passport = new Passport();
            $passport->passport_id = $row["PASSPORT_ID"];
            $passport->passNumber = $row["PASSNUMBER"];
            $passport->grade = $row["GRADE"];
            $passport->surname = $row["SURNAME"];
            $passport->firstname = $row["FIRST_NAME"];
            $passport->deliveryDate = $row["DELIVERY_DATE"];
            $passport->expirationDate = $row["EXPIRATION_DATE"];
        }
        return $passport;
    }

    public function updatePassport(
        $passNumber, string $grade, string $surname,
        string $firstname, string $deliveryDate, string $expirationDate, int $passport_id
    ) {
        $statement = $this->connexion->getConnection()->prepare(
            "UPDATE `passport` 
            SET 
            `PASSNUMBER`= ?,
            `GRADE`= ?,
            `SURNAME`= ?,
            `FIRST_NAME`= ?,
            `DELIVERY_DATE`= ? ,
            `EXPIRATION_DATE`= ? 
            WHERE `PASSPORT_ID`= ?"
        );
        $statement->execute([$passNumber, $grade, $surname, $firstname, $deliveryDate, $expirationDate, $passport_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }

    }
    public function deletePassport($passport_id)
    {
        $statement = $this->connexion->getConnection()->prepare(
            "DELETE FROM `passport` WHERE `PASSPORT_ID`= ?"
        );
        $statement->execute([$passport_id]);
        $affectedline = $statement->rowCount();
        if ($affectedline == 1) {
            return 1;
        } else {
            return 0;
        }

    }


}