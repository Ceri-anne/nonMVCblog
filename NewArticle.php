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

<?php   echo display('article', \Blog\App\add_article($pdo, $_POST));?>

<?php endif;  ?>
 
 

 