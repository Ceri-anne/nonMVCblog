<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;
use function Blog\App\get_articles_userid;

require_login();
    

$user = $_SESSION['user'] ?? 'Guest';
?>

<?= display('__header'); ?>

<?= display('user', ['users' => $user,'heading'=>"Your profile page"]); ?>


<?php $articles = get_articles_userid($pdo, $_SESSION['user']['id'])?>


<?= display('articles', ['article' => $articles['articles'], 'heading' => "Your articles"]); ?>

<?= display('__footer'); ?>

