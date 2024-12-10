<?php
namespace App\Enums;

enum BudgetPeriod: string
{
    case Monthly = 'Monthly';
    case Quarterly = 'Quarterly';
    case Yearly = 'Yearly';
}
