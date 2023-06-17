<?php 
 
namespace Application\lib\Dashboard;
session_start();

require_once('src/lib/database.php'); 
use Application\Lib\Database\DatabaseConnection;
use DateTime;

class DashboardRepository
{
    public DatabaseConnection $connection ; 

    public function ownTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS ownTodoNumber FROM TODO 
            WHERE (PERSONAL_ID = ? AND RECIPIENT= ?)  AND `STATUS` = 0"
        ); 
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['ownTodoNumber'])){
            $ownTodoNumber = $row['ownTodoNumber'];
        } else {
            $ownTodoNumber = 0; 
        }
        return $ownTodoNumber; 
    }

    public function givenTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS givenTodoNumber FROM TODO 
            WHERE  (PERSONAL_ID = ? AND RECIPIENT != ?) AND `STATUS` != 2"
        ); 
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['givenTodoNumber'])){
            $givenTodoNumber = $row['givenTodoNumber'];
        } else {
            $givenTodoNumber = 0; 
        }
        return $givenTodoNumber; 
    }

    public function receivedTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS receivedTodoNumber FROM TODO 
            WHERE (PERSONAL_ID != ? AND RECIPIENT = ? ) AND `STATUS` = 0"
        ); 
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['receivedTodoNumber'])){
            $receivedTodoNumber = $row['receivedTodoNumber'];
        } else {
            $receivedTodoNumber = 0; 
        }
        return $receivedTodoNumber; 
    }


    public function passportsNumber(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT COUNT(PASSPORT_ID) AS passportsNumber FROM `passport` "
        );  
        $row = $statement->fetch(); 
        if (!empty($row['passportsNumber'])){
            $passportsNumber = $row['passportsNumber'];
        } else {
            $passportsNumber = 0; 
        }
        return $passportsNumber; 
    }

    
    public function expiredPassportsNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(PASSPORT_ID) AS expiredPassportsNumber FROM `passport` 
            where `EXPIRATION_DATE` < ? "
        );  
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['expiredPassportsNumber'])){
            $expiredPassportsNumber = $row['expiredPassportsNumber'];
        } else {
            $expiredPassportsNumber = 0; 
        }
        return $expiredPassportsNumber; 
    }

    public function AvailablePassportsNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(PASSPORT_ID) AS availablePassportsNumber FROM `passport` 
            where `EXPIRATION_DATE` > ? "
        );  
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['availablePassportsNumber'])){
            $availablePassportsNumber = $row['availablePassportsNumber'];
        } else {
            $availablePassportsNumber = 0; 
        }
        return $availablePassportsNumber; 
    }

    public function visasNumber(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT COUNT(VISA_ID) AS visasNumber FROM `visa` "
        );  
        $row = $statement->fetch(); 
        if (!empty($row['visasNumber'])){
            $visasNumber = $row['visasNumber'];
        } else {
            $visasNumber = 0; 
        }
        return $visasNumber; 
    }

    
    public function expiredVisasNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(VISA_ID) AS expiredVisasNumber FROM `visa` 
            where `EXPIRATION_DATE` < ? "
        );  
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['expiredVisasNumber'])){
            $expiredVisasNumber = $row['expiredVisasNumber'];
        } else {
            $expiredVisasNumber = 0; 
        }
        return $expiredVisasNumber; 
    }

    public function AvailableVisasNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(VISA_ID) AS availableVisasNumber FROM `visa` 
            where `EXPIRATION_DATE` > ? "
        );  
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['availableVisasNumber'])){
            $availableVisasNumber = $row['availableVisasNumber'];
        } else {
            $availableVisasNumber = 0; 
        }
        return $availableVisasNumber; 
    }



}