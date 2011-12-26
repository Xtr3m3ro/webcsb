<?php
require_once "func_sesiuni.php";

// this is more like a controller... sees what to do and uses functinos in func.php to do it

if (!isset($_GET['page'])) $_GET['page'] = null;

if ($_GET['page'] == 'login') {
    $error = false;
    if (isset($_POST['username'], $_POST['password'])) {
        if (validLogin($_POST['username'], $_POST['password'])) {
            if (setUser($_POST['username'], $_POST['password'])) {
                header("Location: index.php?page=restricted&msg=login-success");
                die();
            }
        } else {
            $error = true;
        }
    }
    include "header.php";
    ?>
        <h1>Login form</h1>
        <?php if ($error): ?>
            <p style='color:#f00;'>Username or password invalid. Hint: demo - demo</p>
        <?php endif; ?>
        <form method='post' action='index.php?page=login'>
            <label for='username'>Username:</label><br />
            <input type='text' name='username' value='<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>' /> <br />
            <label for='password'>Password:</label><br />
            <input type='password' name='password' /><br />
            <input type='submit' value='Login' />
        </form>
    <?php
} elseif ($_GET['page'] == 'restricted') {
    if (getUser() === false):
        header("Location: index.php?msg=access-denied");
    else:
        include "header.php";
        ?>
            <h1>Restricted page</h1>
            Only registred member can see this precious content. Bu!
        <?php
        include "footer.html";
    endif;
} elseif ($_GET['page'] == 'logout') {
    if (getUser() === false) {
        header("Location: index.php?msg=logout-denied");
    } else {
        delUser();
        header("Location: index.php?msg=logout-success");
    }
} else {
    include "header.php";
    ?>
    <h1>Bun venit pe această pagină.</h1>
    This is a random public page. hat!
    <?php
    include "footer.html";
}
?>
