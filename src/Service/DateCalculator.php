<?php

namespace App\Service;


class DateCalculator
{
    public function yearsDefference($year)
    {
        $curYear = date(format: 'Y');
        $diff = $curYear - $year;
        return $diff;
    }
}