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
            <th>Sexo</th>
            <th>Data de Nascimento</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $sql = "SELECT * FROM tbcontatos";
        $rs = mysqli_query($conexao, $sql) or die("Erro ao executar a consulta". mysqli_error($conexao));

        while($dados = mysqli_fetch_assoc($rs)):
    ?>
        <tr>
            <td><?= htmlspecialchars($dados["idContato"]) ?></td>
            <td><?= htmlspecialchars($dados['nomeContato']) ?></td>
            <td><?= htmlspecialchars($dados['emailContato']) ?></td>
            <td><?= htmlspecialchars($dados['telefoneContato']) ?></td>
            <td><?= htmlspecialchars($dados['sexoContato']) ?></td>
            <td><?= htmlspecialchars($dados['dataNascContato']) ?></td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>