<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\require_login;

require_login();
    

$user = $_SESSION['user'] ?? 'Guest';
?>

<?php echo display('__header'); ?>

<h1>Your profile</h1>
<?php echo display('user', ['users' => $user]); ?>
 

<?php echo display('__footer'); ?>

