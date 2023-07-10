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

// ERROR HANDLING IMPORT 
require_once('src/controllers/errorHandlingControllers/error.php');


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
use Application\Controllers\ErrorHandlingControllers\Error\Error;


try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        $found = 0;
        // LOGIN ROUTER

        // SIGN UP ROUTER

        // Or when a registered account doesn't have the profile's informations filled    
        if ($_GET['action'] === 'signUpProfilePage') {
            $found = 1;
            $personalRepository = new PersonalRepository();
            $personalRepository->connection = new DatabaseConnection();

            if (isset($_SESSION['LOGIN_ID'])) {
                $login_id = $_SESSION['LOGIN_ID'];
                $isProfileFilled = $personalRepository->isProfileFilled($login_id);
                if ($isProfileFilled == 0) {
                    (new Profile())->signUpProfilePage();
                }
            }


            // once the profile informations Form is filled and the 'complete your profile' button is clicked 
        } elseif ($_GET['action'] === 'profileCompletion') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new Profile())->profileCompletion($input);
            }

            // when the 'signIn button is clicked from the sign Up page 
        } elseif ($_GET['action'] === 'signInPage') {
            $found = 1;
            (new SignIn())->signInPage();
        }

        // END OF SIGN UP ROUTER

        // SIGN IN ROUTER

        //sign In controller
        if ($_GET['action'] === 'signIn') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SignIn())->connect($input);
            }

            // when the forgotten password link is cliked
        } elseif ($_GET['action'] === 'forgottenPasswordPage') {
            $found = 1;
            (new forgottenPassword())->forgottenPasswordPage();

            // when the informations are filled in the form and the password reset's button is pressed 
        } elseif ($_GET['action'] === 'redirectQA') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new forgottenPassword())->redirectQA($input);
            }
            // if the informations filled are correct the popup will directly redirect to the security QA verification
        } elseif ($_GET['action'] === 'securityQAPage') {
            $found = 1;
            (new SecurityQA())->SecurityQAPage();

            // when the security answer is set
        } elseif ($_GET['action'] === 'verifyQA') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SecurityQA())->VerifiyQA($input);
            }
        }
        // END OF SIGN IN ROUTEUR 
        elseif ($_GET['action'] === 'updateProfilePage') {
            $found = 1;
            $login_id = $_GET['login_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Personal())->updateCurrentProfilPage($login_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
            // update the connected profile based on informations filled 
        } elseif ($_GET['action'] === 'updateProfileInfos') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login_id = $_GET['login_id'];
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Personal())->updateProfile($login_id, $input);
                    }
                }
            }
        } elseif ($_GET['action'] === 'updateSecurityInfos') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login_id = $_GET['login_id'];
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Personal())->UpdateSecurityInfos($input,$login_id);
                    }
                }
            }
        }

        // SIGN OUT ROUTER 
        if ($_GET['action'] === 'signOut') {
            $found = 1;
            (new SignOut())->signOut();
        }


        // DASHBORD ROUTER 

        //load the dasboardPage
        if ($_GET['action'] === 'DashboardPage') {
            $found = 1;
            if (isset($_SESSION['PERSONAL_ID'])) {
                $personal_id = $_SESSION['PERSONAL_ID'];
            }
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Dashboard())->DashboardPage($personal_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        }

        // END OF DASHBOARD ROUTEUR 

        // PASSPORT ROUTER 
        // Passport List 
        if ($_GET['action'] === 'passportsList') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Passport())->passportsList();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        //Passport Adding Form 
        if ($_GET['action'] === 'passportAddingForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];

                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Passport())->passportAddingForm();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
            // add passport 
        } elseif ($_GET['action'] === 'addPassport') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Passport())->addPassport($input);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // Passport updating Form
        } elseif ($_GET['action'] === 'updatePassportForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $passport_id = $_GET['passport_id'];
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Passport())->passportUpdateForm($passport_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
            // update passport  
        } elseif ($_GET['action'] === 'updatePassport') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                $passport_id = $_GET['passport_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Passport())->updatePassport($input, $passport_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // Passport deletion popup 
        } elseif ($_GET['action'] === 'deletePassportPopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $passport_id = $_GET['passport_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Passport())->sendDeletePopup($passport_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            //  delete Passport    
        } elseif ($_GET['action'] === 'deletePassport') {
            $found = 1;
            $passport_id = $_GET['passport_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Passport())->deletePassport($passport_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }

        // VISA ROUTER 
        // VISA List 
        if ($_GET['action'] === 'visasList') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];

                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Visa())->visasList();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        //visa Adding Form 
        if ($_GET['action'] === 'visaAddingForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Visa())->visaAddingForm();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
            // add visa 
        } elseif ($_GET['action'] === 'addVisa') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Visa())->addVisa($input);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // Visa updating Form
        } elseif ($_GET['action'] === 'updateVisaForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $visa_id = $_GET['visa_id'];
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Visa())->visaUpdateForm($visa_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
            // update visa 
        } elseif ($_GET['action'] === 'updateVisa') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                $visa_id = $_GET['visa_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Visa())->updateVisa($input, $visa_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // visa deletion popup 
        } elseif ($_GET['action'] === 'deleteVisaPopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $visa_id = $_GET['visa_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Visa())->sendDeletePopup($visa_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            //  delete visa    
        } elseif ($_GET['action'] === 'deleteVisa') {
            $found = 1;
            $visa_id = $_GET['visa_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Visa())->deleteVisa($visa_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        // END OF VISA ROUTER

        // CALENDAR 

        if ($_GET['action'] === 'calendar') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Calendar())->calendar();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'sharedCalendar') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Calendar())->sharedCalendar();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'eventsList') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Calendar())->eventsList();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'updateEventForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $event_id = $_GET['event_id'];
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Calendar())->eventUpdateForm($event_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'updateEvent') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                $event_id = $_GET['event_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Calendar())->updateEvent($input, $event_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'deleteEventPopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $event_id = $_GET['event_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Calendar())->sendDeletePopup($event_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'deleteEvent') {
            $found = 1;
            $event_id = $_GET['event_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Calendar())->deleteEvent($event_id);
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }

        // END OF CALENDAR 

        // TODO LIST 
        if ($_GET['action'] === 'todosList') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoList();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'todoAddingForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoAddingForm();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'addTodo') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Todo())->addTodo($input);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'updateTodoForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $todo_id = $_GET['todo_id'];
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoUpdatingForm($todo_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'updateTodo') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                $todo_id = $_GET['todo_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Todo())->updateTodo($input, $todo_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'todoDeletePopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $todo_id = $_GET['todo_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Todo())->sendDeletePopup($todo_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'deleteTodo') {
            $found = 1;
            $todo_id = $_GET['todo_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->deleteTodo($todo_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'markAsdonePopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $todo_id = $_GET['todo_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Todo())->sendMarkAsDonePopup($todo_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'markAsDone') {
            $found = 1;
            $todo_id = $_GET['todo_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->MarkAsDone($todo_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'markAsTraitedPopup') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $todo_id = $_GET['todo_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Todo())->sendMarkasTraitedPopup($todo_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'markAsTraited') {
            $found = 1;
            $todo_id = $_GET['todo_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->MarkAsTraited($todo_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'todoHistoric') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoListHistoric();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        // courier Router
        if ($_GET['action'] === 'courierAddingForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Courier())->courierAddingForm();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'addCourier') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type != 2) {
                        (new Courier())->addCourier($input);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'couriersArchives') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type != 2) {
                    (new Courier())->courierArchives();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }




        // MO GENERATOR 
        if ($_GET['action'] === 'extMOgenerator') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new MissionOrders())->extMOgenerateForm();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'saveExtMO') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new MissionOrders())->saveExtMO($input);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'intMOgenerator') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new MissionOrders())->intMOgenerateForm();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'saveIntMO') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new MissionOrders())->saveIntOM($input);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'DOMgenerator') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new MissionOrders())->DOMgenerateForm();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'saveDOM') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new MissionOrders())->saveDOM($input);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'MOArchives') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new MissionOrders())->MOArchives();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'uploadForm') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $om_id = $_GET['om_id'];
                $type = $_GET['type'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new MissionOrders())->uploadMOPage($om_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'uploadMO') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $om_id = $_GET['om_id'];
                $type = $_GET['type'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new MissionOrders())->uploadMO($type, $om_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        }

        // ACCESS CONTROLS
        if ($_GET['action'] === 'userAddingForm') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type == 0) {
                    (new SignUp())->userAddingForm();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'addUser') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type == 0) {
                        (new SignUp())->addUser($input);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'usersList') {
            $found = 1;
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                $profile_type = $_SESSION['profile_type'];
                if ($isAuth == 1 && $profile_type == 0) {
                    (new SignUp())->usersList();
                } else {
                    (new Error())->forbiddenPage();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'updateUserForm') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $login_id = $_GET['login']; 
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type == 0) {
                        (new SignUp())->updateUserLoginForm($login_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        } elseif ($_GET['action'] === 'updateUser') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $user_id = $_GET['login']; 
                $input = $_POST;  
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    $profile_type = $_SESSION['profile_type'];
                    if ($isAuth == 1 && $profile_type == 0) {
                       (new SignUp())->UpdateUserSU($input,$user_id);
                    } else {
                        (new Error())->forbiddenPage();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
        }





        // ext FORM ROuter 
        if ($_GET['action'] === 'extPage') {
            $found = 1;
            (new extForm())->loadExtPage();
        } elseif ($_GET['action'] === 'extPassportadding') {
            $found = 1;
            (new extForm())->PassportAddingForm();
        } elseif ($_GET['action'] === 'ExtAddPassport') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new extForm())->addPassport($input);
            }
        } elseif ($_GET['action'] === 'extVisaAdding') {
            $found = 1;
            (new extForm())->visaAddingForm();
        } elseif ($_GET['action'] === 'ExtAddVisa') {
            $found = 1;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new extForm())->addVisa($input);
            }
        }

















        if ($found == 0) {
            (new Error())->unfoundPage();
        }
    } else {
        (new SignIn())->signInPage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}
