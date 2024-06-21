<header>
    <h3>Contatos</h3>
</header>
<div>
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>
<table border="2">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Endereço</th>
            <th>Sexo</th>
            <th>Data de Nascimento</th>
            <th>Edição</th>
            <th>Excluir</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        //CODIGO EM SQL, FEITO NO MySQL Workbench
        $sql = "SELECT 
                        idContato, 
                        upper (nomeContato)AS nomeContato,
                        lower(emailContato) AS emailContato,
                        telefoneContato,
                        upper(enderecoContato) AS enderecoContato,
                        CASE
                            WHEN sexoContato = 'F' THEN 'FEMININO'
                            WHEN sexoContato = 'M' THEN 'MASCULINO'
                        ELSE
                            'NÃO ESPECIFICADO'
                        END AS sexoContato,
                        DATE_FORMAT(dataNascContato, '%d/%m/%Y') AS dataNascContato
                        FROM tbcontatos";
        //FIM DO CODIGO SQL

        $result = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta". mysqli_error($conexao));

        while($dados = mysqli_fetch_assoc($result)):
    ?>
        <tr>
            <td><?= htmlspecialchars($dados["idContato"]) ?></td>
            <td><?= htmlspecialchars($dados['nomeContato']) ?></td>
            <td><?= htmlspecialchars($dados['emailContato']) ?></td>
            <td><?= htmlspecialchars($dados['telefoneContato']) ?></td>
            <td><?= htmlspecialchars($dados['enderecoContato']) ?></td>
            <td><?= htmlspecialchars($dados['sexoContato']) ?></td>
            <td><?= htmlspecialchars($dados['dataNascContato']) ?></td>
            <td><a href="index.php?menuop=editar-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>">Editar</a></td>
            <td><a href="index.php?menuop=excluir-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>">Excluir</a></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>