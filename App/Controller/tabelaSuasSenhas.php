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
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Senha</th>
                                <th>Validade</th>
                                <th>Curso</th>
                                <th>Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($senhasUsuario as $senha) { ?>
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
                                    <td class="text-center">
                                        <a class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top"
                                            data-bs-custom-class="custom-tooltip"
                                            data-bs-title="Remove a senha da sua lista de senhas cadastradas."
                                            href="../Controller/senhaHandler.php?devolverSenha=<?= $senha->cod_senha ?>">Devolver
                                            senha</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Senha</th>
                                <th>Validade</th>
                                <th>Curso</th>
                                <th>Ação</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Botão 'devolver senha'</h4>
                        <p class="card-text">
                            <a class="btn btn-danger d-flex justify-content-center disabled" href="#">Devolver senha</a>
                            Este botão irá remover a senha da linha em que se encontra, fazendo com que ela seja removida da
                            sua lista de senhas cadastradas. No entanto, você pode coletá-la novamente na tela de 'Vagas
                            disponíveis', caso deseje.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j5o6m5Qs+X5I5lB3iL6zO2d7Dh+9cJ1OY3RjzPjxJj5bHk9l6zQjz7X2zH3c2tL4"
        crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <?php } ?>