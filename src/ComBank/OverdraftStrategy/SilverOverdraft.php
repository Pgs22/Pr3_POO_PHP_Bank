<?php namespace ComBank\OverdraftStrategy;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:39 PM
 */

use ComBank\OverdraftStrategy\Contracts\OverdraftInterface;

//Sobregiro
class SilverOverdraft implements OverdraftInterface
{
    private float $overdraftLimit;

    public function __construct(float $limit) 
    {
        $this->overdraftLimit = $limit;
    }
    
    public function getOverdraftFundsAmount(): float
    {
        return $this->overdraftLimit;
    }

    public function isGrantOverdraftFunds(float $newAmount): bool
    {
        return $newAmount >= $this->overdraftLimit;
    }

    
}
