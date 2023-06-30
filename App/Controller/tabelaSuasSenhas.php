<?php

require __DIR__ . "/../../vendor/autoload.php";

use App\Controller\ControllerSenha;

$senhasUsuario = (new ControllerSenha())->listUserPasswords($_SESSION['idUsuario']);

?>

<!-- 
    Se for um array o resultado do uso do método listUserPasswords então o usuário tem senha,
    e se o usuário tem senha, então mostre a tabela pra ele, se não tem, então mostre apenas
    um texto explicando o motivo de não ter nada na tela.
-->
<?php
if (is_array($senhasUsuario)) {
?>
<div class="container d-flex justify-content-center mt-5 mb-5 align-items-center">
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Senha</th>
                <th>Validade</th>
                <th>Curso</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach ($senhasUsuario as $senha) { ?>
            <tr>
                <td>
                    <?= $senha->autenticacao ?>
                </td>
                <td>
                    <?= $senha->validade ?>
                </td>
                <td>
                    <?= $senha->nome_curso ?>
                </td>
                <td>
                    <a class="btn btn-danger"
                        href="../Controller/senhaHandler.php?devolverSenha=<?= $senha->cod_senha ?>">Devolver senha</a>
                    <a class="btn btn-primary"
                        href="../Controller/senhaHandler.php?maisInformacoes=<?= $senha->cod_senha ?>">Mais informações</a>
                </td>
            </tr>
            <?php
            }
        ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Senha</th>
                <th>Validade</th>
                <th>Curso</th>
                <th>Opções</th>
            </tr>
        </tfoot>
    </table>
<?php } ?>