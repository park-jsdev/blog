<?php 
    require_once('../util/config.php');
    require_once('../util/main.php');
    require_once('../util/secure_conn.php');
    require_once('../util/valid_admin.php');
    include '../view/header.php';
?>

<?php if (isset($_SESSION['admin'])) : echo "Logged in as " . $_SESSION['admin']['emailAddress'] . "."; endif; ?>
<?php if (isset($_GET['action']) && ($_GET['action'] === 'logout')) : 
    debug_to_console($_GET['action']);
    unset($_SESSION['admin']); 
    redirect(APP_ROOT .'admin');
    endif; ?>
<main>
    <h1>Admin Menu</h1>
    <p><a href="posts">Post Manager</a></p>
    <p><a href="category">Category Manager</a></p>

    <!-- TODO: account_edit, account_login, admin_db -->
    <!-- <p><a href="account">Account Manager</a></p> -->

</main>

<?php include '../view/footer.php'; ?>
