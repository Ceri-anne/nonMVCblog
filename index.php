<?php include 'common.php' ;


use function Blog\View\display;
use function Blog\App\get_most_recent_articles;

$top3=get_most_recent_articles($pdo);

$username= $_SESSION['username'] ?? filter_var($_GET['username'],FILTER_SANITIZE_FULL_SPECIAL_CHARS) ?? 'Guest';

$user = $_SESSION['user'] ?? 'Guest';

?>


<?php echo display('__header'); ?>

    <?php
        echo display('articles', ['article' => $top3['articles'],'heading'=>"Latest Articles"]); ?>


<?php echo display('__footer'); ?>
