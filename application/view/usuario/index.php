<h2>Listar usuários</h2>
<h3><a href="<?= ADMIN_SRC ?>usuario/novo">Adicionar</a></h3><br/>
<?php loadMessagem($this->mensagem) ?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td width="15%">Ação</td>
            <td>Nome</td>
            <td>Email</td>
            <td>Perfil</td>
            <td>Status</td>

        </tr>
    </thead>
    <tbody>

        <?php foreach ($this->data['lista'] as $value): ?>
            <tr>
                <td>
                    <a href="<?= ADMIN_SRC ?>usuario/editar/<?= $value['hash_id'] ?>">Editar</a> /
                    <a class="excluir" href="<?= ADMIN_SRC ?>usuario/excluir/<?= $value['hash_id'] ?>">Excluir</a>
                </td>
                <td><?= $value['nome'] ?></td>
                <td><?= $value['email'] ?></td>
                <td><?= $value['perfil'] ?></td>
                <td><?= $value['ativo'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>
    $(document).ready(function () {
        $('.excluir').on('click', function (e) {
            e.preventDefault();
            var _this = $(this);
            if (confirm("Deseja excluir?")) {
                $.ajax({
                    type: "POST",
                    async: true,
                    url: _this.attr('href'),
                    dataType: 'json',
                    success: function () {
                        _this.closest('tr').remove();
                    },
                    error: function (error) {
                        alert(error.responseText);
                    }
                });
            }
        });

    });
</script>