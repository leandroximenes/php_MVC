<h2>Editar Usuário</h2>
<?php $dados = $this->data['dados'] ?>
<?php loadMessagem($this->mensagem) ?>
<form method="POST" enctype="multipart/form-data" class="form-inline">
    <div class="form-group">
        <table>
            <tr>
                <td width="70px">Nome</td>
                <td width="300px">
                    <input type="hidden" name="id" value="<?= $dados['id'] ?>">
                    <input class="form-control input-input-lg" type="text" name="nome" required="required" id="nome" value="<?= $dados['nome'] ?>">
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input class="form-control input-input-lg" type="email" name="email" required="required" id="email" value="<?= $dados['email'] ?>">
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