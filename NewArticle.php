<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
 
?>

<?php echo display('__header'); ?>

 <p>You are logged in as <?= $_SESSION['username'] ?></p><br>

 
<?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
	<?= display('newarticle');?>
<?php else: ?>
        <?php $article = $_POST?>
        <?php $article['author'] = $_SESSION['user']['id']?>
        <?php $id =  \Blog\App\add_article($pdo, $article);?>
        <?php  echo display('article', \Blog\App\get_article($pdo, $id));?>

<?php endif;  ?>
 
 

 