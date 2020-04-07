<?php


function smile($emodzi)
{
    return preg_replace(
        [
            '/\:-{0,1}\)/',
            '/\:-{0,1}\(/'
        ],
        [
            '😀',
            '😆'
        ],
        $emodzi
    );
}

function cens($f)
{
    // if (preg_match("/(дурак|редиска)/i", $f)) {
    //     return true;
    // } else {
    //     return false;
    // }
    return preg_match("/(дурак|редиска)/iu", $f) ? false : true;
}
