<?php

require 'agotime.php';

//timestamp is generated using time();

$time='1479314178';
$time = agotime($time);

echo "Posted $time ago";

//You can build something cool with this

?>