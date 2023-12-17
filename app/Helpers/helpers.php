<?php
  
function htmlBtn($url,$id,$color='info',$icon='edit'){

        $btn = "<a href='".route($url,$id)."' title='".($icon=='edit' ? 'Edit' : 'View')."'  class='btn btn-".$color." btn-sm'><i class='fa fa-".$icon."'></i></a>";
        return $btn;
    }
function htmDeleteBtn($url,$id){
            $btn= Form::open(['method' => 'DELETE','id'=>'delete-form','route' => [$url, $id],'style'=>'display:inline']);
            $btn.= "<button class='btn btn-danger btn-sm' title='Delete'  type='submit' onclick='rowDetele(event,this)' ><i class='fa fa-trash'></i></button>";
            $btn.= Form::close();
            return  $btn;
    }

    function Number2Words($num) {
    //$num="123,456.78";
    $number = parseNumber($num);
    //d([$num, $number], true);
    $hyphen      = '-';
    $conjunction = ' And ';
    $separator   = '  ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        00                  => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Forty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }
    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . Number2Words(abs($number));

    }

    $string = $fraction = null;
    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . Number2Words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = Number2Words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= Number2Words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction) && $fraction>0) {
        $string .= ' Rupees And ';
        // d($fraction,true);
        $arrZeros= array();
        $index=0;
        for($i=strlen($fraction);$i>=0;$i--){
            for($times=$i-1;$times>=1;$times--){
                $arrZeros[$index]=$arrZeros[$index].'0';
            }
            $index++;
        }
        
        $index=0;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            if($dictionary[$number.$arrZeros[$index]]!="Zero"){
                $words[] = $dictionary[$number.$arrZeros[$index]];
            }
            $index++;
        }
        $string .= implode(' ', $words);

        $string .= ' Paisa';
    }

    // $string .= ' Rupees '.$dictionary[$fraction].' ';
    return $string;
}

function parseNumber($str_number) {
    return floatval(str_replace(",","",$str_number));
}
?>