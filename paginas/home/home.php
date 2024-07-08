<?php 

    $txt_pesquisa = ($_POST["txt_pesquisa"]) ?? "";

    //alternar entre status concluido ou nao concluido
    //  SE ele existe na barra de URL, de o valor idTarefa, SE NAO o valor fica vazio
    $idTarefa = (isset($_GET['idTarefa']))? $_GET['idTarefa'] : "0"; 
    $statusTarefa = (isset($_GET['statusTarefa']) and $_GET['statusTarefa']== '0')? '1':'0';

    $sql = "UPDATE tbtarefas SET statusTarefa = $statusTarefa WHERE idTarefa = $idTarefa";

    $result = mysqli_query($conexao, $sql);
?>

<h3><i class="bi bi-list-task"></i> Tarefas Hoje !</h3>


<div>
    <form action="index.php?menuop=home" method="post">
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

                $quantidade = 8;
        
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
                                (tituloTarefa LIKE '%$txt_pesquisa%' OR
                                descricaoTarefa LIKE '%$txt_pesquisa%' OR
                                DATE_FORMAT(dataConclusaoTarefa, '%d/%m/%Y') 
                                LIKE '%$txt_pesquisa%')
                                AND statusTarefa = 0
                                ORDER BY statusTarefa,dataConclusaoTarefa $ordenar
                                LIMIT $inicio, 
                                $quantidade";                                
                
                $result = mysqli_query($conexao, $sql) or die ("Erro ao executar a consulta".mysqli_error($conexao));

                while($dados = mysqli_fetch_assoc($result)):
            ?>
                <tr class="text-nowrap">
                    <td class="text-center">
                        <a class="btn btn-secondary btn-sm" href="index.php?menuop=home&pagina=<?=$pagina?>&idTarefa=<?=$dados['idTarefa']?>&statusTarefa=<?=$dados['statusTarefa']?>">
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

