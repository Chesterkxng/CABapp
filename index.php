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

// DASHBORD IMPORT 
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

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {


        // LOGIN ROUTER

        // SIGN UP ROUTER

        // when the form for creating a new account is filled and the submit button is clicked 
        if ($_GET['action'] === 'signUp') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SignUp())->signUp($input);
            }

            // after the popup the user is redirected to the profile informations completion's page  
            // Or when a registered account doesn't have the profile's informations filled    
        } elseif ($_GET['action'] === 'signUpProfilePage') {
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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new Profile())->profileCompletion($input);
            }

            // when the 'signIn button is clicked from the sign Up page 
        } elseif ($_GET['action'] === 'signInPage') {
            (new SignIn())->signInPage();
        }

        // END OF SIGN UP ROUTER

        // SIGN IN ROUTER

        //sign In controller
        if ($_GET['action'] === 'signIn') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SignIn())->connect($input);
            }

            // when the forgotten password link is cliked
        } elseif ($_GET['action'] === 'forgottenPasswordPage') {

            (new forgottenPassword())->forgottenPasswordPage();

            // when the informations are filled in the form and the password reset's button is pressed 
        } elseif ($_GET['action'] === 'redirectQA') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new forgottenPassword())->redirectQA($input);
            }
            // if the informations filled are correct the popup will directly redirect to the security QA verification
        } elseif ($_GET['action'] === 'securityQAPage') {
            (new SecurityQA())->SecurityQAPage();

            // when the security answer is set
        } elseif ($_GET['action'] === 'verifyQA') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                (new SecurityQA())->VerifiyQA($input);
            }
        } elseif ($_GET['action'] === 'signUpPage') {

            (new SignUp())->signUpPage();
        }
        // END OF SIGN IN ROUTEUR 
        elseif ($_GET['action'] === 'updateProfilePage') {

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
        }

        // SIGN OUT ROUTER 
        if ($_GET['action'] === 'signOut') {
            (new SignOut())->signOut();
        }


        // DASHBORD ROUTER 
        
        //load the dasboardPage
        if ($_GET['action'] === 'DashboardPage') {
            $personal_id = $_SESSION['PERSONAL_ID'];
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
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Passport())->passportsList();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
            //Passport Adding Form 
        if ($_GET['action'] === 'passportAddingForm') {
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Passport())->passportAddingForm();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            // add passport 
         } elseif ($_GET['action'] === 'addPassport') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Passport())->addPassport($input);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // Passport updating Form
        }  elseif ($_GET['action'] === 'updatePassportForm') {
            if (isset($_SESSION['ISAUTH'])) {
                $passport_id = $_GET['passport_id']; 
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Passport())->passportUpdateForm($passport_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        // update passport  
     } elseif ($_GET['action'] === 'updatePassport') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = $_POST;
            $passport_id = $_GET['passport_id']; 
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Passport())->updatePassport($input,$passport_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        // Passport deletion popup 
    } elseif ($_GET['action'] === 'deletePassportPopup') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $passport_id = $_GET['passport_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Passport())->sendDeletePopup($passport_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
        //  delete Passport    
    } elseif ($_GET['action'] === 'deletePassport') {
        $passport_id = $_GET['passport_id'];
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new Passport())->deletePassport($passport_id);     
            }
        } else {
            (new SignIn())->signInPage();
        }

    }

    // VISA ROUTER 
            // VISA List 
            if ($_GET['action'] === 'visasList') {
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Visa())->visasList();
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
                //visa Adding Form 
            if ($_GET['action'] === 'visaAddingForm') {
                    if (isset($_SESSION['ISAUTH'])) {
                        $isAuth = $_SESSION['ISAUTH'];
                        if ($isAuth == 1) {
                            (new Visa())->visaAddingForm();
                        }
                    } else {
                        (new SignIn())->signInPage();
                    }
                // add visa 
             } elseif ($_GET['action'] === 'addVisa') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                    if (isset($_SESSION['ISAUTH'])) {
                        $isAuth = $_SESSION['ISAUTH'];
                        if ($isAuth == 1) {
                            (new Visa())->addVisa($input);
                        }
                    } else {
                        (new SignIn())->signInPage();
                    }
                }
                // Visa updating Form
            }  elseif ($_GET['action'] === 'updateVisaForm') {
                if (isset($_SESSION['ISAUTH'])) {
                    $visa_id = $_GET['visa_id']; 
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Visa())->visaUpdateForm($visa_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            // update visa 
         } elseif ($_GET['action'] === 'updateVisa') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $input = $_POST;
                $visa_id = $_GET['visa_id']; 
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Visa())->updateVisa($input,$visa_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            // visa deletion popup 
        } elseif ($_GET['action'] === 'deleteVisaPopup') {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $visa_id = $_GET['visa_id'];
                if (isset($_SESSION['ISAUTH'])) {
                    $isAuth = $_SESSION['ISAUTH'];
                    if ($isAuth == 1) {
                        (new Visa())->sendDeletePopup($visa_id);
                    }
                } else {
                    (new SignIn())->signInPage();
                }
            }
            //  delete visa    
        } elseif ($_GET['action'] === 'deleteVisa') {
            $visa_id = $_GET['visa_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Visa())->deleteVisa($visa_id);     
                }
            } else {
                (new SignIn())->signInPage();
            }  
        }
        // END OF VISA ROUTER

        // CALENDAR 

        if ($_GET['action'] === 'calendar') {
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Calendar())->calendar();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'eventsList') {
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Calendar())->eventsList();     
                }
            } else {
                (new SignIn())->signInPage();
            }  
        }  elseif ($_GET['action'] === 'updateEventForm') {
            if (isset($_SESSION['ISAUTH'])) {
                $event_id = $_GET['event_id']; 
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Calendar())->eventUpdateForm($event_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        
     } elseif ($_GET['action'] === 'updateEvent') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = $_POST;
            $event_id = $_GET['event_id']; 
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Calendar())->updateEvent($input,$event_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        }
    } elseif ($_GET['action'] === 'deleteEventPopup') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $event_id = $_GET['event_id'];
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Calendar())->sendDeletePopup($event_id);
                }
            } else {
                (new SignIn())->signInPage();
            }
        }  
    } elseif ($_GET['action'] === 'deleteEvent') {
        $event_id = $_GET['event_id'];
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new Calendar())->deleteEvent($event_id);     
            }
        } else {
            (new SignIn())->signInPage();
        }  
    }

        // END OF CALENDAR 

        // TODO LIST 
        if ($_GET['action'] === 'todosList') {
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoList();
                }
            } else {
                (new SignIn())->signInPage();
            }
        }   elseif ($_GET['action'] === 'todoAddingForm') {
            if (isset($_SESSION['ISAUTH'])) {
                $isAuth = $_SESSION['ISAUTH'];
                if ($isAuth == 1) {
                    (new Todo())->todoAddingForm();
                }
            } else {
                (new SignIn())->signInPage();
            }
        } elseif ($_GET['action'] === 'addTodo') {
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
        }   elseif ($_GET['action'] === 'updateTodoForm') {
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
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new Todo())->todoListHistoric();
            }
        } else {
            (new SignIn())->signInPage();
        }
    }
    // MO GENERATOR 
    if ($_GET['action'] === 'extMOgenerator') {
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new MissionOrders())->extMOgenerateForm();
            }
        } else {
            (new SignIn())->signInPage();
        }
    } elseif ($_GET['action'] === 'intMOgenerator') {
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new MissionOrders())->intMOgenerateForm();
            }
        } else {
            (new SignIn())->signInPage();
        }
    } elseif ($_GET['action'] === 'DOMgenerator') {
        if (isset($_SESSION['ISAUTH'])) {
            $isAuth = $_SESSION['ISAUTH'];
            if ($isAuth == 1) {
                (new MissionOrders())->DOMgenerateForm();
            }
        } else {
            (new SignIn())->signInPage();
        }
    }














    } else {
        (new SignUp())->signUpPage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
}