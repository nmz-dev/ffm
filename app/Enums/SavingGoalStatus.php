<?php
namespace App\Enums;
enum SavingGoalStatus: string
{
    case Ongoing = 'ongoing';
    case Completed = 'completed';
    case Cancelled = 'cancelled';
}
