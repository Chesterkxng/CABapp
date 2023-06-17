<?php

namespace Application\Controllers\DashboardControllers\Dashboard;
session_start();
require_once('src/lib/dashboard.php');
require_once('src/lib/database.php');
use Application\lib\Dashboard\DashboardRepository;
use Application\Lib\Database\DatabaseConnection;
class Dashboard
{
    public function DashboardPage(int $personal_id)
    {
        $dashboardRepository = new DashboardRepository(); 
        $dashboardRepository->connection = new DatabaseConnection(); 
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id) ; 
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id) ;
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id) ;
        $passportsNumber = $dashboardRepository->passportsNumber();
        $expiredPassportsNumber = $dashboardRepository->expiredPassportsNumber();
        $availablePassportsNumber = $dashboardRepository->AvailablePassportsNumber();
        $visasNumber = $dashboardRepository->visasNumber();
        $expiredVisasNumber = $dashboardRepository->expiredVisasNumber();
        $availableVisasNumber = $dashboardRepository->AvailableVisasNumber();
        require('templates/dashboard/dashboard.php'); 
        
        

    }

}