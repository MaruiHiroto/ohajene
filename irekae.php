<?php
    $mae_bangou = $_POST['taisyou'];
    $lines = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);
    $idols = file(__DIR__ . '/idol.txt', FILE_IGNORE_NEW_LINES);
    $hyoujou_list = file(__DIR__ . '/hyoujou.txt', FILE_IGNORE_NEW_LINES);
    $idols_count = count($idols);
    $ato_bangou = $idols_count;
    if ($mae_bangou != $ato_bangou && isset($mae_bangou) && isset($ato_bangou) && $mae_bangou <= $idols_count && $ato_bangou <= $idols_count){

        array_splice($lines, $mae_bangou-1, 0, $lines[$ato_bangou-1]);
        array_splice($idols, $mae_bangou-1, 0, $idols[$ato_bangou-1]);
        array_splice($hyoujou_list, $mae_bangou-1, 0, $hyoujou_list[$ato_bangou-1]);
        array_splice($lines, $idols_count);
        array_splice($idols, $idols_count);
        array_splice($hyoujou_list, $idols_count);

        file_put_contents(__DIR__ . '/articles.txt', "", LOCK_EX);
        file_put_contents(__DIR__ . '/idol.txt', "", LOCK_EX);
        file_put_contents(__DIR__ . '/hyoujou.txt', "", LOCK_EX);

        for ($i = 0; $i < $idols_count; $i++){
            $line_k = $lines[$i] . PHP_EOL;
            $idol_k = $idols[$i] . PHP_EOL;
            $hyoujou_k = $hyoujou_list[$i] . PHP_EOL;
            file_put_contents(__DIR__ . '/articles.txt', $line_k, FILE_APPEND | LOCK_EX);
            file_put_contents(__DIR__ . '/idol.txt', $idol_k, FILE_APPEND | LOCK_EX);
            file_put_contents(__DIR__ . '/hyoujou.txt', $hyoujou_k, FILE_APPEND | LOCK_EX);
        }
    }
    if (count($idols) != 0){
        require_once 'image_syori.php';
    }else{
        require_once 'chihaya.php';
    }
?>