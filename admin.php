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

<?php echo display('__header'); ?>

<h1>All Articles</h1>
<?php    echo display('articles', ['article' => $articles['articles']]); ?>

<h1>All Users</h1>
    <?php    echo display('users', ['users' => $users['users']]); ?>

<h1>Add new user</h1>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
       if ($_POST['password'] != $_POST['verifypassword']) {
           echo "Passwords do not match";
       }
       else {
	 $user_id=\Blog\Db\create_user($pdo, $_POST, array_search('admin',ROLES));
         $new_user=\Blog\Db\read_user_id($pdo,$user_id);
          echo \Blog\View\display('user',['users'=>$new_user,'heading'=>'New user']); 
       }
}          
    else {
      echo \Blog\View\display('registerform'); 
    
    }
?>
 
<?php echo display('__footer'); ?>

