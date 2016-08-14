<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;
use function Blog\App\get_articles_userid;

require_login();
    

$user = $_SESSION['user'] ?? 'Guest';
?>

<?php echo display('__header'); ?>

<?php echo display('user', ['users' => $user]); ?>
 
<h2>Your articles</h2>
<?php $articles = get_articles_userid($pdo, $_SESSION['user']['id'])?>
<?php echo display('articles', ['article' => $articles['articles']]); ?>
<?php echo display('__footer'); ?>

