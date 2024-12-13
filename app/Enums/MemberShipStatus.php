<?php
namespace App\Enums;

enum MemberShipStatus: string
{
    case Free = 'free';
    case Paid = 'paid';
}