<?php

function    agotime($from_time, $include_seconds = true)
{
    $to_time = time();
    $mindist = round(abs($to_time - $from_time) / 60);
    $secdist = round(abs($to_time - $from_time));
    $timezone = 2;
    $month = array('01' => 'Jan','02' => 'Feb','03' => 'Mar','04' => 'Apr','05' => 'May','06' => 'Jun',
    '07' => 'Jul','08' => 'Aug','09' => 'Sep','10' => 'Oct','11' => 'Nov','12' => 'Dec');
    $day = gmdate('d', $from_time + 3600 * ($timezone));
    $month = $month[gmdate('m', $from_time + 3600 * ($timezone))];
    $year = gmdate('Y', $from_time + 3600 * ($timezone));
    $tm = gmdate('g:ia', $from_time + 3600 * ($timezone));
    $fulltime = "$month $day at $tm";
    $fulltimey = "$month $day, $year at $tm";
    if ($mindist >= 0 and $mindist <= 1)
    {
        if (!$include_seconds)
            return ($mindist == 0) ? 'Just now' : '1 minute ago';
        else
        {
            if ($secdist >= 0 and $secdist <= 4)
                return 'Just now';
            elseif ($secdist >= 5 and $secdist <= 9)
                return 'Just now';
            elseif ($secdist >= 10 and $secdist <= 19)
                return 'less than 20 seconds ago';
            elseif ($secdist >= 20 and $secdist <= 39)
                return 'half a minute ago';
            elseif ($secdist >= 40 and $secdist <= 59)
                return 'less than a minute ago';
            else
                return '1 minute ago';
        }
    }
    elseif ($mindist >= 2 and $mindist <= 44)
        return $mindist . ' minutes ago';
    elseif ($mindist >= 45 and $mindist <= 89)
        return 'about 1 hour ago';
    elseif ($mindist >= 90 and $mindist <= 1439)
        return 'about ' . round(floatval($mindist) / 60.0) . ' hours ago';
    elseif ($mindist >= 1440 and $mindist <= 2879)
        return 'Yesterday at '.$tm.'';
    elseif ($mindist >= 2880 and $mindist <= 43199)
        return 'about ' . round(floatval($mindist) / 1440) . ' days ago';
    elseif ($mindist >= 43200 and $mindist <= 86399)
        return $fulltime;
    elseif ($mindist >= 86400 and $mindist <= 525599)
        return $fulltime;
    elseif ($mindist >= 525600 and $mindist <= 1051199)
        return $fulltimey;
    else
        return $fulltimey;
}