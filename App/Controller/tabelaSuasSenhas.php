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
                <th>Nome do cidadão</th>
                <th>Posição</th>
                <th>Escritório (Local)</th>
                <th>Idade</th>
                <th>Data de início</th>
                <th>Salário</th>
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
<?php } ?>