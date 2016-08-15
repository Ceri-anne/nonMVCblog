<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;
use function \Blog\App\get_article;
use function \Blog\Upload\upload_file;

require_login();
 
?>

<?= display('__header'); ?>


 
<?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
	<?= display('newarticle');?>
<?php else: ?>
        <?php $article = $_POST?>
        <?php $article['author'] = $_SESSION['user']['id']?>

        <?php upload_file('image_end'); ?>

        <?php $id =  \Blog\App\add_article($pdo, $article);?>
        <?php  echo display('article', get_article($pdo, $id));?>

<?php endif;  ?>
 
 
<?= display('__footer'); ?>
 