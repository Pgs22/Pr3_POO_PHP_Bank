<?php namespace ComBank\OverdraftStrategy\Contracts;

/**
 * Created by VS Code.
 * User: JPortugal
 * Date: 7/27/24
 * Time: 7:44 PM
 */

interface OverdraftInterface
{
   //Sobregiro
   public function getOverdraftFundsAmount(): float;

   //Conceder sobregiro
   public function isGrantOverdraftFunds(float $newAmount): bool;

}
