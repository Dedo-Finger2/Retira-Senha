<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;

$senhas = (new ModelSenha())->listFilteredPasswords(null, null, null, null, $_POST['dias']);

print_r($senhas);

?>

<table> <!-- "Tabela com as senhas filtradas de a cordo com o que o usuário está buscando" - Greg -->
    <thead> <!-- "Cabeçalho da tabela" - Greg -->
        <tr>
            <th>Nome do curso</th>
            <th>Senha</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody> <!-- "Corpo da tabela, os dados entram aqui separados por <tr> e cada linha sendo um <td>" - Greg -->
        <tr>
            <td>Analise</td>
            <td>Analise</td>
            <td>Analise</td>
        </tr>
    </tbody>
    <tfoot> <!-- "Rodapé da tabela, mesma coisa do cabeçalho só que embaixo kk" - Greg -->
        <tr>
            <th>Nome do curso</th>
            <th>Senha</th>
            <th>Opções</th>
        </tr>
    </tfoot>
</table>