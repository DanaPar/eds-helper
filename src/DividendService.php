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

    public function addDividend(Dividend $dividend){
        $entry = new Dividend($dividend->getTicker(), $dividend->getDate(), $dividend->getDividend(), $dividend->getTax(), $dividend->getReceived(), $dividend->getCurrency());
        $this->validator->validate($entry);
        $this->repository->saveDividend($entry);
    }

}