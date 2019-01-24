<h2>Cadastrar Usuário</h2>
<?php loadMessagem($this->mensagem) ?>
<form method="POST" enctype="multipart/form-data" class="form-inline">
    <div class="form-group">
        <table>
            <tr>
                <td width="70px">Nome</td>
                <td width="300px">
                    <input class="form-control input-input-lg" type="text" name="nome" required="required" id="nome">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input class="form-control input-input-lg" type="email" name="email" required="required" id="email">
                </td>
            </tr>
            <tr>
                <td>Senha</td>
                <td>
                    <input class="form-control input-input-lg" type="password" name="senha" required="required" id="senha">
                </td>
            </tr>
            <tr>
                <td>Ativo:</td>
                <td><label><input type="checkbox" name="ativo" id="ativo" checked="checked"></label>
            </tr>
            <tr>
                <td colspan="2" alig="center"><center><input type="submit" value="Salvar" class="btn btn-default"></center></td>
            </tr>
        </table>
    </div>
</form>