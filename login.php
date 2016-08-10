<?php
include 'common.php';


use function Blog\View\display;

?>

<?php 

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    if (isset($_POST['firstname'])){
	 \Blog\Db\create_user($pdo, $_POST);
         \Blog\Auth\login($pdo, $_POST['username'], $_POST['pa;ssword']);
            
         }
    else {
      
        \Blog\Auth\login($pdo, $_POST['username'], $_POST['password']);
    
    }
}
?>
 
 
<?php echo display('__header'); ?>
   
<h1>Login</h1>

<?php if(isset($_SESSION['user'])): ?>	
    <?php echo '<p>You are logged in as ' . $_SESSION['user']['username'] . '</p><br>'; ?>
<?php else: ?>
    <?php echo \Blog\View\display('loginform'); ?>
<?php echo \Blog\View\display('registerform'); ?>
<?php endif; ?>

<?php echo display('__footer'); ?>

