<?php
function sumTime(string $firstTime, string $secondTime): string
{
    $regExp = '/[0-9][0-9]:[0-9][0-9]:[0-9][0-9]/';

    if (preg_match($regExp, $firstTime) && preg_match($regExp, $secondTime)) {
        return (date('H:i:s', strtotime($firstTime) + strtotime($secondTime) - strtotime('00:00:00')));
    } else {
        exit('Incorrect input');
    }
}

echo sumTime('20:05:05', '20:00:00');