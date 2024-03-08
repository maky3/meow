<?php

function countTuesdays($startDateString, $endDateString)

{
    $startDate = DateTime::createFromFormat('d-m-Y', $startDateString);

    $endDate = DateTime::createFromFormat('d-m-Y', $endDateString);

    $interval = DateInterval::createFromDateString('1 day');

    $period = new DatePeriod($startDate, $interval, $endDate);

    $tuesdays = 0;

    foreach ($period as $date) {

        if ($date->format('l') == 'Tuesday') {

            $tuesdays++;
        }
    }

    return $tuesdays;
}

echo countTuesdays('22-02-2022', '24-05-2023');