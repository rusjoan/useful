<?php
/**
 * Author: Evgeny Murashkin
 * Date: 16.11.2017
 * Time: 22:20
 */

$exitFlag = false;
$sec = 10;

function e(string $text) {
    print(date("H:i:s") . ": " . $text . "\n");
}

pcntl_signal(SIGTERM, function () {
    global $exitFlag;
    e("SIGTERM, setting exitFlag to TRUE");
    $exitFlag = true;
});

while (true) {
    e("checking signals...");
    pcntl_signal_dispatch();
    if ($exitFlag) {
        e("SIGTERM found, exiting...");
        break;
    } else {
        e("start sleep till " . date("H:i:s", time() + $sec - 1));
        time_sleep_until(time() + $sec);
        e("slept for $sec seconds, now checking exitFlag");
    }
}
