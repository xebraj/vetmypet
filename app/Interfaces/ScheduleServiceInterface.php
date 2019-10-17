<?php namespace App\Interfaces;

use Carbon\Carbon;

interface ScheduleServiceInterface
{
    public function IsAvailableInterval($date, $doctorId, Carbon $start);
    public function getAvailableIntervals($date, $doctorId);
}



