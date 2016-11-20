<?php

function daylightSavingTimeFix(DateTime $dateTime): DateTime
{
    $month = $dateTime->format('m');

    if ($month == 3) {
        $dateTime->modify('+1 month');
    }

    return $dateTime;
}
