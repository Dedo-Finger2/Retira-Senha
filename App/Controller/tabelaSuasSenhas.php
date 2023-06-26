<?php 

require __DIR__."../../vendor/autoload.php";

use App\Controller\ControllerSenha;
use App\Model\ModelSenha;

?>

<table> <!-- "Tabela com as senhas do usuário, se o mesmo não tiver senha nenhuma uma mensagem deve aparecer informando isso no lugar da tabela" - Greg -->
    <thead> <!-- "Cabeçalho da tabela" - Greg -->
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
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
            <th>Column 1</th>
            <th>Column 2</th>
            <th>Column 3</th>
        </tr>
    </tfoot>
</table>