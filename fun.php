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

function bbCode($text)
{
    $pat = ['/\[b\](.*)\[\/b\]/i', '/\[i\](.*)\[\/i\]/i', '/\[u\](.*)\[\/u\]/i'];
    $rep = ['<b>$1</b>', '<i>$1</i>', '<u>$1</u>'];
    $text = preg_replace($pat, $rep, $text);
    return $text;
}
