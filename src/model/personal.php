<?php

namespace Application\Model\Personal;

require_once ('src/lib/database.php');

use Application\Lib\Database\DatabaseConnection;

class Personal
{
    public int $personal_id;
    public int $login_id;
    public string $grade;
    public string $surname;
    public string $first_name;
    public string $function;
    public string $picture_name;


}

class PersonalRepository
{
    public DatabaseConnection $connection;

    // PROFILE SECTION 
    // return the list of all profiles registered in the database
    public function getProfiles(): array
    {
        $statement = $this->connection->getConnection()->query(
            " SELECT * FROM personal WHERE LOGIN_ID IS NOT NULL "
        );

        $personals = [];
        while ($row = $statement->fetch()) {

            $personal = new Personal();
            $personal->personal_id = $row['PERSONAL_ID'];
            $personal->login_id = $row['LOGIN_ID'];
            $personal->grade = $row['GRADE'];
            $personal->surname = $row['SURNAME'];
            $personal->first_name = $row['FIRST_NAME'];
            $personal->function = $row['FUNCTION'];

            $personals[] = $personal;


        }
        return $personals;
    }

    public function getProfilesWithOut(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            " SELECT * FROM personal 
                WHERE LOGIN_ID IS NOT NULL 
                AND PERSONAL_ID != ?"
        );
        $statement->execute([$personal_id]);

        $personals = [];
        while ($row = $statement->fetch()) {

            $personal = new Personal();
            $personal->personal_id = $row['PERSONAL_ID'];
            $personal->login_id = $row['LOGIN_ID'];
            $personal->grade = $row['GRADE'];
            $personal->surname = $row['SURNAME'];
            $personal->first_name = $row['FIRST_NAME'];
            $personal->function = $row['FUNCTION'];

            $personals[] = $personal;


        }
        return $personals;
    }

    public function getProfile(int $login_id): ?Personal
    {
        $statement = $this->connection->getConnection()->prepare(
            " SELECT * FROM personal WHERE `LOGIN_ID`= ? "
        );

        $statement->execute([$login_id]);
        while ($row = $statement->fetch()) {

            $personal = new Personal();
            $personal->personal_id = $row['PERSONAL_ID'];
            $personal->login_id = $row['LOGIN_ID'];
            $personal->grade = $row['GRADE'];
            $personal->surname = $row['SURNAME'];
            $personal->first_name = $row['FIRST_NAME'];
            $personal->function = $row['FUNCTION'];
            $personal->picture_name = $row['PICTURE_NAME'];


        }
        return $personal;
    }

    public function getProfilebyPersonalID(int $personal_id): ?Personal
    {
        $statement = $this->connection->getConnection()->prepare(
            " SELECT * FROM personal WHERE `PERSONAL_ID`= ? "
        );

        $statement->execute([$personal_id]);
        while ($row = $statement->fetch()) {

            $personal = new Personal();
            $personal->personal_id = $row['PERSONAL_ID'];
            $personal->login_id = $row['LOGIN_ID'];
            $personal->grade = $row['GRADE'];
            $personal->surname = $row['SURNAME'];
            $personal->first_name = $row['FIRST_NAME'];
            $personal->function = $row['FUNCTION'];


        }
        return $personal;
    }

    public function addProfile(int $login_id, string $grade, string $first_name, string $surname, string $function): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO personal(`LOGIN_ID`, `GRADE`, `FIRST_NAME`, `SURNAME`, `FUNCTION`) VALUES(?, ?, ?, ?, ?)"
        );
        $statement->execute([$login_id, strtoupper($grade), strtoupper($first_name), strtoupper($surname), strtoupper($function)]);

        $affectedLine = $statement->rowCount();
        if ($affectedLine == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function isProfileFilled(int $login_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM personal WHERE `LOGIN_ID` = ?"
        );
        $statement->execute([$login_id]);

        $affectedLine = $statement->rowCount();
        if ($affectedLine == 1) {
            return 1;
        } else {
            return 0;
        }

    }

    public function getPersonalID(int $login_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT PERSONAL_ID FROM personal WHERE `LOGIN_ID` = ?"
        );
        $statement->execute([$login_id]);
        while ($row = $statement->fetch()) {
            $personal_id = $row["PERSONAL_ID"];
        }
        return $personal_id;

    }




    public function updateProfile(string $grade, string $first_name, string $surname, string $function, int $login_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE  personal
                SET `GRADE` = ?, 
                `FIRST_NAME` = ?, 
                `SURNAME` = ?, 
                `FUNCTION` = ?
                 WHERE LOGIN_ID = ?"
        );
        $statement->execute([strtoupper($grade), strtoupper($first_name), strtoupper($surname), strtoupper($function), $login_id]);

        $affectedLine = $statement->rowCount();
        if ($affectedLine == 1) {
            return 1;
        } else {
            return 0;
        }
    }


    public function updateProfilePicture(string $nameofpp, int $login_id): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE  personal
                SET `PICTURE_NAME` = ?
                 WHERE LOGIN_ID = ?"
        );
        $statement->execute([$nameofpp, $login_id]);

        $affectedLine = $statement->rowCount();
        if ($affectedLine == 1) {
            return 1;
        } else {
            return 0;
        }
    }
    // END OF PROFILE SECTION

}