<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;
use App\Controller\ControllerSenha;

/**
 * $senhas representa as senhas filtradas, cada parâmetro representa um select na tela de filtragem de senhas
 * Atualmente em fase de testes, por isso tem o print_r ali
 * Se o usuário não marcar nenhum dia específico então não usar o array com os dias pq ele não vai existir se o usário não marcar nada,
 * se o usuário marcar, então o array existe, logo usar ele no método.
 * Se não, passar um null no lugar dele.
 */
if (isset($_POST['dias'])) {
    $senhas = (new ControllerSenha())->listPasswords($_POST);
}

$senhas = (new ControllerSenha())->listPasswords($_POST);

//print_r($senhas);

?>

<div class="container d-flex justify-content-center mt-5 align-items-center">
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome do curso</th>
                <th>Senhas</th>
                <th>Faixa etária</th>
                <th>Turno</th>
                <th>Dias de aula</th>
                <th>Opções</th>
            </tr>
        </thead>
        <tbody>
         <!-- 
            Pega o resultado da consulta feita pelo método listFilteredPasswords e divide o grande array de resultados (senhas) em um array separado para cada um (senha) 
            Tudo abaixo está dentro do loop foreach, então pra cada senha ele vai mostrar na tabela as resultados
            Primeiro é meostrado o nome do curso, depois um select dentro de um formulário com as senhas do curso, logo após isso temos a faixa etária
            e por fim um botão pra enviar a senha escolhida para outro arquivo
            Tem também uns input hidden só pra passar mais informações sobre a senha escolhida
        -->
        <?php foreach ($senhas as $senha) { ?>
            <tr>
                <td><?= $senha->nome_curso ?></td>
                <td>
                    <form action="../Controller/senhaHandler.php" method="post">
                        <select name="senha">
                            <?php foreach (explode(', ', $senha->senhas) as $senhaOpcao) { ?> <!-- Divide as senhas que são uma string com todas elas separadas por vírgula -->
                                <option value="<?= $senhaOpcao; ?>"><?= $senhaOpcao; ?></option> <!-- Senhas -->
                            <?php } ?>
                        </select>
                </td>
                <td><?= $senha->faixa_etaria ?></td> <!-- Faixa etária -->
                <td><?= $senha->turno ?></td>
                <td><?= $senha->dias_de_aula ?></td>
                <td>
                    <input type="hidden" name="curso" value="<?= $senha->nome_curso ?>"> <!-- Nome do curso -->
                    <input type="hidden" name="turma" value="<?= $senha->nome_turma ?>"> <!-- Nome da turma -->
                    <input type="hidden" name="quantidadeAluno" value="<?= $senha->quantidade_aluno ?>"> <!-- Quantidade de alunos da turma -->
                    <input type="hidden" name="turno" value="<?= $senha->turno ?>"> <!-- Turno da turma -->
                    <input type="hidden" name="idSenha" value="<?= $senha->cod_senha ?>"> <!-- Código da senha escohida -->
                    <button class="btn btn-primary outli" type="submit" name="acao" value="claimPassword">Escolher senha</button>
                    <button class="btn btn-primary disabled" type="submit" name="acao" value="teste">Teste</button>
                </form>
                </td>
            </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <th>Nome do curso</th>
            <th>Senhas</th>
            <th>Faixa etária</th>
            <th>Turno</th>
            <th>Dias de aula</th>
            <th>Opções</th>
        </tr>
    </tfoot>
</table>