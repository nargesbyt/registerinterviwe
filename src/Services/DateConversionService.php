<?php
namespace App\Services;

use Carbon\Carbon;
use Morilog\Jalali\Jalalian;

class DateConversionService
{
    public function convertInterviewDates(array &$interviews): void
    {
        foreach ($interviews as &$interview) {
            if (isset($interview['interviewDate'])) {
                // Convert Gregorian date to Persian
                $gregorianDate = new \DateTime($interview['interviewDate']);
                $carbonDate = Carbon::instance($gregorianDate); // Convert DateTime to Carbon instance
                $persianDate = Jalalian::fromCarbon($carbonDate); // Convert to Jalali (Persian) date

                // Update the interview array
                $interview['interviewDate'] = $persianDate->format('Y/m/d');
                $interview['interviewTime'] = $carbonDate->format('H:i:s');
            }
        }
    }
}