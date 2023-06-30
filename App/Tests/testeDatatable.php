<!-- "Teste mais recente do DataTables" - Wendson -->
<!DOCTYPE html>
<html>
<head>
	<title>Tabela para Gregin Night</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Incluindo o Bootstrap 5 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">

	<!-- Incluindo o DataTables -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">

</head>
<body>
	<div class="container d-flex justify-content-center vh-100 align-items-center">
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
				<tr>
					<td>Greg</td>
					<td>Ceo</td>
					<td>Camaçari</td>
					<td>19</td>
					<td>2023/01/02</td>
					<td>$320,800</td>
				</tr>
				<tr>
					<td>Cris</td>
					<td>Deput boss</td>
					<td>Camaçari</td>
					<td>19</td>
					<td>2023/02/01</td>
					<td>$170,750</td>
				</tr>
			</tbody>
		</table>
	</div>
	
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
				"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Mostrar tudo"]],
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

</body>
</html>