<?php

$word_state = [
    "ADDED" => "ADDED",
    "COMPLETE" => "COMPLETE",
];

function isValidState($state) {
    global $word_state;

    foreach ($word_state as $key => $value) {
        if ($value == $state) {
            return true;
        }
    }
    return false;
}