<?php

require __DIR__ . "/../../vendor/autoload.php"; // Autoload

use App\Controller\ControllerSenha;

/**
 * Se o POST vier vazio então o usúario tentou usar os valores padrões dos select como valor para fazer filtragem
 */
if (empty($_POST) || empty($_POST['turno']) || empty($_POST['idadeMinima']) || empty($_POST['idadeMaxima'])) {
    echo "<h4 class='text-center mt-5'><strong>Selecione dados válidos! Turno, Faixa etária inicial e final. <a href='filtragemDeSenhas.php'>Voltar</a></strong></h4>";
    exit();
}


/**
 * $senhas representa as senhas filtradas, cada parâmetro representa um select na tela de filtragem de senhas
 * Atualmente em fase de testes, por isso tem o print_r ali
 */
$senhas = (new ControllerSenha())->listPasswords($_POST);

//print_r($senhas);

?>

<!-- Se as senhas forem um array, então é porque a consulta deu resultado, logo, mostre a tabela com esse resultado! -->
<?php if (is_array($senhas)) { ?>
    <h1 class="text-center mt-2">Escolha sua senha</h1>
    <h2 class="text-center">Aqui você poderá escolher senhas para o curso desejado.</h2>
    <div class="container d-flex justify-content-center align-items-center mt-3 mb-5">

        <table id="example" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nome do curso</th>
                    <th>Senhas</th>
                    <th>Faixa etária</th>
                    <th>Turno</th>
                    <th>Dias de aula</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <!-- 
                Pega o resultado da consulta feita pelo método listFilteredPasswords e divide o grande array de resultados (senhas) 
                em um array separado para cada um (senha).
                Tudo abaixo está dentro do loop foreach, então pra cada senha ele vai mostrar na tabela as resultados
                Primeiro é meostrado o nome do curso, depois um select dentro de um formulário com as senhas do curso, logo após isso temos a faixa etária
                e por fim um botão pra enviar a senha escolhida para outro arquivo
                Tem também uns input hidden só pra passar mais informações sobre a senha escolhida
            -->
                <?php foreach ($senhas as $senha) { ?>
                    <tr>
                        <td>
                            <?= $senha->nome_curso ?> <!-- Nome do curso -->
                        </td>
                        <td>
                            <form action="../Controller/senhaHandler.php" method="post">
                                <select class="form-select" name="senha">
                                    <!-- Divide as senhas que são uma string com todas elas separadas por vírgula -->
                                    <?php foreach (explode(', ', $senha->senhas) as $senhaOpcao) { ?>
                                        <option value="<?= $senhaOpcao; ?>"><?= $senhaOpcao; ?></option> <!-- Senhas -->
                                    <?php } ?>
                                </select>
                        </td>
                        <td>
                            <?= $senha->faixa_etaria ?> <!-- Faixa etária -->
                        </td> 
                        <td>
                            <?= $senha->turno ?> <!-- Turno -->
                        </td>
                        <td>
                            <?= $senha->dias_de_aula ?> <!-- Dias de aula -->
                        </td>
                        <td>
                            <!-- Inputs hidden com informações sobre a senha selecionada -->
                            <input type="hidden" name="curso" value="<?= $senha->nome_curso ?>"> <!-- Nome do curso -->
                            <input type="hidden" name="turma" value="<?= $senha->nome_turma ?>"> <!-- Nome da turma -->
                            <input type="hidden" name="quantidadeAluno" value="<?= $senha->quantidade_aluno ?>"> <!-- Quantidade de alunos da turma -->
                            <input type="hidden" name="turno" value="<?= $senha->turno ?>"> <!-- Turno da turma -->
                            <input type="hidden" name="idSenha" value="<?= $senha->cod_senha ?>"> <!-- Código da senha escohida -->
                            
                            <button class="btn btn-primary outli" type="submit" name="acao" value="claimPassword">Escolher senha</button>
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
                    <th>Ação</th>
                </tr>
            </tfoot>
        </table>
    <!-- Se não for um array, então não deu resultado algum a consulta, então mostra essa mensagem abaixo para o usuário -->
    <?php } else {
    echo "<h3 class='text-center mt-5'>Nenhuma senha encontrada com os filtros aplicados! <a href='filtragemDeSenhas.php'>Tente novamente</a>.</h3>";
} ?>