<?php

/**
 * Форматированный вывод на экран
 */
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}