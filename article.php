<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;
use function Blog\Db\read_comments;
use function Blog\App\add_comment;
use function Blog\App\get_article;

require_login();
    
$article = get_article($pdo, $_GET['id'] ?? 1);

?>
<?= display('__header'); ?>

 
 <?= display('article', $article); ?>

<?php if($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
     <?= display('comments',['comments'=> read_comments($pdo,$article['article']['id']) ,'heading'=>"Comments: "]); ?>
     <?= display('newcomment'); ?>
 
<?php else: ?>
     
 <?php 
     $comment = $_POST;
     $comment['article_id'] = $article['article']['id'];
     $comment['user_id'] = $_SESSION['user']['id'];
     add_comment($pdo, $comment);
     echo display('comments',['comments'=> read_comments($pdo,$article['article']['id']) ,'heading'=>"Comments: "]);
    
?>
 <?php endif; ?>

<?= display('__footer'); ?>

