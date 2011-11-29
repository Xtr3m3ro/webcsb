<!DOCTYPE html>
<html>
    <head>
        <title>My page - stupid login system</title>
        <style type='text/css'>
            .message {
                border: 1px solid #999;
                padding:5px;
                margin: 5px;
                background-color:#eee;
            }
        </style>
    </head>
    <body>
        <header>
            <?php if (getUser() !== false): ?>
                <h1>Bun venit, <strong><?php echo getUser(); ?></strong></h1>
            <?php else: ?>
                <h1>Bun venit, vizitatorule.</h1>
            <?php endif; ?>
        </header>
        <?php if (isset($_GET['msg'])) echo parseMessage($_GET['msg']); ?>
        <nav>
            <ul>
                <li><a href="index.php?page=login">pagina de login</a></li>
                <li><a href="index.php?page=logout">pagina de logout</a></li>
                <li><a href="index.php?page=restricted">pagina restrictionata</a></li>
                <li><a href="index.php">pagina publica</a></li>
            </ul>
        </nav>
        
