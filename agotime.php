<?php

//$times=date("l F jS, Y - g:ia", $time);
function agotime($from_time, $include_seconds = true) {
    $to_time = time();
    $mindist = round(abs($to_time - $from_time) / 60);
    $secdist = round(abs($to_time - $from_time));
    if ($mindist >= 0 and $mindist <= 1) {
        if (!$include_seconds) {
            return ($mindist == 0) ? 'less than a minute' : '1 minute';
        } else {
            if ($secdist >= 0 and $secdist <= 4) {
                return 'less than 5 seconds';
            } elseif ($secdist >= 5 and $secdist <= 9) {
                return 'less than 10 seconds';
            } elseif ($secdist >= 10 and $secdist <= 19) {
                return 'less than 20 seconds';
            } elseif ($secdist >= 20 and $secdist <= 39) {
                return 'half a minute';
            } elseif ($secdist >= 40 and $secdist <= 59) {
                return 'less than a minute';
            } else {
                return '1 minute';
            }
        }
    } elseif ($mindist >= 2 and $mindist <= 44) {
        return $mindist . ' minutes';
    } elseif ($mindist >= 45 and $mindist <= 89) {
        return 'about 1 hour';
    } elseif ($mindist >= 90 and $mindist <= 1439) {
        return 'about ' . round(floatval($mindist) / 60.0) . ' hours';
    } elseif ($mindist >= 1440 and $mindist <= 2879) {
        return '1 day';
    } elseif ($mindist >= 2880 and $mindist <= 43199) {
        return 'about ' . round(floatval($mindist) / 1440) . ' days';
    } elseif ($mindist >= 43200 and $mindist <= 86399) {
        return 'about 1 month';
    } elseif ($mindist >= 86400 and $mindist <= 525599) {
        return round(floatval($mindist) / 43200) . ' months';
    } elseif ($mindist >= 525600 and $mindist <= 1051199) {
        return 'about 1 year';
    } else {
        return 'over ' . round(floatval($mindist) / 525600) . ' years';
    }
}


?>