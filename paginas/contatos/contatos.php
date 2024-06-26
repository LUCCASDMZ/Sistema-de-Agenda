<?php 
    $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";
?>

<header>
    <h3><i class="bi bi-person-square"></i> Contatos </h3>
</header>
<link rel="stylesheet" href="/css/estilo-padrao.css">
<div style="margin-bottom: 30px">
    <a class="btn btn-outline-secondary" href="index.php?menuop=cad-contato"><i class="bi bi-person-plus-fill"></i> Novo Contato</a>
</div>

<div>
    <form action="index.php?menuop=contatos" method="post">
        <div class="input-group">
            <input class="form-control" type="text" name="txt_pesquisa" value="<?="$txt_pesquisa"?>" id="txt_pesquisa">
            <button class="btn btn-outline-success btn-sm" type="submit"><i class="bi bi-search"></i> Pesquisar</button>
        </div>
    </form>
</div>

<div class="tabela">
    <table class="table table-dark table-hover table-bordered table-sm">
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
        
                $quantidade = 9;
        
                //Se a varialvel get pagina existir ENTAO guarda o valor em get pagina, SENAO 1
                $pagina = (isset($_GET['pagina']))? (int)$_GET['pagina'] : 1;
        
                $inicio = ($quantidade * $pagina) - $quantidade;
        
                $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";

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
                <tr class="text-nowrap">
                    <td><?= htmlspecialchars($dados["idContato"]) ?></td>
                    <td><?= htmlspecialchars($dados['nomeContato']) ?></td>
                    <td><?= htmlspecialchars($dados['emailContato']) ?></td>
                    <td ><?= htmlspecialchars($dados['telefoneContato']) ?></td>
                    <td><?= htmlspecialchars($dados['enderecoContato']) ?></td>
                    <td><?= htmlspecialchars($dados['sexoContato']) ?></td>
                    <td><?= htmlspecialchars($dados['dataNascContato']) ?></td>
                    <td class="text-center">
                        <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>"><i class="bi bi-pencil-square"></i></a>
                    </td>
                    <td class="text-center">
                        <a class="btn btn-outline-danger btn-sm btn" href="index.php?menuop=excluir-contato&idContato=<?= htmlspecialchars($dados["idContato"]) ?>"><i class="bi bi-trash"></i></a>
                    </td>
                </tr>
                <?php endwhile; ?>
        
                
            </tbody>
    </table>
</div>


<ul class="pagination justify-content-center">
    <?php
    
        $sqlTotal = "SELECT idContato FROM tbContatos";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
    
        echo "<li class='page-item'><span class='page-link'>Total de Registro $numTotal </span></li>";
        echo "<li class='page-item'><a href='?menuop=contatos&pagina=1' class='page-link'>Primeira pagina</a></li>";
    
        if ($pagina > 2) {
            echo "<li class='page-item'><a class='page-link' href='?menuop=contatos&pagina=' . ($pagina - 1) . ''> << </a></li> ";
        }
    
        for($i=1; $i <= $totalPagina; $i++){
    
            if($i >= ($pagina-5) && $i <= ($pagina+5)){
                if($i == $pagina){
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                }else{
                    echo "<li class='page-item'><a href=\"?menuop=contatos&pagina=$i\"class='page-link'>$i</a></li> ";
                }
            }
        }
    
        if ($pagina < $totalPagina - 1) {
            echo "<li class='page-item'><a class='page-link' href='?menuop=contatos&pagina=' . ($pagina + 1) . ''> >> </a></li> ";
        }
    
        echo "<li class='page-item'><a href=\"?menuop=contatos&pagina=$totalPagina\" class='page-link'>Ultima pagina</a></li>";
    
    ?>
</ul>
