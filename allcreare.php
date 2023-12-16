<?php
    file_put_contents(__DIR__ . '/articles.txt', '', LOCK_EX);
    file_put_contents(__DIR__ . '/idol.txt', '', LOCK_EX);
    file_put_contents(__DIR__ . '/hyoujou.txt', '', LOCK_EX);
    require_once 'chihaya.php';
?>