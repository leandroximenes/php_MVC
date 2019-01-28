<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->controller->headTitle ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <!--css-->
        <link rel="stylesheet" type="text/css" href="<?= PUBLIC_SRC ?>css/default.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

        <!--javascript-->
        <script src="<?= PUBLIC_SRC ?>js/jquery-1.11.3.mim.js"></script>
        <script src="<?= PUBLIC_SRC ?>js/bootstrap.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("a").each(function (index) {
                    var _a = $(this);
                    if (document.URL == _a.prop('href')) {
                        _a.closest('.menu0').addClass('active');
                    }
                });
            });
        </script>

    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse menu">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="#"><?= NAMESYSTEM ?></a>
                    </div>
                    <ul class="nav navbar-nav">
                        <li class="menu0" id="home" >
                            <a href="<?= ADMIN_SRC ?>">Início</a>
                        </li>
                        <li class="menu0" id="home" >
                            <a href="<?= ADMIN_SRC ?>usuario">Usuários</a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon">&#xe008;</span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= ADMIN_SRC ?>usuario/alterarSenha/<?= $_SESSION[APP_NAME]['usuario']['hash_id'] ?>">Alterar Senha</a> </li>
                            </ul>
                        </li>
                        <li><a href="<?= ADMIN_SRC ?>auth/logout">Sair <span class="glyphicon glyphicon-log-in"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="margin-top: 50px">
            <?php
            include ABS_VIEW . $this->controller->folder . '/' . $this->controller->page . '.php';
            if (logado) {
                echo '';
            }
            ?>

            <hr>
            <footer>
                <p>&copy; 2013 - <?php echo date('Y') ?> <b></b>  <?php echo 'All rights reserved.' ?></p>
            </footer>
        </div> 
    </body>
</html>