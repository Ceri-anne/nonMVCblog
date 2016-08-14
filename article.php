<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
    
$article = \Blog\App\get_article($pdo, $_GET['id'] ?? 1);
$comments = \Blog\Db\read_comments($pdo,$article['article']['id']);

?>

<?= display('__header'); ?>

 
 <?= display('article', $article); ?>

 <?= display('comments',['comments'=> $comments,'heading'=>"Comments: "]); ?>

<?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
 
    <?= display('newcomment'); ?>
 
<?php else: ?>
     
 <?php 
     $comment = $_POST;
     $comment['article_id'] = $article['article']['id'];
     $comment['user_id'] = $_SESSION['user']['id'];
     $new_comment_id = \Blog\App\add_comment($pdo, $comment);
     $new_comment=\Blog\App\get_comment_id($pdo,$new_comment_id);
    echo display('comment',['comment' =>$new_comment['comment'],'heading'=>"New comment"]);
    
?>
 <?php endif; ?>

<?= display('__footer'); ?>

