<?php

namespace App\Enums;
enum TransactionTypes: string{
    case PAYMENT = 'payment';
    case REFUND = 'refund';
    case CREDIT = 'credit';
    case DEBIT = 'debit';
}
