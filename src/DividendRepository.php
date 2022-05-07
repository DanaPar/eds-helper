<?php

namespace Currency;

use PDOException;

class DividendRepository
{
    private DatabaseConnection $dbh;


    public function __construct(){
        $this->dbh = new DatabaseConnection();
    }

    public function getDividends(string $dateFrom, string $dateTo): array{
        try{

            $data = array();
            $conn = $this->dbh->dbConnection();
            $stmt = $conn->query("SELECT * FROM dividend WHERE date > '$dateFrom' AND date < '$dateTo' ");

            foreach ($stmt->fetchAll() as $row) {
                $data[$row["id"]] = new Dividend( $row["ticker"], $row["date"], $row["dividend"], $row["tax"], $row["received"], $row["currency"]);
            }
            return $data;

        }

        catch (PDOException $e) {
            die("ERROR: Could not able to execute " . $e->getMessage());
        }

    }


}