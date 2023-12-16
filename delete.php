<?php
    $myfile = file('articles.txt');
    $idol_file = file('idol.txt');
    $hyoujou_list = file('hyoujou.txt');
    $int_number = (int)$_POST['int'];
    $number = $int_number - 1;
    unset($myfile[$number]);
    unset($idol_file[$number]);
    unset($hyoujou_list[$number]);
    file_put_contents('articles.txt', $myfile);
    file_put_contents('idol.txt', $idol_file);
    file_put_contents('hyoujou.txt', $hyoujou_list);
    $lines = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);
    $idols = file(__DIR__ . '/idol.txt', FILE_IGNORE_NEW_LINES);
    $hyoujou_list = file(__DIR__ . '/hyoujou.txt', FILE_IGNORE_NEW_LINES);
    
    $idol_count = count($idols);
    if (count($idols) != 0){
        require_once 'image_syori.php';
    }else{
        require_once 'chihaya.php';
    }

?>