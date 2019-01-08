<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->headTitle ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
            <?php include ABS_VIEW . $this->controlador . '/' . $this->acao . '.php'; ?>
            <hr>
            <footer>
                <p>&copy; 2013 - <?php echo date('Y') ?> <b></b>  <?php echo 'All rights reserved.' ?></p>
            </footer>
        </div> 
    </body>
</html>