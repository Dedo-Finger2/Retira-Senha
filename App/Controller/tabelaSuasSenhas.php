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
    <table class="table">
        <!-- "Tabela com as senhas do usuário, se o mesmo não tiver senha nenhuma uma mensagem deve aparecer informando isso no lugar da tabela" - Greg -->
        <thead> <!-- "Cabeçalho da tabela" - Greg -->
            <tr>
                <th>Senha</th>
                <th>Validade</th>
                <th>Curso</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody> <!-- "Corpo da tabela, os dados entram aqui separados por <tr> e cada linha sendo um <td>" - Greg -->
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
        <tfoot> <!-- "Rodapé da tabela, mesma coisa do cabeçalho só que embaixo kk" - Greg -->
            <tr>
                <th>Senha</th>
                <th>Validade</th>
                <th>Curso</th>
                <th>Opções</th>
            </tr>
        </tfoot>
    </table>
<?php } ?>