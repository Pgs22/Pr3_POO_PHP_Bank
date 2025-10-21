<?php namespace ComBank\OverdraftStrategy;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/28/24
 * Time: 1:39 PM
 */

/**
 * @description: Grant 100.00 overdraft funds.
 * */
class SilverOverdraft 
{
    private const OVERDRAFT_LIMIT = -100.00;

    public function getOverdraftFundsAmount(): float
    {
        // Devuelve el valor absoluto del límite.
        return abs(self::OVERDRAFT_LIMIT); // Devuelve 100.00
    }

    public function isGrantOverdraftFunds(float $newBalance): bool
    {
        // Se concede el descubierto si el nuevo saldo es >= -100.00
        return $newBalance >= self::OVERDRAFT_LIMIT;
    }

    
}
