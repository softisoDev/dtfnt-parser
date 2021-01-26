<?php

/**
 * @param $data
 * @param $propertyName
 * @return null
 */
function get_property($data, $propertyName)
{
    if (!is_object($data))
        return null;

    return (property_exists($data, $propertyName)) ? $data->$propertyName : null;
}

function parseDate($date): array
{
    $result = [];

    $datePattern = '/\d{1,4}([.\-\/])\d{1,2}([.\-\/])\d{1,2}/';
    $timePattern = '/[0-9]?[0-9]([:.][0-9]{2})([:.][0-9]{2})/';

    //extract date
    preg_match($datePattern, $date, $onlyDate);
    $result['date'] = !empty($onlyDate) ? $onlyDate[0] : null;

    //extract time
    preg_match($timePattern, $date, $time);
    $result['time'] = !empty($time) ? $time[0] : null;

    $result['date_time'] = $result['date'] . ' ' . $result['time'];

    return $result;
}