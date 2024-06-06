<?php 
    $string1 = 'contoh string1';
    $string2 = 'contoh string2';

    $string3 = $string1 . $string2;

    echo $string3 . '<br>';
?>



<?php
    function hitungDiskon(){
        $harga = 50000;
        if ($harga >= 100000) {
            $diskon = 0.1 * $harga;
            echo "Diskon 10%:  $diskon";
        } else if ($harga >= 50000) {
            $diskon = 0.05 * $harga;
            echo "Diskon 5%: $diskon";
        } else {
            $diskon = 0;
            echo "Tidak ada diskon";
        }
        return $diskon;
    }

    $diskon = hitungDiskon();
?>