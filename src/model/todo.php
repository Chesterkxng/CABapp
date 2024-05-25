<?php
namespace Application\Model\Todo;

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Todo
{
    public int $todo_id;
    public int $personal_id;
    public string $title;
    public string $details;
    public string $deadline;
    public int $recipient;
    public bool $status;
}

class TodoRepository
{
    public DatabaseConnection $connection;

    public function getGivenTodo(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo` 
            WHERE  (PERSONAL_ID = ? AND RECIPIENT != ?) AND `STATUS` != 2"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

    public function getReceivedTodo(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo` 
            WHERE (PERSONAL_ID != ? AND RECIPIENT = ? ) AND `STATUS` = 0"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

    public function getOwnTodo(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo`
            WHERE (PERSONAL_ID = ? AND RECIPIENT= ?)  AND `STATUS` = 0"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }


    public function getAlreadyDone(int $personal_id, int $recipient): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo`
            WHERE (PERSONAL_ID = ? OR RECIPIENT = ?) AND `STATUS` = 1"
        );

        $statement->execute([$personal_id, $recipient]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

    public function AddTodo(
        int $personal_id,
        string $title,
        string $details,
        string $deadline,
        int $recipient
    ): bool {

        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `todo`( `PERSONAL_ID`, `TITLE`, `DETAILS`, `DEADLINE`, `RECIPIENT`, `STATUS`) 
                VALUES (?, ?, ?, ?, ?, 0)"
        );

        $statement->execute([$personal_id, $title, $details, $deadline, $recipient]);
        $affectedLine = $statement->rowCount();
        return $affectedLine == 1;

    }


    public function updateTodo(
        string $title,
        string $details,
        string $deadline,
        int $recipient,
        int $personal_id,
        int $todo_id
    ): bool {

        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `todo` 
                SET 
                `TITLE`= ?,
                `DETAILS`= ?,
                `DEADLINE`= ?,
                `RECIPIENT`= ?
                WHERE `PERSONAL_ID`= ? 
                AND `TODO_ID` = ?"
        );

        $statement->execute([$title, $details, $deadline, $recipient, $personal_id, $todo_id]);
        $affectedLine = $statement->rowCount();
        return $affectedLine == 1;

    }
    public function deleteTodo(int $todo_id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "DELETE FROM `todo` WHERE `TODO_ID` = ?"
        );

        $statement->execute([$todo_id]);
        $affectedLine = $statement->rowCount();
        return $affectedLine == 1;

    }

    public function markTodoAsDone(int $todo_id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `todo` 
                SET `STATUS` = 2
                WHERE `TODO_ID` = ?"
        );

        $statement->execute([$todo_id]);
        $affectedLine = $statement->rowCount();
        return $affectedLine == 1;

    }

    public function markTodoAsTraited(int $todo_id)
    {
        $statement = $this->connection->getConnection()->prepare(
            "UPDATE `todo` 
                SET `STATUS` = 1
                WHERE `TODO_ID` = ?"
        );

        $statement->execute([$todo_id]);
        $affectedLine = $statement->rowCount();
        return $affectedLine == 1;

    }

    public function getTodo(int $todo_id): Todo
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo` 
                WHERE  TODO_ID = ?"
        );

        $statement->execute([$todo_id]);
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
        }
        return $todo;
    }

    public function getGivenTodoHistoric(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo` 
            WHERE  (PERSONAL_ID = ? AND RECIPIENT != ?) AND `STATUS` = 2"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

    public function getReceivedTodoHistoric(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo`
            WHERE (PERSONAL_ID != ? AND RECIPIENT = ? ) AND `STATUS` = 2"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

    public function getOwnTodoHistoric(int $personal_id): array
    {
        $statement = $this->connection->getConnection()->prepare(
            "SELECT * FROM `todo`
            WHERE (PERSONAL_ID = ? AND RECIPIENT= ?)  AND `STATUS` = 2"
        );

        $statement->execute([$personal_id, $personal_id]);
        $todos = [];
        while ($row = $statement->fetch()) {
            $todo = new Todo();
            $todo->todo_id = $row['TODO_ID'];
            $todo->personal_id = $row['PERSONAL_ID'];
            $todo->title = $row['TITLE'];
            $todo->details = $row['DETAILS'];
            $todo->deadline = $row['DEADLINE'];
            $todo->recipient = $row['RECIPIENT'];
            $todo->status = $row['STATUS'];
            $todos[] = $todo;
        }
        return $todos;
    }

}