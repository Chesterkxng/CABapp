<?php
namespace Application\Model\Archive;

require_once ('src/lib/database.php');
use Application\Lib\Database\DatabaseConnection;

class Archive
{
    public int $archive_id;
    public string $object;
    public string $details;
    public string $edition_date;
    public string $url;
}

class ArchiveRepository
{
    public DatabaseConnection $connection;

    public function addDoc(string $object, string $details, string $edition_date, string $url): bool
    {
        $statement = $this->connection->getConnection()->prepare(
            "INSERT INTO `archive`(`OBJECT`, `DETAILS`, `EDITION_DATE`, `URL`) 
            VALUES (?,?,?,?)"
        );
        $statement->execute([$object, $details, $edition_date, $url]);
        $affectedLines = $statement->rowCount();
        return $affectedLines == 1;

    }

    public function getDocs(): array
    {
        $statement = $this->connection->getConnection()->query(
            "SELECT * FROM `archive` ORDER BY `EDITION_DATE` DESC"
        );
        $docs = [];
        while ($row = $statement->fetch()) {
            $doc = new Archive();
            $doc->archive_id = $row['ARCHIVE_ID'];
            $doc->object = $row['OBJECT'];
            $doc->details = $row['DETAILS'];
            $doc->edition_date = $row['EDITION_DATE'];
            $doc->url = $row['URL'];

            $docs[] = $doc;
        }
        return $docs;

    }

}