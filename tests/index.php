<?php

function parse(?string $file = null) {
    new \ParsingLogFile($file);
}

$logFile = 'data/access.log';
parse($logFile);