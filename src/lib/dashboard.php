<?php 
 
namespace Application\Lib\Dashboard;
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
            "SELECT COUNT(TODO_ID) AS ownTodoNumber FROM `todo` 
            WHERE (PERSONAL_ID = ? AND RECIPIENT= ?)  AND `STATUS` = 0"
        ); 

        $ownTodoNumber = 0; 
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['ownTodoNumber'])){
            $ownTodoNumber = $row['ownTodoNumber'];
        } 
        return $ownTodoNumber; 
    }

    public function givenTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS givenTodoNumber FROM `todo`
            WHERE  (PERSONAL_ID = ? AND RECIPIENT != ?) AND `STATUS` != 2"
        ); 
        $givenTodoNumber = 0; 
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['givenTodoNumber'])){
            $givenTodoNumber = $row['givenTodoNumber'];
        } 
        return $givenTodoNumber; 
    }

    public function receivedTodoNumber(int $personal_id): int
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(TODO_ID) AS receivedTodoNumber FROM `todo` 
            WHERE (PERSONAL_ID != ? AND RECIPIENT = ? ) AND `STATUS` = 0"
        ); 
        $receivedTodoNumber = 0;
        $statement->execute([$personal_id, $personal_id]); 
        $row = $statement->fetch(); 
        if (!empty($row['receivedTodoNumber'])){
            $receivedTodoNumber = $row['receivedTodoNumber'];
        } 
        return $receivedTodoNumber; 
    }

    public function passportsNumber(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT COUNT(PASSPORT_ID) AS passportsNumber FROM `passport` "
        );  
        $passportsNumber = 0; 
        $row = $statement->fetch(); 
        if (!empty($row['passportsNumber'])){
            $passportsNumber = $row['passportsNumber'];
        } 
        return $passportsNumber; 
    }

    
    public function expiredPassportsNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(PASSPORT_ID) AS expiredPassportsNumber FROM `passport` 
            where `EXPIRATION_DATE` <= ? "
        ); 
        $expiredPassportsNumber = 0;
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['expiredPassportsNumber'])){
            $expiredPassportsNumber = $row['expiredPassportsNumber'];
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
        $availablePassportsNumber = 0; 
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['availablePassportsNumber'])){
            $availablePassportsNumber = $row['availablePassportsNumber'];
        } 
        return $availablePassportsNumber; 
    }
    public function UpcomingExpirationNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `passport` 
            where `EXPIRATION_DATE` > ? "
        );  
        $year = date("Y"); 
        $month = date('m'); 
        $statement->execute([$currentDate]); 
        $UpcomingExpirationNumber = 0;
        while ($row = $statement->fetch()){
            if ((int)substr($row['EXPIRATION_DATE'],0,4) == (int)$year){
                if ((int)substr($row['EXPIRATION_DATE'],5,7 ) - (int)$month <= 3){
                    $UpcomingExpirationNumber += 1; 
                }
        } else {
                $UpcomingExpirationNumber += 0; 
            }
        }
        return $UpcomingExpirationNumber; 
    }

    public function visasNumber(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT COUNT(VISA_ID) AS visasNumber FROM `visa` "
        );  
        $visasNumber = 0; 
        $row = $statement->fetch(); 
        if (!empty($row['visasNumber'])){
            $visasNumber = $row['visasNumber'];
        } 
        return $visasNumber; 
    }

    
    public function expiredVisasNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT COUNT(VISA_ID) AS expiredVisasNumber FROM `visa` 
            where `EXPIRATION_DATE` <= ? "
        );  
        $expiredVisasNumber = 0; 
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['expiredVisasNumber'])){
            $expiredVisasNumber = $row['expiredVisasNumber'];
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
        $availableVisasNumber = 0; 
        $statement->execute([$currentDate]); 
        $row = $statement->fetch(); 
        if (!empty($row['availableVisasNumber'])){
            $availableVisasNumber = $row['availableVisasNumber'];
        } 
        return $availableVisasNumber; 
    } 
    public function UpcomingExpiratioVisaNumber(): int
    {
        $currentDate = new DateTime(date('Y-m-d'));
        $currentDate = $currentDate->format('Y-m-d'); 
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `visa` 
            where `EXPIRATION_DATE` > ? "
        );  
        $year = date("Y"); 
        $month = date('m'); 
        $statement->execute([$currentDate]); 
        $UpcomingExpirationVisaNumber = 0;
        while ($row = $statement->fetch()){
            if ((int)substr($row['EXPIRATION_DATE'],0,4) == (int)$year){
                if ((int)substr($row['EXPIRATION_DATE'],5,7 ) - (int)$month <= 2){
                    $UpcomingExpirationVisaNumber += 1; 
                }
        } else {
                $UpcomingExpirationVisaNumber += 0; 
            }
        }
        return $UpcomingExpirationVisaNumber; 
    }

    public function MonthlyIntOM(): int
    {
        $date = date('Y-m'); 
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS monthlyIntOM FROM `om` 
            WHERE EDITION_DATE LIKE '$date%' AND `TYPE` = 'INTERIEUR' "
        ); 
        $monthlyIntOM = 0; 
        $row = $statement->fetch(); 
        
        if (!empty($row['monthlyIntOM'])){
            $monthlyIntOM = $row['monthlyIntOM'];
        } 
        return $monthlyIntOM; 
    } 

    public function MonthlyExtOM(): int
    {
        $date = date('Y-m'); 
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS monthlyExtOM FROM `om` 
            WHERE EDITION_DATE LIKE '$date%' AND `TYPE` = 'EXTERIEUR' "
        ); 
        $monthlyExtOM = 0;
        $row = $statement->fetch(); 
        if (!empty($row['monthlyExtOM'])){
            $monthlyExtOM = $row['monthlyExtOM'];
        }
        return $monthlyExtOM; 
    } 

    public function MonthlyDOM(): int
    {
        $date = date('Y-m'); 
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS monthlyDOM FROM `om` 
            WHERE EDITION_DATE LIKE '$date%' AND `TYPE` = 'DEMANDE D\'OM' "
        ); 
        $monthlyDOM = 0; 
        $row = $statement->fetch(); 
        if (!empty($row['monthlyDOM'])){
            $monthlyDOM = $row['monthlyDOM'];
        }
        return $monthlyDOM; 
    }

    public function totalIntOM(): int
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS totalIntOM FROM `om` 
            WHERE `TYPE` = 'INTERIEUR' "
        ); 
        $totalIntOM = 0; 
        $row = $statement->fetch(); 
        if (!empty($row['totalIntOM'])){
            $totalIntOM = $row['totalIntOM'];
        }
        return $totalIntOM; 
    } 

    public function totalExtOM(): int
    { 
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS totalExtOM FROM `om` 
            WHERE `TYPE` = 'EXTERIEUR' "
        ); 
        $totalExtOM = 0; 
        $row = $statement->fetch();         
        if (!empty($row['totalExtOM'])){
            $totalExtOM = $row['totalExtOM'];
        } 
        return $totalExtOM; 
    } 

    public function totalDOM(): int
    { 
        $statement = $this->connection->getConnection()->query(
            "SELECT  COUNT(OM_ID) AS totalDOM FROM `om` 
            WHERE `TYPE` = 'DEMANDE D\'OM' "
        ); 
        $totalDOM = 0; 
        $row = $statement->fetch(); 
        if (!empty($row['totalDOM'])){
            $totalDOM = $row['totalDOM'];
        }
        return $totalDOM; 
    }



}