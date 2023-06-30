<?php

require __DIR__ . "/../../vendor/autoload.php"; // Autoload

use App\Controller\ControllerSenha;

$senhasUsuario = (new ControllerSenha())->listUserPasswords($_SESSION['idUsuario']); // Pegando as senhas do usuário pelo id dele guardado na sessão atual

?>
<!-- Css do bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<!-- Incluindo o DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="../Public/Css/customBootstrap.css">

<!-- Tabela -->
<div class="container d-flex justify-content-center mt-5 mb-5 align-items-center">
    <table id="example" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Nome do cidadão</th>
                <th>Posição</th>
                <th>Escritório (Local)</th>
                <th>Idade</th>
                <th>Data de início</th>
                <th>Salário</th>
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
                <td class="row"><?= $senha->nome_curso ?></td>
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
                    <button type="submit" name="acao" value="claimPassword">Escolher senha</button>
                </form>
                </td>
            </tr>
    <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Nome do cidadão</th>
                <th>Posição</th>
                <th>Escritório (Local)</th>
                <th>Idade</th>
                <th>Data de início</th>
                <th>Salário</th>
            </tr>
        </tfoot>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
	<!-- Script para inicializar o DataTable -->
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"lengthMenu": [[7, 25, 50, -1], [10, 25, 50, "Mostrar tudo"]],
				"language": {
					"search": "Pesquisar:",
					"paginate": {
						"previous": "Anterior",
						"next": "Próximo"
					},
					"info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
					"infoEmpty": "Mostrando 0 a 0 de 0 registros",
					"infoFiltered": "(filtrado de _MAX_ registros no total)"
				}
			});

			// Adiciona classe btn-3d aos botões de anterior e próximo do paginador
			$('.paginate_button.previous, .paginate_button.next').addClass('btn-3d');
		});
    </script>