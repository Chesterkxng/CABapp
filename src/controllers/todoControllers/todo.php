<?php
namespace Application\Controllers\TodoControllers\Todo;

require_once ('src/lib/database.php');
require_once ('src/lib/dashboard.php');
require_once ('src/model/personal.php');
require_once ('src/model/todo.php');

use Application\Lib\Database\DatabaseConnection;
use Application\Model\Personal\PersonalRepository;
use Application\Lib\Dashboard\DashboardRepository;
use Application\Model\Todo\TodoRepository;

class Todo
{
    public function todoList()
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');
    }

    public function todoAddingForm()
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personnel = $personalRepository->getProfilesWithOut($personal_id);
        require ('templates/todo/addingForm.php');
    }

    public function addTodo(array $input)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personnel = $personalRepository->getProfilesWithOut($personal_id);
        require ('templates/todo/addingForm.php');

        if ($input !== null) {
            $title = null;
            $details = null;
            $deadline = null;
            $recipient = null;

            if (
                !empty($input['title']) && !empty($input['details'])
                && !empty($input['deadline']) && !empty($input['recipient'])

            ) {
                $title = htmlspecialchars($input['title']);
                $details = htmlspecialchars($input['details']);
                $deadline = htmlspecialchars($input['deadline']);
                $recipient = htmlspecialchars($input['recipient']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $todoRepository = new TodoRepository();
            $todoRepository->connection = new DatabaseConnection();
            $success = $todoRepository->addTodo($personal_id, strtoupper($title), $details, $deadline, $recipient);

            if ($success == 0) {
                echo '<script type="text/javascript">
                        addingErrorAlert()
                    </script>';
            } else {
                echo '<script type="text/javascript">
                        addingSuccessAlert()
                    </script>';
            }
        }
    }
    public function todoUpdatingForm(int $todo_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personnel = $personalRepository->getProfilesWithOut($personal_id);

        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $todo = $todoRepository->getTodo($todo_id);
        require ('templates/todo/updateForm.php');
    }

    public function updateTodo(array $input, int $todo_id)
    {
        $personalRepository = new PersonalRepository();
        $personalRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personnel = $personalRepository->getProfilesWithOut($personal_id);

        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $todo = $todoRepository->getTodo($todo_id);
        require ('templates/todo/updateForm.php');
        if ($input !== null) {
            $title = null;
            $details = null;
            $deadline = null;
            $recipient = null;

            if (
                !empty($input['title']) && !empty($input['details'])
                && !empty($input['deadline']) && !empty($input['recipient'])

            ) {
                $title = htmlspecialchars($input['title']);
                $details = htmlspecialchars($input['details']);
                $deadline = htmlspecialchars($input['deadline']);
                $recipient = htmlspecialchars($input['recipient']);
            } else {
                throw new \Exception('Les données du formulaire sont invalides.');
            }
            $todoRepository = new TodoRepository();
            $todoRepository->connection = new DatabaseConnection();
            $success = $todoRepository->updateTodo(strtoupper($title), $details, $deadline, $recipient, $personal_id, $todo_id);

            if ($success == 0) {
                echo '<script type="text/javascript">
                    updateErrorAlert()
                    </script>';
                ;
            } else {
                echo '<script type="text/javascript">
                        updateSuccessAlert()
                    </script>';
            }
        }
    }
    public function sendDeletePopup(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');

        echo '<script type="text/javascript">
            deletingConfirmAlert()
         </script>';

    }
    public function deleteTodo(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');
        $bool = $todoRepository->deleteTodo($todo_id);

        if ($bool == 1) {
            echo '<script type="text/javascript">
                        deletingSuccessAlert()
                    </script>';
        } else {
            echo '<script type="text/javascript">
                    deletingErrorAlert()
                </script>';
        }

    }
    public function sendMarkAsDonePopup(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');

        echo '<script type="text/javascript">
            markAsDoneAlert()
         </script>';

    }

    public function MarkAsDone(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');
        $bool = $todoRepository->markTodoAsDone($todo_id);

        if ($bool == 0) {
            echo '<script type="text/javascript">
                updateErrorAlert()
                </script>';
            ;
        } else {
            echo '<script type="text/javascript">
                    updateSuccessAlert()
                </script>';
        }

    }

    public function sendMarkAsTraitedPopup(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');

        echo '<script type="text/javascript">
            markAsTraitedAlert()
         </script>';

    }

    public function MarkAsTraited(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodo($personal_id);
        $givenTodo = $todoRepository->getGivenTodo($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodo($personal_id);
        $dashboardRepository = new DashboardRepository();
        $dashboardRepository->connection = new DatabaseConnection();
        $ownTodoNumber = $dashboardRepository->ownTodoNumber($personal_id);
        $givenTodoNumber = $dashboardRepository->givenTodoNumber($personal_id);
        $receivedTodoNumber = $dashboardRepository->receivedTodoNumber($personal_id);
        require ('templates/todo/todoList.php');
        $bool = $todoRepository->markTodoAsTraited($todo_id);

        if ($bool == 0) {
            echo '<script type="text/javascript">
                updateErrorAlert()
                </script>';
            ;
        } else {
            echo '<script type="text/javascript">
                    updateSuccessAlert()
                </script>';
        }

    }
    public function todoListHistoric()
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodoHistoric($personal_id);
        $givenTodo = $todoRepository->getGivenTodoHistoric($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodoHistoric($personal_id);
        require ('templates/todo/historic.php');
    }
    public function sendDeletePopup2(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodoHistoric($personal_id);
        $givenTodo = $todoRepository->getGivenTodoHistoric($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodoHistoric($personal_id);
        require ('templates/todo/historic.php');

        echo '<script type="text/javascript">
            deletingConfirmAlert2()
         </script>';

    }
    public function deleteTodo2(int $todo_id)
    {
        $todoRepository = new TodoRepository();
        $todoRepository->connection = new DatabaseConnection();
        $personal_id = $_SESSION['PERSONAL_ID'];
        $personal_id = $_SESSION['PERSONAL_ID'];
        $ownTodo = $todoRepository->getOwnTodoHistoric($personal_id);
        $givenTodo = $todoRepository->getGivenTodoHistoric($personal_id);
        $receivedTodo = $todoRepository->getReceivedTodoHistoric($personal_id);
        require ('templates/todo/historic.php');
        $bool = $todoRepository->deleteTodo($todo_id);

        if ($bool == 1) {
            echo '<script type="text/javascript">
                        deletingSuccessAlert2()
                    </script>';
        } else {
            echo '<script type="text/javascript">
                    deletingErrorAlert()
                </script>';
        }

    }
}
