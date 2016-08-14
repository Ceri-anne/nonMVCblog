<?php
include 'common.php';


use function Blog\View\display;

use function Blog\Auth\require_login;
use function Blog\App\get_all_articles;

require_login();

$articles=get_all_articles($pdo);


?>

<?= display('__header'); ?>

<?= display('articles', ['article' => $articles['articles'],'heading'=>"All Articles"]); ?>

<?= display('__footer'); ?>
