<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
    
$article = \Blog\App\get_article($pdo, $_GET['id'] ?? 1);
$comments = \Blog\Db\read_comments($pdo,$article['article']['id']);

?>

<?php echo display('__header'); ?>

 <p>You are logged in as <?= $_SESSION['username'] ?></p><br>
 
 <?php echo display('article', $article); ?>

 
 <h2>Comments:</h2>
  <?php echo display('comments',['comments'=> $comments,'heading'=>""]); ?>

<?php if($_SERVER['REQUEST_METHOD'] == 'GET') {
      echo display('newcomment'); 
 }
 else {
     $new_comment = \Blog\App\add_comment($pdo, $_POST['comment'],$article['article']['id'],$_SESSION['user']['id']);
     echo display('comment',['comment' =>['text'=>$new_comment['comment'],'username'=>$_SESSION['username']],'heading'=>"New comment"]);
         
  }
?>

<?php echo display('__footer'); ?>

