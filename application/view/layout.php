<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->controller->headTitle ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <link rel="stylesheet" type="text/css" href="<?= PUBLIC_SRC ?>css/bootstrap.min.css">
        <script src="<?= PUBLIC_SRC ?>js/jquery-1.11.3.mim.js"></script>
    </head>
    <body>
        <div class="container">
            <?php
            include ABS_VIEW . $this->controller->folder . '/' . $this->controller->page . '.php';
            ?>
            <hr>
            <footer>
                <p>&copy; 2013 - <?php echo date('Y') ?> <b></b>  <?php echo 'All rights reserved.' ?></p>
            </footer>
        </div> 
    </body>
</html>