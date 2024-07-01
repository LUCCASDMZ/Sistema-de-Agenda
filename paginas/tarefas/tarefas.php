<?php 
    $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";
?>

<h3><i class="bi bi-list-task"></i> Tarefas</h3>

<div style="margin-bottom: 30px;">
    <a class="btn btn-outline-secondary"  href="index.php?menuop=cad-tarefas"><i class="bi bi-list-task"></i> Nova Tarefa</a>
</div>
<div>
    <form action="index.php?menuop=tarefas" method="post">
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
                <th>Status</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Data da Conclusão</th>
                <th>Hora da Conclusão</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $quantidade = 5;
        
                //Se a varialvel get pagina existir ENTAO guarda o valor em get pagina, SENAO 1
                $pagina = (isset($_GET['pagina']))? (int)$_GET['pagina'] : 1;
        
                $inicio = ($quantidade * $pagina) - $quantidade;
        
                $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";

                $ordenar = $_POST["ordenar"] ?? "ASC";
        
                //CODIGO EM SQL, FEITO NO MySQL Workbench

                

                $sql = "SELECT  
                                idTarefa,
                                statusTarefa,
                                tituloTarefa,
                                descricaoTarefa,
                                DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') AS dataConclusaoTarefa,
                                horaConclusaoTarefa
                                FROM tbtarefas
                                WHERE
                                tituloTarefa LIKE '%$txt_pesquisa%' OR
                                descricaoTarefa LIKE '%$txt_pesquisa%' OR
                                DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') 
                                LIKE '%$txt_pesquisa%'
                                ORDER BY statusTarefa, dataConclusaoTarefa $ordenar
                                LIMIT $inicio, 
                                $quantidade";                                
                
                $result = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta".mysqli_error($conexao));

                while($dados = mysqli_fetch_assoc($result)):
            ?>
                <tr class="text-nowrap">
                    <td class="text-center">
                        <a class="btn btn-secondary btn-sm" href="index.php?menuop=status-tarefas-concluido">
                            <?php
                                if($dados['statusTarefa'] == 0){
                                    echo "<i class='bi bi-square'></i>";
                                }else{
                                    echo "<i class='bi bi-check-square-fill'></i>";
                                }
                            ?>
                        </a>
                    </td>
            <td class="text-nowrap"><?=$dados['tituloTarefa']?></td>
            <td class="text-nowrap"><?=$dados['descricaoTarefa']?></td>
            <td class="text-nowrap"><?=$dados['dataConclusaoTarefa']?></td>
            <td class="text-nowrap"><?=$dados['horaConclusaoTarefa']?></td>

            <td class="text-center">
                <a class="btn btn-outline-warning btn-sm" href="index.php?menuop=editar-tarefas&idTarefa=<?=$dados['idTarefa']?>"><i class="bi bi-pencil-square"></i></a>
                
            </td>
            <td class="text-center">
                <a class="btn btn-outline-danger btn-sm" href="index.php?menuop=excluir-tarefas&idTarefa=<?=$dados['idTarefa']?>"><i class="bi bi-trash-fill"></i></a>    
            </td>

                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<ul class="pagination justify-content-center">
    <?php
    
        $sqlTotal = "SELECT idTarefa FROM tbtarefas";
        $qrTotal = mysqli_query($conexao, $sqlTotal) or die (mysqli_error($conexao));
        $numTotal = mysqli_num_rows($qrTotal);
        $totalPagina = ceil($numTotal / $quantidade);
    
        echo "<li class='page-item'><span class='page-link'>Total de Registro $numTotal </span></li>";
        echo "<li class='page-item'><a href='?menuop=tarefas&pagina=1' class='page-link'>Primeira pagina</a></li>";
    
        if ($pagina > 2) {
            echo "<li class='page-item'><a class='page-link' href='?menuop=tarefas&pagina=' . ($pagina - 1) . ''> << </a></li> ";
        }
    
        for($i=1; $i <= $totalPagina; $i++){
    
            if($i >= ($pagina-5) && $i <= ($pagina+5)){
                if($i == $pagina){
                    echo "<li class='page-item active'><span class='page-link'>$i</span></li>";
                }else{
                    echo "<li class='page-item'><a href=\"?menuop=tarefas&pagina=$i\"class='page-link'>$i</a></li> ";
                }
            }
        }
    
        if ($pagina < $totalPagina - 1) {
            echo "<li class='page-item'><a class='page-link' href='?menuop=tarefas&pagina=' . ($pagina + 1) . ''> >> </a></li> ";
        }
    
        echo "<li class='page-item'><a href=\"?menuop=tarefas&pagina=$totalPagina\" class='page-link'>Ultima pagina</a></li>";
    
    ?>
</ul>