<?php
    $output_path = "\\xampp\\htdocs\\ohajene\\face_765\\face_chihaya\\chihaya_kusa.png";
    $image_path = "\\xampp\\htdocs\\ohajene\\face_765\\face_chihaya\\chihaya_warai.png";
    $thumbnail = new Imagick(); // Imagickオブジェクトを生成
    $thumbnail->readImage($image_path); // 入力画像パスを指定
    $thumbnail->cropThumbnailImage(50, 50); // 縦横のピクセル指定
    $thumbnail->setImageFormat('png'); // 出力フォーマットを指定
    $thumbnail->writeImage($output_path); // 画像の出力パスを指定
?>