<?php include 'common.php' ;


use function Blog\View\display;
use function Blog\App\get_most_recent_articles;

$top3=get_most_recent_articles($pdo);

$username= $_SESSION['username'] ?? $_GET['username'] ?? 'Guest';

$user = $_SESSION['user'] ?? 'Guest';

?>


<?php echo display('__header'); ?>

<p>Welcome <?= $username ?></p><br>

    <?php
        echo display('articles', ['article' => $top3['articles']]); ?>


<?php echo display('__footer'); ?>