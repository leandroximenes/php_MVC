<!DOCTYPE html>
<html>
    <head>
        <title><?= $this->controller->headTitle ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=2.0">
        <!--css-->
        <link rel="stylesheet" type="text/css" href="<?= PUBLIC_SRC ?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?= PUBLIC_SRC ?>css/default.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">  <!--ícones -->

        <!--javascript-->
        <script src="<?= PUBLIC_SRC ?>js/jquery-1.11.3.mim.js"></script>
        <script src="<?= PUBLIC_SRC ?>js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="container">
            <div class="head">
                <div class="container navbar  navbar-static-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#exemplo-navbar-collapse" aria-expanded="false">
                                <span class="sr-only">Navegacao</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse menu" id="exemplo-navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li class="dropdown menu0">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon">&#xe008;</span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= ADMIN_SRC ?>usuario/alterarSenha/<?= $_SESSION[APP_NAME]['usuario']['hash_id'] ?>">Alterar Senha</a> </li>
                                        <li class="divider"></li>
                                        <li><a href="i_logout.php">Sair</a> </li>
                                    </ul>
                                </li>
                                <li class="menu0" id="home" >
                                    <a href="<?= ADMIN_SRC ?>">Início</a>
                                </li>
                                <li class="menu0" id="home" >
                                    <a href="<?= ADMIN_SRC ?>usuario">Usuários</a>
                                </li>
                                <li class="menu0" id="home" >
                                    <a href="<?= ADMIN_SRC ?> auth/logout">Sair</a>
                                </li>
                                <!--                                
                                <li class="dropdown menu0">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuários<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="listarDespesa.php">Listar</a> </li>
                                        <li class="divider"></li>
                                        <li><a href="p_importarArquivo.php">Importação</a> </li>
                                    </ul>
                                    <a class="hidden" href="CadastrarDespesa.php"></a> oculta
                                    <a class="hidden" href="CadastrarFatura.php"></a> oculta
                                    <a class="hidden" href="p_listar_importacao.php"></a> oculta
                                </li>
                                    <li class="dropdown menu0">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listarCartaoCredito.php">Cartões</a> </li>
                                            <li class="divider"></li>
                                            <li><a href="listarTipo.php">Tipo</a> </li>
                                            <li class="divider"></li>
                                            <li><a href="listarFonte.php">Fonte Retirada</a> </li>
                                        </ul>
                                        <a class="hidden" href="CadastrarCartaoCredito.php"></a> oculta
                                        <a class="hidden" href="CadastrarTipo.php"></a> oculta
                                        <a class="hidden" href="CadastrarFonte_retirada.php"></a> oculta
                                    </li>
                                    <li class="dropdown menu0">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cartão de crédito<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="listarCompras.php">Compras</a> </li>
                                            <li class="divider"></li>
                                            <li><a href="p_faturasCartaoCredito.php">Faturas</a> </li>
                                        </ul>
                                        <a class="hidden" href="CadastrarCompras.php"></a> oculta
                                    </li>
                                    <li class="dropdown menu0">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Relatórios<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="p_relatorio_detalhado.php">Detalhado</a> </li>
                                            <li class="divider"></li>
                                            <li><a href="p_relatorio_total_mensal.php">Previsão/Gasto</a> </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown menu0">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Gráficos<b class="caret"></b></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="p_grafico_metas_gastos.php">Metas/Gastos</a> </li>
                                            <li class="divider"></li>
                                            <li><a href="p_grafico.php">Gastos</a> </li>
                                        </ul>
                                    </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
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