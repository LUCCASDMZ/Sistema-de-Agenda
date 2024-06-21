<?php 
    $idContato = $_GET['idContato'];
    
    $sql = "SELECT * FROM tbcontatos WHERE idContato = $idContato";
    $result = mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.". mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($result);
?>

<header>
    <h3>Editar contato</h3>
</header>
<div>
    <form action="index.php?menuop=atualizar-contato" method="post">
        <div>
            <label for="idContato">ID</label>
            <input type="text" name="idContato" required id="idContato" value="<?=$dados["idContato"]?>">
        </div>
        <div>
            <label for="nomeContato">Nome</label>
            <input type="text" name="nomeContato" required id="nomeContato" value="<?=$dados["nomeContato"]?>">
        </div>
        <div>
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" required id="emailContato" value="<?=$dados["emailContato"]?>">
        </div>
        <div>
            <label for="telefoneContato">Telefone</label>
            <input type="text" name="telefoneContato" required id="telefoneContato" value="<?=$dados["telefoneContato"]?>">
        </div>
        <div>
            <label for="enderecoContato">Endereço</label>
            <input type="text" name="enderecoContato" required id="enderecoContato" value="<?=$dados["enderecoContato"]?>">
        </div>
        <div>
            <label for="sexoContato">Sexo</label>
            <input type="text" name="sexoContato" required id="sexoContato" value="<?=$dados["sexoContato"]?>">
        </div>
        <div>
            <label for="dataNascContato">Data de Nascimento</label>
            <input type="date" name="dataNascContato" required id="dataNascContato" value="<?=$dados["dataNascContato"]?>">
        </div>
        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>
    </form>
</div>