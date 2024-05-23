<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();

// LOGIN CONTROLLERS IMPORT 
require_once('src/controllers/loginControllers/SignUp.php');
require_once('src/controllers/loginControllers/profile.php');
require_once('src/controllers/loginControllers/signIn.php');
require_once('src/controllers/loginControllers/forgottenPassword.php');
require_once('src/controllers/loginControllers/securityQA.php');
require_once('src/controllers/loginControllers/signOut.php');


//PERSONAL CONTROLLERS IMPORT 
require_once('src/controllers/personalControllers/personal.php');

// DATABASE IMPORT 
require_once('src/lib/database.php');

// DASHBOARD IMPORT 
require_once('src/controllers/dashboardControllers/dashboard.php');

// PASSPORT IMPORT 
require_once('src/controllers/passportControllers/passport.php');

// VISA IMPORT 
require_once('src/controllers/visaControllers/visa.php');

// CALENDAR IMPORT 
require_once('src/controllers/calendarControllers/calendar.php');

// TODO IMPORT 
require_once('src/controllers/todoControllers/todo.php');

// MO Import 
require_once('src/controllers/MOControllers/missionOrders.php');

// ext FORM IMPORT 
require_once('src/controllers/extFormControllers/extForm.php');

// Courier IMPORT
require_once('src/controllers/courierControllers/courier.php');
require_once('src/controllers/courierControllers/nds.php');
require_once('src/controllers/courierControllers/message.php');
require_once('src/controllers/courierControllers/bordereau.php');

// Archive IMPORT
require_once('src/controllers/archiveControllers/archive.php');

// ERROR HANDLING IMPORT 
require_once('src/controllers/errorHandlingControllers/error.php');

require_once('src/lib/dashboard.php');
require_once('src/lib/database.php');

use Application\lib\Dashboard\DashboardRepository;


use Application\Controllers\LoginControllers\SignUp\SignUp;
use Application\Controllers\LoginControllers\Profile\Profile;
use Application\Controllers\LoginControllers\SignIn\SignIn;
use Application\Controllers\LoginControllers\forgottenPassword\forgottenPassword;
use Application\Controllers\LoginControllers\SecurityQA\SecurityQA;
use Application\Controllers\LoginControllers\SignOut\SignOut;

use Application\Lib\Database\DatabaseConnection;

use Application\Controllers\PersonalControllers\Personal\Personal;
use Application\Model\Personal\PersonalRepository;

use Application\Controllers\DashboardControllers\Dashboard\Dashboard;
use Application\Controllers\PassportControllers\Passport\Passport;
use Application\Controllers\VisaControllers\Visa\Visa;
use Application\Controllers\CalendarControllers\Calendar\Calendar;
use Application\Controllers\TodoControllers\Todo\Todo;
use Application\Controllers\MOControllers\MissionOrders\MissionOrders;
use Application\Controllers\extFormControllers\extForm\extForm;
use Application\Controllers\CourierControllers\Courier\Courier;
use Application\Controllers\CourierControllers\NDS\NDS;
use Application\Controllers\CourierControllers\Message\MSG;
use Application\Controllers\CourierControllers\BE\BE;
use Application\controllers\ArchiveControllers\Archive\Archive;
use Application\Controllers\ErrorHandlingControllers\Error\Error;

try {

    function checkAuthorization(int $checked_type)
    {
        if (!isset($_SESSION['ISAUTH'])) {
            (new SignIn())->signInPage();
            return false;
        }
        if ($checked_type == 2) {
            (new Error())->forbiddenPage();
            return false;
        }
        return true;
    }

    $action = $_GET['action'] ?? ''; // Get the action or set to empty string if not set

    switch ($action) {
        case '':
            (new SignIn())->signInPage();
            break;

        case 'signUpProfilePage':

            $personalRepository = new PersonalRepository();
            $personalRepository->connection = new DatabaseConnection();
            if (isset($_SESSION['LOGIN_ID'])) {
                $login_id = $_SESSION['LOGIN_ID'];
                $isProfileFilled = $personalRepository->isProfileFilled($login_id);
                if ($isProfileFilled == 0) {
                    (new Profile())->signUpProfilePage();
                }
            }
            break;

        case 'profileCompletion':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new Profile())->profileCompletion($input);
            }
            break;

        case 'signInPage':

            (new SignIn())->signInPage();
            break;

        case 'signIn':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SignIn())->connect($input);
            }
            break;

        case 'forgottenPasswordPage':

            (new forgottenPassword())->forgottenPasswordPage();
            break;

        case 'redirectQA':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new forgottenPassword())->redirectQA($input);
            }
            break;

        case 'securityQAPage':

            (new SecurityQA())->SecurityQAPage();
            break;

        case 'verifyQA':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SecurityQA())->VerifiyQA($input);
            }
            break;

        case 'updateProfilePage':

            $login_id = $_GET['login_id'];
            if (isset($_SESSION['ISAUTH'])) {
                (new Personal())->updateCurrentProfilPage($login_id);
            } else {
                (new SignIn())->signInPage();
            }
            break;

        case 'updateProfileInfos':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login_id = $_GET['login_id'];
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    (new Personal())->updateProfile($login_id, $input);
                }
            }
            break;

        case 'updateSecurityInfos':

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login_id = $_GET['login_id'];
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    (new Personal())->UpdateSecurityInfos($input, $login_id);
                }
            }
            break;

        case 'updateProfilePicture':

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['ISAUTH'])) {
                $login_id = $_GET['login_id'];
                (new Personal())->UpdateProfilePicture($login_id);
            }
            break;

        case 'signOut':

            (new SignOut())->signOut();
            break;

        case 'DashboardPage':
        case 'procedureMan':

            $personal_id = $_SESSION['PERSONAL_ID'] ?? null;
            if (isset($_SESSION['ISAUTH'])) {
                $action === 'DashboardPage' ? (new Dashboard())->DashboardPage($personal_id) : (new Dashboard())->procedureMan();
            } else {
                (new SignIn())->signInPage();
            }
            break;

            // PASSEPORT ROUTER
        case 'passportsList':
        case 'passportAddingForm':
        case 'updatePassportForm':
        case 'updatePassport':
        case 'deletePassportPopup':
        case 'deletePassport':

            if (checkAuthorization($_SESSION['profile_type'])) {
                switch ($action) {
                    case 'passportsList':
                        (new Passport())->passportsList();
                        break;
                    case 'passportAddingForm':
                        (new Passport())->passportAddingForm();
                        break;
                    case 'updatePassportForm':
                        $passport_id = $_GET['passport_id'];
                        (new Passport())->passportUpdateForm($passport_id);
                        break;
                    case 'updatePassport':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $passport_id = $_GET['passport_id'];
                            $input = $_POST;
                            (new Passport())->updatePassport($input, $passport_id);
                        }
                        break;
                    case 'deletePassportPopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $passport_id = $_GET['passport_id'];
                            (new Passport())->sendDeletePopup($passport_id);
                        }
                        break;
                    case 'deletePassport':
                        $passport_id = $_GET['passport_id'];
                        (new Passport())->deletePassport($passport_id);
                        break;
                }
            }
            break;

            // VISA ROUTER 
        case 'visasList':
        case 'visaAddingForm':
        case 'addVisa':
        case 'updateVisaForm':
        case 'updateVisa':
        case 'deleteVisaPopup':
        case 'deleteVisa':

            if (checkAuthorization($_SESSION['profile_type'])) {
                switch ($action) {
                    case 'visasList':
                        (new Visa())->visasList();
                        break;

                    case 'visaAddingForm':
                        (new Visa())->visaAddingForm();
                        break;

                    case 'addVisa':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new Visa())->addVisa($input);
                        }
                        break;

                    case 'updateVisaForm':
                        if (checkAuthorization($_SESSION['profile_type'])) {
                            $visa_id = $_GET['visa_id'];
                            (new Visa())->visaUpdateForm($visa_id);
                        }
                        break;

                    case 'updateVisa':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            $visa_id = $_GET['visa_id'];
                            (new Visa())->updateVisa($input, $visa_id);
                        }
                        break;

                    case 'deleteVisaPopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $visa_id = $_GET['visa_id'];
                            (new Visa())->sendDeletePopup($visa_id);
                        }
                        break;

                    case 'deleteVisa':
                        $visa_id = $_GET['visa_id'];
                        (new Visa())->deleteVisa($visa_id);
                        break;
                }
            }
            break;

            // CALENDAR ROUTES
        case 'calendar':
        case 'sharedCalendar':
        case 'eventsList':
        case 'updateEventForm':
        case 'updateEvent':
        case 'deleteEventPopup':
        case 'deleteEvent':
            if (checkAuthorization($_SESSION['profile_type'])) {
                switch ($action) {
                    case 'calendar':
                        (new Calendar())->calendar();
                        break;

                    case 'sharedCalendar':
                        (new Calendar())->sharedCalendar();
                        break;

                    case 'eventsList':
                        (new Calendar())->eventsList();
                        break;

                    case 'updateEventForm':
                        $event_id = $_GET['event_id'];
                        (new Calendar())->eventUpdateForm($event_id);
                        break;

                    case 'updateEvent':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            $event_id = $_GET['event_id'];
                            (new Calendar())->updateEvent($input, $event_id);
                        }
                        break;

                    case 'deleteEventPopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $event_id = $_GET['event_id'];
                            (new Calendar())->sendDeletePopup($event_id);
                        }
                        break;

                    case 'deleteEvent':
                        $event_id = $_GET['event_id'];
                        (new Calendar())->deleteEvent($event_id);
                        break;
                }
            }
            break;




            // TODO LIST 
        case 'todosList':
        case 'todoAddingForm':
        case 'addTodo':
        case 'updateTodoForm':
        case 'updateTodo':
        case 'todoDeletePopup':
        case 'deleteTodo':
        case 'markAsdonePopup':
        case 'markAsTraitedPopup':
        case 'markAsTraited':
        case 'todoHistoric':
        case 'todoDeletePopup2':
        case 'deleteTodo2':
            if (isset($_SESSION['ISAUTH'])) {
                switch ($action) {
                    case 'todosList':
                        (new Todo())->todoList();
                        break;

                    case 'todoAddingForm':
                        (new Todo())->todoAddingForm();
                        break;

                    case 'addTodo':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new Todo())->addTodo($input);
                        }
                        break;

                    case 'updateTodoForm':
                        $todo_id = $_GET['todo_id'];
                        (new Todo())->todoUpdatingForm($todo_id);
                        break;

                    case 'updateTodo':
                        $todo_id = $_GET['todo_id'];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new Todo())->updateTodo($input, $todo_id);
                        }
                        break;

                    case 'todoDeletePopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $todo_id = $_GET['todo_id'];
                            (new Todo())->sendDeletePopup($todo_id);
                        }
                        break;

                    case 'deleteTodo':
                        $todo_id = $_GET['todo_id'];
                        (new Todo())->deleteTodo($todo_id);
                        break;

                    case 'markAsdonePopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $todo_id = $_GET['todo_id'];
                            (new Todo())->sendMarkAsDonePopup($todo_id);
                        }
                        break;

                    case 'markAsDone':
                        $todo_id = $_GET['todo_id'];
                        (new Todo())->MarkAsDone($todo_id);
                        break;

                    case 'markAsTraitedPopup':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $todo_id = $_GET['todo_id'];
                            (new Todo())->sendMarkasTraitedPopup($todo_id);
                        }
                        break;

                    case 'markAsTraited':
                        $todo_id = $_GET['todo_id'];
                        (new Todo())->MarkAsTraited($todo_id);
                        break;

                    case 'todoHistoric':
                        (new Todo())->todoListHistoric();
                        break;

                    case 'todoDeletePopup2':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $todo_id = $_GET['todo_id'];
                            (new Todo())->sendDeletePopup2($todo_id);
                        }
                        break;

                    case 'deleteTodo2':
                        $todo_id = $_GET['todo_id'];
                        (new Todo())->deleteTodo2($todo_id);
                        break;
                }
            } else {
                (new SignIn())->signInPage();
            }
            break;


            // courier Routes
        case 'courierAddingForm':  // LETTRES
        case 'addCourier':
        case 'couriersArchives':
        case 'NDSArchives':  // NDS
        case 'ndsAddingForm':
        case 'addNDS':
        case 'NDSupdatingForm':
        case 'updateNDS':
        case 'deleteNDSPopup':
        case 'deleteNDS':
        case 'MSGArchives':    // MSG
        case 'MSGAddingForm':
        case 'addMSG':
        case 'MSGupdatingForm':
        case 'updateMSG':
        case 'deleteMSGPopup':
        case 'deleteMSG':
        case 'BEArchives': // BE
        case 'beAddingForm':
        case 'addBE':
        case 'BEupdatingForm':
        case 'updateBE':
        case 'deleteBEPopup':
        case 'deleteBE':

            if (isset($_SESSION['ISAUTH'])) {
                switch ($action) {
                    case 'courierAddingForm':
                        (new Courier())->courierAddingForm();
                        break;

                    case 'addCourier':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new Courier())->addCourier($input);
                        }
                        break;

                    case 'couriersArchives':
                        (new Courier())->courierArchives();
                        break;

                    case 'NDSArchives':
                        (new NDS())->NDSArchives();
                        break;

                    case 'ndsAddingForm':
                        (new NDS())->NDSAddingForm();
                        break;

                    case 'addNDS':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new NDS())->addNDS($input);
                        }
                        break;

                    case 'NDSupdatingForm':
                        $nds_id = $_GET['nds_id'];
                        (new NDS())->NDSUpdatingForm($nds_id);
                        break;

                    case 'updateNDS':
                        $nds_id = $_GET['nds_id'];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new NDS())->updateNDS($input, $nds_id);
                        }
                        break;

                    case 'deleteNDSPopup':
                        $nds_id = $_GET['nds_id'];
                        (new NDS())->sendDeletePopup($nds_id);
                        break;

                    case 'deleteNDS':
                        $nds_id = $_GET['nds_id'];
                        (new NDS())->deleteNDS($nds_id);
                        break;

                    case 'MSGArchives':
                        (new MSG())->MSGArchives();
                        break;

                    case 'MSGAddingForm':
                        (new MSG())->MSGAddingForm();
                        break;

                    case 'addMSG':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new MSG())->addMSG($input);
                        }
                        break;

                    case 'MSGupdatingForm':
                        $msg_id = $_GET['msg_id'];
                        (new MSG())->MSGUpdatingForm($msg_id);
                        break;

                    case 'updateMSG':
                        $msg_id = $_GET['msg_id'];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new MSG())->updateMSG($input, $msg_id);
                        }
                        break;

                    case 'deleteMSGPopup':
                        $msg_id = $_GET['msg_id'];
                        (new MSG())->sendDeletePopup($msg_id);
                        break;

                    case 'deleteMSG':
                        $msg_id = $_GET['msg_id'];
                        (new MSG())->deleteMSG($msg_id);
                        break;

                    case 'BEArchives':
                        (new BE())->BEArchives();
                        break;

                    case 'beAddingForm':
                        (new BE())->BEAddingForm();
                        break;

                    case 'addBE':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new BE())->addBE($input);
                        }
                        break;

                    case 'BEupdatingForm':
                        $be_id = $_GET['be_id'];
                        (new BE())->BEUpdatingForm($be_id);
                        break;

                    case 'updateBE':
                        $be_id = $_GET['be_id'];
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new BE())->updateBE($input, $be_id);
                        }
                        break;

                    case 'deleteBEPopup':
                        $be_id = $_GET['be_id'];
                        (new BE())->sendDeletePopup($be_id);
                        break;

                    case 'deleteBE':
                        $be_id = $_GET['be_id'];
                        (new BE())->deleteBE($be_id);
                        break;
                }
            } else {
                (new SignIn())->signInPage();
            }
            break;



            // ARCHIVES ROUTES
        case 'archiveAddingForm':
        case 'addArchive':
        case 'Archives':
            if (checkAuthorization($_SESSION['profile_type'])) {
                switch ($action) {
                    case 'archiveAddingForm':
                        (new Archive())->archiveAddingForm();
                        break;

                    case 'addArchive':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new Archive())->addArchive($input);
                        }
                        break;

                    case 'Archives':
                        (new Archive())->docArchives();
                        break;
                }
            }
            break;



            // MO GENERATOR 
        case 'extMOgenerator':
        case 'saveExtMO':
        case 'intMOgenerator':
        case 'saveIntMO':
        case 'DOMgenerator':
        case 'saveDOM':
        case 'MOArchives':
        case 'uploadForm':
        case 'uploadMO':
            if (isset($_SESSION['ISAUTH'])) {
                switch ($action) {
                    case 'extMOgenerator':
                        (new MissionOrders())->extMOgenerateForm();
                        break;

                    case 'saveExtMO':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new MissionOrders())->saveExtMO($input);
                        }
                        break;

                    case 'intMOgenerator':
                        (new MissionOrders())->intMOgenerateForm();
                        break;

                    case 'saveIntMO':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new MissionOrders())->saveIntOM($input);
                        }
                        break;

                    case 'DOMgenerator':
                        (new MissionOrders())->DOMgenerateForm();
                        break;

                    case 'saveDOM':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;
                            (new MissionOrders())->saveDOM($input);
                        }
                        break;

                    case 'MOArchives':
                        (new MissionOrders())->MOArchives();
                        break;

                    case 'uploadForm':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $om_id = $_GET['om_id'];
                            $type = $_GET['type'];
                            (new MissionOrders())->uploadMOPage($om_id);
                        }
                        break;

                    case 'uploadMO':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $om_id = $_GET['om_id'];
                            $type = $_GET['type'];
                            (new MissionOrders())->uploadMO($type, $om_id);
                        }
                        break;
                }
            }
            break;

            // ACCESS CONTROLS
        case 'userAddingForm':
        case 'addUser':
        case 'usersList':
        case 'updateUserForm':
        case 'updateUser':
            if (isset($_SESSION['ISAUTH']) && $_SESSION['profile_type'] == 0) {
                switch ($action) {
                    case 'userAddingForm':
                        (new SignUp())->userAddingForm();
                        break;

                    case 'addUser':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $input = $_POST;

                            (new SignUp())->addUser($input);
                        }
                        break;

                    case 'usersList':
                        (new SignUp())->usersList();
                        break;

                    case 'updateUserForm':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $login_id = $_GET['login'];
                            (new SignUp())->updateUserLoginForm($login_id);
                        }
                        break;

                    case 'updateUser':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $user_id = $_GET['login'];
                            $input = $_POST;
                            (new SignUp())->UpdateUserSU($input, $user_id);
                        }
                        break;
                }
            }
            break;


            if (isset($_SESSION['ISAUTH'])) {
                if (isset($_SESSION['PERSONAL_ID'])) {
                    $personal_id = $_SESSION['PERSONAL_ID'];
                }

                $dashboardRepository = new DashboardRepository();
                $dashboardRepository->connection = new DatabaseConnection();
                $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
                if ($receivedTodoNumber != 0) {
                    echo '<script type="text/javascript">
                    alertify.error("You have ' . $receivedTodoNumber . ' received tasks","",0);
                 </script>';
                }
            }


            // ext FORM ROuter 
        case 'extPage':
            (new ExtForm())->loadExtPage();
            break;

        case 'extPassportadding':
            (new ExtForm())->PassportAddingForm();
            break;

        case 'ExtAddPassport':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new ExtForm())->addPassport($input);
            }
            break;

        case 'extVisaAdding':
            (new ExtForm())->visaAddingForm();
            break;

        case 'ExtAddVisa':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new ExtForm())->addVisa($input);
            }
            break;

        default:
            (new Error())->unfoundPage();
            break;
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
