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



<?php echo display('__footer'); ?>

