<?php
include 'common.php';


use function Blog\View\display;
use function Blog\Auth\logout;

logout()
?>

<?php echo display('__header'); ?> 
    
    <h1>Logout</h1>
    <p>You have successfully logged out</p>
    
    
<?php echo display('__footer'); ?>