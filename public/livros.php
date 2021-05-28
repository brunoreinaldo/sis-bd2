<!DOCTYPE html>

<head>
    <style>
        .content {
            max-width: 500px;
            margin: auto;
        }
    </style>
</head>

<html>

<body>
    <div class="content">
        <h1>Bibliófilo's</h1>

        <h2>Livros</h2>
        <?php
        require 'mysql_server.php';

        $conexao = RetornaConexao();

        $isbn = 'isbn';
        $titulo = 'titulo';
        $autor = 'autor';
        $n_paginas = 'n_paginas';
        $idioma = 'idioma';
        /*TODO-1: Adicione uma variavel para cada coluna */


        $sql =
            'SELECT ' . $isbn .
            '     , ' . $titulo .
            '     , ' . $autor .
            '     , ' . $n_paginas .
            '     , ' . $idioma .
            /*TODO-2: Adicione cada variavel a consulta abaixo */
            '  FROM livro';


        $resultado = mysqli_query($conexao, $sql);
        if (!$resultado) {
            echo mysqli_error($conexao);
        }



        $cabecalho =
            '<table>' .
            '    <tr>' .
            '        <th>' . $isbn . '</th>' .
            '        <th>' . $titulo . '</th>' .
            '        <th>' . $autor . '</th>' .
            /* TODO-3: Adicione as variaveis ao cabeçalho da tabela */
            '        <th>' . $n_paginas . '</th>' .
            '        <th>' . $idioma . '</th>' .
            '    </tr>';

        echo $cabecalho;

        if (mysqli_num_rows($resultado) > 0) {

            while ($registro = mysqli_fetch_assoc($resultado)) {
                echo '<tr>';

                echo '<td>' . $registro[$isbn] . '</td>' .
                    '<td>' . $registro[$titulo] . '</td>' .
                    '<td>' . $registro[$autor] . '</td>' .
                    /* TODO-4: Adicione a tabela os novos registros. */
                    '<td>' . $registro[$n_paginas] . '</td>' .
                    '<td>' . $registro[$idioma] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo '';
        }
        FecharConexao($conexao);
        ?>
    </div>
</body>

</html>