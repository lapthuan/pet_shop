<?php

function readNumber($number)
{
    $ones = array(
        0 => 'Không',
        1 => 'Một',
        2 => 'Hai',
        3 => 'Ba',
        4 => 'Bốn',
        5 => 'Năm',
        6 => 'Sáu',
        7 => 'Bảy',
        8 => 'Tám',
        9 => 'Chín',
    );

    $teens = array(
        11 => 'Mười Một',
        12 => 'Mười Hai',
        13 => 'Mười Ba',
        14 => 'Mười Bốn',
        15 => 'Mười Lăm',
        16 => 'Mười Sáu',
        17 => 'Mười Bảy',
        18 => 'Mười Tám',
        19 => 'Mười Chín',
    );

    $tens = array(
        10 => 'Mười',
        20 => 'Hai Mươi',
        30 => 'Ba Mươi',
        40 => 'Bốn Mươi',
        50 => 'Năm Mươi',
        60 => 'Sáu Mươi',
        70 => 'Bảy Mươi',
        80 => 'Tám Mươi',
        90 => 'Chín Mươi',
    );

    $chunks = array(
        0 => '',
        1 => 'Nghìn',
        2 => 'Triệu',
        3 => 'Tỷ',
    );

    $number = number_format($number, 0, '', '');

    if ($number == 0) {
        return $ones[0];
    }

    $result = '';

    $chunkCount = count($chunks);

    for ($i = 0; $i < $chunkCount; $i++) {
        $chunk = (int)substr($number, -3);
        $number = substr($number, 0, -3);

        if ($chunk) {
            $chunkValue = '';

            if ($chunk >= 100) {
                $chunkValue .= $ones[substr($chunk, 0, 1)] . ' Trăm ';
                $chunk = $chunk % 100;
            }

            if ($chunk >= 20) {
                $chunkValue .= $tens[substr($chunk, 0, 1) * 10] . ' ';
                $chunk = $chunk % 10;
            }

            if ($chunk >= 10) {
                $chunkValue .= $teens[$chunk] . ' ';
            } elseif ($chunk > 0) {
                $chunkValue .= $ones[$chunk] . ' ';
            }

            $result = $chunkValue . $chunks[$i] . ' ' . $result;
        }
    }

    return trim($result ."Đồng");
}


?>
