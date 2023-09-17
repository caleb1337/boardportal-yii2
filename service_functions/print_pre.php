<?php
/**
 * @param array|object $var что нужно распечатать
 * @param bool $die остановить код после вывода
 */
function print_pre($var, $die = false)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';

    if ($die) {
        die;
    }
}