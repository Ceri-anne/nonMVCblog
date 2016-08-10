<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
    


$view_vars = \Blog\App\get_article($pdo, $_GET['id'] ?? 1);
//
//$article = ?;
//comments = ?;
?>

<?php echo display('__header'); ?>

 <p>You are logged in as <?= $_SESSION['username'] ?></p><br>
 <h1>Article Title</h1>
<?php echo display('article', ['article' => $articles]); ?>
 

 
 <h2>Comments</h2>
  <?php echo display('comments' /*, ['article' => $articles]*/); ?>

<h2>Leave a comment:</h2>

<?php echo display('newcomment'); ?>


<?php echo display('__footer'); ?>

