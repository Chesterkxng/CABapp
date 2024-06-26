<?php

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Personal\PersonalRepository;

if (isset($_SESSION['LOGIN_ID'])) {
    $personalRepository = new PersonalRepository();
    $personalRepository->connection = new DatabaseConnection();
    $login_id = $_SESSION['LOGIN_ID'];
    $profile_type = $_SESSION['profile_type'];
    $profile = $personalRepository->getProfile($login_id);
}
?>
<!--Page loader-->
<div class="loader-wrapper">
    <div class="loader-circle">
        <div class="loader-wave"></div>
    </div>
</div>
<!--Page loader-->
<!--Page Wrapper-->
<div class="container-fluid">
    <!--Header-->
    <div class="row header shadow-sm">
        <!--Logo-->
        <div class="col-sm-3 pl-0 text-center header-logo">
            <div class="bg-theme mr-3 pt-3 pb-2 mb-0">
                <h3 class="logo"><a href="#" class="text-secondary logo"><i class="fa fa-university"></i> CAB<span
                            class="small">APP</span></a></h3>
            </div>
        </div>
        <!--Logo-->
        <!--Header Menu-->
        <div class="col-sm-9 header-menu pt-2 pb-0">
            <div class="row">
                <!--Menu Icons-->
                <div class="col-sm-4 col-8 pl-0">
                    <!--Toggle sidebar-->
                    <span class="menu-icon" onclick="toggle_sidebar()">
                        <span id="sidebar-toggle-btn"></span>
                    </span>
                    <!--Toggle sidebar-->
                </div>
                <!--Search box and avatar-->
                <div class="col-sm-8 col-4 text-right flex-header-menu justify-content-end">
                    <div class="mr-4">
                        <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="templates\pagesComponents\navbar\assets\img\setting1.png" alt="Setting"
                                class="rounded-circle" width="40px" height="40px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mt-13" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item"
                                href="index.php?action=updateProfilePage&login_id=<?= $login_id ?>"><i
                                    class="fa fa-user pr-2"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=signOut"><i
                                    class="fa fa-power-off pr-2"></i> Logout</a>
                        </div>
                    </div>
                </div>
                <!--Search box and avatar-->
            </div>
        </div>
        <!--Header Menu-->
    </div>
    <!--Header-->
    <!--Main Content-->
    <div class="row main-content">
        <!--Sidebar left-->
        <div class="col-sm-3 col-xs-6 sidebar pl-0">
            <div class="inner-sidebar mr-3">
                <!--Image Avatar-->
                <div class="avatar text-center">
                    <img src="templates\pagesComponents\navbar\assets\pp\<?= $profile->picture_name ?>" alt=""
                        class="rounded" />
                    <p><strong>
                            <?= $profile->surname ?>
                            <?= $profile->first_name ?>
                        </strong></p>
                    <span class="text-primary small"><strong>
                            <?= $profile->function ?>
                        </strong></span>
                </div>
                <!--Image Avatar-->
                <?php switch ($profile_type) {
                    case 0:
                        ?>
                        <!--Sidebar Navigation Menu-->
                        <div class="sidebar-menu-container">
                            <ul class="sidebar-menu mt-4 mb-4">
                                <li class="parent">
                                    <a href="index.php?action=procedureMan" class=""><i class="fa fa-cogs mr-3"></i>
                                        <span class="none">MANUEL DE PROCEDURES</span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=DashboardPage" class=""><i class="fa fa-dashboard mr-3"></i>
                                        <span class="none">TABLEAU DE BORD </span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=passportsList" class=""><i class="fa fa-book mr-3"> </i>
                                        <span class="none">PASSEPORTS</span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=visasList" class=""><i class="fa fa-id-card mr-3"> </i>
                                        <span class="none">VISAS</span>
                                    </a>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('calender'); return false" class=""><i
                                            class="fa fa-calendar mr-3"> </i>
                                        <span class="none">CALENDRIER<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="calender">
                                        <li class="child"><a href="index.php?action=eventsList" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LISTE D'EVENEMENTS</a></li>
                                        <li class="child"><a href="index.php?action=calendar" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> CALENDRIER PERSONEL</a></li>
                                        <li class="child"><a href="index.php?action=sharedCalendar" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> CALENDRIER PARTAGE</a></li>
                                    </ul>
                                </li>


                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('todo'); return false" class=""><i
                                            class="fa fa-list-ul mr-3"> </i>
                                        <span class="none">A FAIRE<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="todo">
                                        <li class="child"><a href="index.php?action=todoAddingForm" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> AJOUTER</a></li>
                                        <li class="child"><a href="index.php?action=todosList" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LISTE</a></li>
                                        <li class="child"><a href="index.php?action=todoHistoric" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> HISTORIQUE</a></li>

                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('mission_orders'); return false" class=""><i
                                            class="fa fa-file-word mr-3"> </i>
                                        <span class="none">ORDRES DE MISSION<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="mission_orders">
                                        <li class="child"><a href="index.php?action=intMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> INTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=extMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> EXTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=DOMgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> DEMANDE</a></li>
                                        <li class="child"><a href="index.php?action=MOArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> ARCHIVES</a></li>
                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('correspondences'); return false" class=""><i
                                            class="fa fa-envelope mr-3"> </i>
                                        <span class="none">CORRESPONDANCES<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="correspondences">
                                        <li class="child"><a href="index.php?action=couriersArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LETTRES</a></li>
                                        <li class="child"><a href="index.php?action=MSGArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> MESSAGES</a></li>
                                        <li class="child"><a href="index.php?action=NDSArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> NOTES DE SERVICE</a></li>
                                        <li class="child"><a href="index.php?action=BEArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> BORDEREAUX</a></li>
                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="index.php?action=Archives" class=""><i
                                            class="fa fa-archive mr-3"> </i>
                                        <span class="none">ARCHIVES</span>
                                    </a>
                                </li>

                                <li class="parent">
                                    <a href="index.php?action=usersList" class=""><i
                                            class="fa fa-key mr-3"> </i>
                                        <span class="none">CONTROLE D'ACCES</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!--Sidebar Naigation Menu-->
                        <?php
                        break;
                    case 1:
                        ?>

                        <!--Sidebar Navigation Menu-->
                        <div class="sidebar-menu-container">
                            <ul class="sidebar-menu mt-4 mb-4">
                                <li class="parent">
                                    <a href="index.php?action=procedureMan" class=""><i class="fa fa-cogs mr-3"></i>
                                        <span class="none">MANUEL DE PROCEDURES</span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=DashboardPage" class=""><i class="fa fa-dashboard mr-3"></i>
                                        <span class="none">TABLEAU DE BORD </span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=passportsList" class=""><i class="fa fa-book mr-3"> </i>
                                        <span class="none">PASSEPORTS</span>
                                    </a>
                                </li>
                                <li class="parent">
                                    <a href="index.php?action=visasList" class=""><i class="fa fa-id-card mr-3"> </i>
                                        <span class="none">VISAS</span>
                                    </a>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('calender'); return false" class=""><i
                                            class="fa fa-calendar mr-3"> </i>
                                        <span class="none">CALENDRIER<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="calender">
                                        <li class="child"><a href="index.php?action=eventsList" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LISTE D'EVENEMENTS</a></li>
                                        <li class="child"><a href="index.php?action=calendar" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> CALENDRIER PERSONEL</a></li>
                                        <li class="child"><a href="index.php?action=sharedCalendar" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> CALENDRIER PARTAGE</a></li>
                                    </ul>
                                </li>


                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('todo'); return false" class=""><i
                                            class="fa fa-list-ul mr-3"> </i>
                                        <span class="none">A FAIRE<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="todo">
                                        <li class="child"><a href="index.php?action=todoAddingForm" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> AJOUTER</a></li>
                                        <li class="child"><a href="index.php?action=todosList" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LISTE</a></li>
                                        <li class="child"><a href="index.php?action=todoHistoric" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> HISTORIQUE</a></li>

                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('mission_orders'); return false" class=""><i
                                            class="fa fa-file-word mr-3"> </i>
                                        <span class="none">ORDRES DE MISSION<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="mission_orders">
                                        <li class="child"><a href="index.php?action=intMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> INTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=extMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> EXTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=DOMgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> DEMANDE</a></li>
                                        <li class="child"><a href="index.php?action=MOArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> ARCHIVES</a></li>
                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('correspondences'); return false" class=""><i
                                            class="fa fa-envelope mr-3"> </i>
                                        <span class="none">CORRESPONDANCES<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="correspondences">
                                        <li class="child"><a href="index.php?action=couriersArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LETTRES</a></li>
                                        <li class="child"><a href="index.php?action=MSGArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> MESSAGES</a></li>
                                        <li class="child"><a href="index.php?action=NDSArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> NOTES DE SERVICE</a></li>
                                        <li class="child"><a href="index.php?action=BEArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> BORDEREAUX</a></li>
                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="index.php?action=Archives" class=""><i
                                            class="fa fa-archive mr-3"> </i>
                                        <span class="none">ARCHIVES</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!--Sidebar Naigation Menu-->

                        <?php
                        break;
                    case 2:
                        ?>

                        <!--Sidebar Navigation Menu-->
                        <div class="sidebar-menu-container">
                            <ul class="sidebar-menu mt-4 mb-4">

                                <li class="parent">
                                    <a href="index.php?action=DashboardPage" class=""><i class="fa fa-dashboard mr-3"></i>
                                        <span class="none">TABLEAU DE BORD </span>
                                    </a>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('todo'); return false" class=""><i
                                            class="fa fa-list-ul mr-3"> </i>
                                        <span class="none">A FAIRE<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="todo">
                                        <li class="child"><a href="index.php?action=todoAddingForm" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> AJOUTER</a></li>
                                        <li class="child"><a href="index.php?action=todosList" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LISTE</a></li>
                                        <li class="child"><a href="index.php?action=todoHistoric" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> HISTORIQUE</a></li>

                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('mission_orders'); return false" class=""><i
                                            class="fa fa-file-word mr-3"> </i>
                                        <span class="none">ORDRES DE MISSION<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="mission_orders">
                                        <li class="child"><a href="index.php?action=intMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> INTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=extMOgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> EXTERIEUR</a></li>
                                        <li class="child"><a href="index.php?action=DOMgenerator" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> DEMANDE</a></li>
                                        <li class="child"><a href="index.php?action=MOArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> ARCHIVES</a></li>
                                    </ul>
                                </li>

                                <li class="parent">
                                    <a href="#" onclick="toggle_menu('correspondences'); return false" class=""><i
                                            class="fa fa-envelope mr-3"> </i>
                                        <span class="none">CORRESPONDANCES<i
                                                class="fa fa-angle-down pull-right align-bottom"></i></span>
                                    </a>
                                    <ul class="children" id="correspondences">
                                        <li class="child"><a href="index.php?action=couriersArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> LETTRES</a></li>
                                        <li class="child"><a href="index.php?action=MSGArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> MESSAGES</a></li>
                                        <li class="child"><a href="index.php?action=NDSArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> NOTES DE SERVICE</a></li>
                                        <li class="child"><a href="index.php?action=BEArchives" class="ml-4"><i
                                                    class="fa fa-angle-right mr-2"></i> BORDEREAUX</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <!--Sidebar Naigation Menu-->


                        <?php
                        break;
                } ?>

            </div>
        </div>
        <!--Sidebar left-->
        <!--Dashboard widget-->
        <!--/Dashboard widget-->