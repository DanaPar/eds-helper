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

    public function saveDividend(Dividend $new_entry): void{
        try {
            $conn = $this->dbh->dbConnection();
            $sql = "INSERT INTO dividend (ticker, date, dividend, tax, received, currency) VALUES (:ticker, :date, :dividend, :tax, :received, :currency)";
            $stmt = $conn->prepare($sql);

            $ticker = $new_entry->getTicker();
            $date = $new_entry->getDate();
            $dividend = $new_entry->getDividend();
            $tax = $new_entry->getTax();
            $received = $new_entry->getReceived();
            $currency = $new_entry->getCurrency();

            $stmt->bindParam(':ticker', $ticker);
            $stmt->bindParam(':date', $date);
            $stmt->bindParam(':dividend', $dividend);
            $stmt->bindParam(':tax', $tax);
            $stmt->bindParam(':received', $received);
            $stmt->bindParam(':currency', $currency);

            $stmt->execute();
            echo "entry added successful";
        }
        catch (PDOException $e) {
            die("ERROR: Could not able to execute " . $e->getMessage());
        }
    }


}