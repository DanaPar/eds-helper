<?php
namespace Currency;

class DividendService
{
    private DividendValidator $validator;
    private DividendRepository $repository;


    public function __construct(){
        $this->validator = new DividendValidator();
        $this->repository = new DividendRepository();
    }

    public function addDividend(Dividend $dividend): void
    {
        $entry = new Dividend($dividend->getTicker(), $dividend->getDate(), $dividend->getDividend(), $dividend->getTax(), $dividend->getReceived(), $dividend->getCurrency());
        $this->validator->validate($entry);
        $this->repository->saveDividend($entry);
    }

    /** @return Dividend[] */
    public function returnDividend(string $date1, string $date2): array {

        $this->validator->validateDateRange($date1, $date2);
        $data = $this->repository->getDividends($date1, $date2);

        foreach($data as $dividend){
            $rate = new Rate(date("Ymd", strtotime($dividend->getDate())), $dividend->getCurrency());
            $dividend->setRate($rate->getRate());
        }
        return $data;
    }


}