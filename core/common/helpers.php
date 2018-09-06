<?php
/**
 * Created by PhpStorm.
 * User: topalek
 * Date: 19.02.2018
 * Time: 11:26
 */


function dump($data, $num = 10, $highlight = true)
{
    yii\helpers\VarDumper::dump($data, $num, $highlight);
}

function dumpAndDie($data)
{
    dump($data);
    die;
}

function isConsole()
{
    return php_sapi_name() == 'cli';
}

function asMoney($number, $decPoint = ',', $thousandsSep = ' ', $decCount = 2)
{
    if ($decCount == 0) {
        $number = round($number, 0);
    }
    return number_format($number, $decCount, $decPoint, $thousandsSep);
}

function makeFirstUpper($string)
{
    if (strpos($string, ' ') === false) {
        $string = mb_convert_case($string, MB_CASE_TITLE, "UTF-8");
    } else {
        $parts = explode(' ', $string);
        $parts[0] = mb_convert_case($parts[0], MB_CASE_TITLE, "UTF-8");
        $string = implode(' ', $parts);
    }

    return $string;
}

function num2str($num, $lang = 'ru')
{
    $nul = 'ноль';
    $ten = [
        ['', 'один', 'два', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
        ['', 'одна', 'две', 'три', 'четыре', 'пять', 'шесть', 'семь', 'восемь', 'девять'],
    ];
    $a20 = ['десять', 'одиннадцать', 'двенадцать', 'тринадцать', 'четырнадцать', 'пятнадцать', 'шестнадцать', 'семнадцать', 'восемнадцать', 'девятнадцать'];
    $tens = [2 => 'двадцать', 'тридцать', 'сорок', 'пятьдесят', 'шестьдесят', 'семьдесят', 'восемьдесят', 'девяносто'];
    $hundred = ['', 'сто', 'двести', 'триста', 'четыреста', 'пятьсот', 'шестьсот', 'семьсот', 'восемьсот', 'девятьсот'];
    $unit = [
        ['копейка', 'копейки', 'копеек', 1],
        ['рубль', 'рубля', 'рублей', 0],
        ['тысяча', 'тысячи', 'тысяч', 1],
        ['миллион', 'миллиона', 'миллионов', 0],
        ['миллиард', 'милиарда', 'миллиардов', 0],
    ];

    if ($lang =='ua'){
        $nul = 'нуль';
        $ten = [
            ['', 'один', 'два', 'три', 'чотири', 'п’ять', 'шість', 'сім', 'вісім', 'дев’ять'],
            ['', 'одна', 'дві', 'три', 'чотири', 'п’ять', 'шість', 'сім', 'вісім', 'дев’ять'],
        ];
        $a20 = ['десять', 'одинадцять', 'дванадцять', 'тринадцать', 'чотирнадцять', 'п’ятнадцять', 'шістнадцять', 'сімнадцять', 'вісімнадцять', 'дев’ятнадцять'];
        $tens = [2 => 'двадцять', 'тридцять', 'сорок', 'п’ятдесят', 'шістдесят', 'сімдесят', 'вісімдесят', 'дев’яносто'];
        $hundred = ['', 'сто', 'двісті', 'триста', 'чотириста', 'п’ятсот', 'шістсот', 'сімсот', 'вісімсот', 'дев’ятсот'];
        $unit = [
            ['копійка', 'копійки', 'копійок', 1],
            ['гривня', 'гривні', 'гривень', 0],
            ['тисяча', 'тисячі', 'тисяч', 1],
            ['мільйон', 'мільйона', 'мільйонів', 0],
            ['мільярд', 'мільярда', 'мільярдів', 0],
        ];
    }
    //
    list($rub, $kop) = explode('.', sprintf("%015.2f", floatval($num)));
    $out = [];
    if (intval($rub) > 0) {
        foreach (str_split($rub, 3) as $uk => $v) { // by 3 symbols
            if (!intval($v)) continue;
            $uk = sizeof($unit) - $uk - 1; // unit key
            $gender = $unit[$uk][3];
            list($i1, $i2, $i3) = array_map('intval', str_split($v, 1));
            // mega-logic
            $out[] = $hundred[$i1]; # 1xx-9xx
            if ($i2 > 1) $out[] = $tens[$i2] . ' ' . $ten[$gender][$i3]; # 20-99
            else $out[] = $i2 > 0 ? $a20[$i3] : $ten[$gender][$i3]; # 10-19 | 1-9
            // units without rub & kop
            if ($uk > 1) $out[] = morph($v, $unit[$uk][0], $unit[$uk][1], $unit[$uk][2]);
        } //foreach
    } else $out[] = $nul;
    $out[] = morph(intval($rub), $unit[1][0], $unit[1][1], $unit[1][2]); // rub
    $out[] = $kop . ' ' . morph($kop, $unit[0][0], $unit[0][1], $unit[0][2]); // kop
    return mb_strtoupper(trim(preg_replace('/ {2,}/', ' ', join(' ', $out))));
}

/**
 * Склоняем словоформу
 * @ author runcore
 */
function morph($n, $f1, $f2, $f5)
{
    $n = abs(intval($n)) % 100;
    if ($n > 10 && $n < 20) return $f5;
    $n = $n % 10;
    if ($n > 1 && $n < 5) return $f2;
    if ($n == 1) return $f1;
    return $f5;
}


function clear($array){
    if (!is_array($array)){
        return false;
    }
    foreach ($array as $i=>$item) {
        if ($item =="#NULL!"){
            $array[$i] = '';
        }
    }
    return $array;
}