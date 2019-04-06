<?php

function RemoveSubdomain($url)
{
    $Sheme = parse_url($url, PHP_URL_SCHEME);
    $Result = str_replace($Sheme . '://', '', $url);

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
    return $Result;
}