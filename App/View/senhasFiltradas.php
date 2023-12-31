<?php
/**
 * "Inicia a sessão e verifica
 * Se a variável de sessão RG for varzia, significa que o usuário é sabido demais e ta tentando acessar essa página
 * sem se logar antes! Se for caso, então mandar ele de volta pra tela de login" - Greg
 */
session_start();

if (!isset($_SESSION['rg'])) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../Public/Css/customBootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Incluindo o DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../Public/Css/customBootstrap.css">
    <title>Senhas Filtradas</title>
    <!--NAVBAR-->
    <?php require_once("finalNavbar.php"); ?>
</head>

<body>
    <!-- Logo na página -->
    <div class="rounded d-flex align-items-center justify-content-center">
        <img src="../Public/img/Logo-texto-preto.png" class="mt-5" style="width: 150px;" alt="Placeholder image">
    </div>
    
    <!-- Tabela -->
    <?php require_once("../Controller/tabelaSenhasFiltradas.php") ?>

    <!-- FOOTER -->
    <?php require_once("footer.php"); ?>

    <!-- Script para inicializar o DataTable -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function () {
            $('#example').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "lengthMenu": [[5, 25, 50, -1], [10, 25, 50, "Mostrar tudo"]],
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