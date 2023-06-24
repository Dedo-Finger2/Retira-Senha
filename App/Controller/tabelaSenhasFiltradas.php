<?php 

require __DIR__."/../../vendor/autoload.php";

use App\Model\ModelSenha;

/**
 * $senhas representa as senhas filtradas, cada parâmetro representa um select na tela de filtragem de senhas
 * Atualmente em fase de testes, por isso tem o print_r ali
 */
$senhas = (new ModelSenha())->listFilteredPasswords(null, null, $_POST['idadeMinima'], $_POST['idadeMaxima'], null);

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