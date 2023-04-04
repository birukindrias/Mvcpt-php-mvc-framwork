<?php
$target = __DIR__.'/../storage/';
$link = 'storage';
symlink($target, $link);
echo readlink($link);
?>
