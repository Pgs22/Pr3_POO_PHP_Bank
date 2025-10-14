<?php

class BankAccount
{

    private float $balance = 0;
    private bool $status;

    public function __construct(float $initialBalance = 200.0) {
        $this->balance = $initialBalance;
        $this->isOpen = true;
        echo "My balance: ". $this->balance."\n";
    }

    public function getBalance(): float{
        return $this-> balance;
    }        
            
    
    public function reopenAccount(): void{
         if (!$this->isOpen) {
            $this->isOpen = true;
            echo " Reopen " . ($this->isOpen ? 'Open' : 'Closed') . "\n";
        } else {
            echo " Error\n";
        }

    }
    
    public function closeAccount():void{
        if ($this->isOpen) {
        $this->isOpen = false;
        echo " Close " . ($this->isOpen ? 'Open' : 'Closed') . "\n";
        } else {
            echo "Error.\n";
        }
    }
    
    public function getAccount():float{
        $balance = 0;
    }
        
}