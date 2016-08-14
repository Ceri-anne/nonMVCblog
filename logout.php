<?php
include 'common.php';

use function Blog\View\display;
use function Blog\Auth\logout;

logout()
?>

<?= display('__header'); ?> 
    
    <h1>Logout</h1>
    <p>You have successfully logged out</p>
    
    
<?= display('__footer'); ?>