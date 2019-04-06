<?php

function RemoveSubdomain($url)
{
    $Sheme = parse_url($url, PHP_URL_SCHEME);
    $Result = str_replace($Sheme . '://', '', $url);

    //preg_match('/(?:http[s]*\:\/\/)*(.*?)\.(?=[^\/]*\..{2,5})/i', $Result, $match);
    //echo 'match = ' . $match[0] . '<br>';

    if (stristr($url, 'www')) {
        $Arr = explode('.', $url);
        if ($Arr[1] !== 'tnt4') {
            unset($Arr[1]);
        }
        $Result = implode('.', $Arr);
    } else {
        $Arr = explode('.', $Result);
        if ($Arr[0] !== 'tnt4') {
            unset($Arr[0]);
        }
        $Result = $Sheme . '://' . implode('.', $Arr);
    }
    return $url . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $Result;
}

echo RemoveSubdomain('https://tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://ulitsa2.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://www.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://www.ulitsa2.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://ulitsa2.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://casting.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://chistoporjat.tnt4.ru/') . '<br>';
echo RemoveSubdomain('https://dip.tnt4.ru/') . '<br>';