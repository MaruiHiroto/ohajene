<?php
    //セレクトタグで選択したアイドル名の取得
    $idol = $_POST['idol_opt'];
    if ($idol == '-----'){
        require_once 'image_syori.php';
    }else{
        //表情番号の追加
        $idol_hyoujou = $_POST['idol_hyoujou'];
        //表情番号に改行コードの追加
        $idol_hyoujou_f = $idol_hyoujou . PHP_EOL;
        //取得したアイドル名に改行コードの追加
        $idol_f = $idol . PHP_EOL;
        //インプットタグで入力したセリフの取得
        $serif = $_POST['serif'];
        //取得したセリフに改行コードの追加
        $line = $serif . PHP_EOL;
        //articlesテキストに$lineの追加
        file_put_contents(__DIR__ . '/articles.txt', $line, FILE_APPEND | LOCK_EX);
        //選択したアイドル情報をidol.txtに追加する
        file_put_contents(__DIR__ . '/idol.txt', $idol_f, FILE_APPEND | LOCK_EX);
        //表情番号をidol_hyoujou.txtに追加する
        file_put_contents(__DIR__ . '/hyoujou.txt', $idol_hyoujou_f, FILE_APPEND | LOCK_EX);
        //articles.txtを一括取得してリストに放り込む
        $lines = file(__DIR__ . '/articles.txt', FILE_IGNORE_NEW_LINES);
        //idol.txtのアイドル要素を$idolsのリストに一括取得
        $idols = file(__DIR__ . '/idol.txt', FILE_IGNORE_NEW_LINES);
        //idol_hyoujou.txtの表情番号をリストに一括取得
        $hyoujou_list = file(__DIR__ . '/hyoujou.txt', FILE_IGNORE_NEW_LINES);
        $idol_count = count($idols);

        if (count($idols) != 0){
            require_once 'image_syori.php';
        }else{
            require_once 'chihaya.php';
        }
    }
    ?>