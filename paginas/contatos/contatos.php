<?php 
    $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";
?>

<header>
    <h3>Contatos</h3>
</header>
<link rel="stylesheet" href="/css/estilo-padrao.css">
<div style="margin-bottom: 30px">
    <a href="index.php?menuop=cad-contato">Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post" class="test">
        <input type="text" name="txt_pesquisa" value="<?="$txt_pesquisa"?>" id="txt_pesquisa">
        <input type="submit" value="Pesquisar">
    </form>
    <form action="index.php?menuop=contatos" method="post" class="test">
        <input type="submit" value="Voltar" name="voltar">
    </form>
    <form action="index.php?menuop=contatos" method="post" class="test">
        <input type="hidden" name="ordenar" value="<?php echo (isset($_POST['ordenar']) && $_POST['ordenar'] === 'DESC') ? 'ASC' : 'DESC'; ?>">
        <button type="submit">Ordenar de <?php echo (isset($_POST['ordenar']) && $_POST['ordenar'] === 'DESC') ? 'A-Z' : 'Z-A'; ?></button>
    </form>
</div>

<div class="tabela">
    <table class="table table-dark table-hover table-bordered">
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
        
                $quantidade = 7;
        
                //Se a varialvel get pagina existir ENTAO guarda o valor em get pagina, SENAO 1
                $pagina = (isset($_GET['pagina']))? (int)$_GET['pagina'] : 1;
        
                $inicio = ($quantidade * $pagina) - $quantidade;
        
                $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";
                $voltar = $_POST["voltar"] ?? "";
                $ordenar = $_POST["ordenar"] ?? "ASC";
        
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
                                FROM tbcontatos
                                WHERE idContato = '$txt_pesquisa'
                                or nomeContato
                                or emailContato
                                LIKE '%$txt_pesquisa%'
                                ORDER BY nomeContato $ordenar
                                LIMIT $inicio, $quantidade";
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
                    <td id="date"><?= htmlspecialchars($dados['dataNascContato']) ?></td>
                    <td><a href="index.php?menuop=editar-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>">Editar</a></td>
                    <td><a href="index.php?menuop=excluir-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>">Excluir</a></td>
                </tr>
                <?php endwhile; ?>
        
                
            </tbody>
    </table>
</div>

<div>
    <?php
    
        $sqlTotal = "SELECT idContato FROM tbContatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
    
        echo "Total de Registro $numTotal <br>";
        echo '<a href="?menuop=contatos&pagina=1">Primeira pagina</a>';
    
        if ($pagina > 2) {
            echo '<a href="?menuop=contatos&pagina=' . ($pagina - 1) . '"> << </a> ';
        }
    
        for($i=1; $i <= $totalPagina; $i++){
    
            if($i >= ($pagina-5) && $i <= ($pagina+5)){
                if($i == $pagina){
                    echo $i;
                }else{
                    echo "<a href=\"?menuop=contatos&pagina=$i\">$i</a> ";
                }
            }
        }
    
        if ($pagina < $totalPagina - 1) {
            echo '<a href="?menuop=contatos&pagina=' . ($pagina + 1) . '"> >> </a> ';
        }
    
        echo "<a href=\"?menuop=contatos&pagina=$totalPagina\">Ultima pagina</a>";
    
    ?>
</div>