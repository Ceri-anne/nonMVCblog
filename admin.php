<?php
include 'common.php';


use function Blog\View\display;

use function Blog\Auth\require_login;
use function Blog\App\get_all_articles;
use function Blog\App\get_all_users;

require_login();

$articles=get_all_articles($pdo);
$users=get_all_users($pdo);

?>

<?= display('__header'); ?>

<?= display('articles', ['article' => $articles['articles'],'heading'=>"All Articles"]); ?>

<?= display('users', ['users' => $users['users'],'heading' => "All Users"]); ?>

<h1>Add new user</h1>
<?php if($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
         
    <?php if ($_POST['password'] != $_POST['verifypassword']): ?>
        
        <?=  "Passwords do not match"; ?>

    <?php  else: ?>

        <?php 
	 $user_id=\Blog\Db\create_user($pdo, $_POST, array_search('admin',ROLES));
         $new_user=\Blog\Db\read_user_id($pdo,$user_id);
          echo \Blog\View\display('user',['users'=>$new_user,'heading'=>'New user']); 
          ?>

    <?php endif; ?>

<?php else: ?> 

      <?= display('registerform');  ?>

<?php endif; ?>
 
<? display('__footer'); ?>

