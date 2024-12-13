<?php
namespace App\Enums;

enum BillingReminderStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
}
