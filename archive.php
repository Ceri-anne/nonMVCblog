<?php
include 'common.php';


use function Blog\View\display;
use function Blog\App\get_all_articles;

require_login();

$articles=get_all_articles($pdo);


?>

<?php echo display('__header'); ?>

<?php    echo display('articles', ['article' => $articles['articles']]); ?>

<?php echo display('__footer'); ?>
