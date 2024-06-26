<?php 
    $idContato = $_GET['idContato'];
    
    $sql = "SELECT * FROM tbcontatos WHERE idContato = $idContato";
    $result = mysqli_query($conexao, $sql) or die ("Erro ao execultar a consulta.". mysqli_error($conexao));
    $dados = mysqli_fetch_assoc($result);
?>

<header>
    <h3>Editar contato</h3>
</header>
<div class="row">
    <div class="col-6">
        <form class="needs-validation" action="index.php?menuop=atualizar-contato" method="post" novalidate>
             <div class="mb-3  container ">
                <label class="form-label" for="idContato">ID</label>
                <input class="form-control" type="text" name="idContato" required readonly id="idContato" value="<?=$dados["idContato"]?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nomeContato">Nome</label>
                <input class="form-control" type="text" name="nomeContato" required id="nomeContato" value="<?=$dados["nomeContato"]?>">
                <div class="invalid-feedback">
                    Por favor, digite seu nome.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="emailContato">E-mail</label>
                <input class="form-control" type="email" name="emailContato" required id="emailContato" value="<?=$dados["emailContato"]?>">
                <div class="invalid-feedback">
                    Por favor, digite um e-mail.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="telefoneContato">Telefone</label>
                <input class="form-control" type="text" name="telefoneContato" required id="telefoneContato" value="<?=$dados["telefoneContato"]?>">
                <div class="invalid-feedback">
                    Por favor, digite seu telefone.
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="enderecoContato">Endereço</label>
                <input class="form-control" type="text" name="enderecoContato" required id="enderecoContato" value="<?=$dados["enderecoContato"]?>">
                <div class="invalid-feedback">
                    Por favor, digite seu endereço.
                </div>
            </div>
    
            <div class="row">
                <div class="mb-3 col-5">
                        <label for="sexoContato" class="form-label">Sexo </label>
                        <select class="form-control" name="sexoContato" required id="sexoContato">
                            <option <?php echo ($dados["sexoContato"] == '')?'selected':'' ?> value="">Selecione o genero do Contato</option>
                            <option <?php echo ($dados["sexoContato"] == 'M')?'selected':'' ?> value="M">MASCULINO</option>
                            <option <?php echo ($dados["sexoContato"] == 'F')?'selected':'' ?> value="F">FEMININO</option>
                            <option <?php echo ($dados["sexoContato"] == 'O')?'selected':'' ?> value="O">OUTROS</option>
                        </select>
                    </div>
                <div class="mb-3">
                    <label class="form-label" for="dataNascContato">Data de Nascimento</label>
                    <input class="form-control" type="date" name="dataNascContato" required id="dataNascContato" value="<?=$dados["dataNascContato"]?>">
                </div>
            </div>
            <div class="mb-3">
                <input class="btn btn-success" type="submit" value="Atualizar" name="btnAtualizar">
            </div>

        </form>
    </div>
    
    <div class="col-6">

        <?php 

            if($dados["nomeFotoContato"] == "" || !file_exists('./paginas/contatos/fotos-contatos/'.$dados["nomeFotoContato"])){
                $nomeFoto = "SemFoto.jpg";
            }
            else{
                $nomeFoto = $dados["nomeFotoContato"];
            }
        ?>
    
        <div class="mb-3">
            <img width="300" w src="./paginas/contatos/fotos-contatos/<?=$nomeFoto?>">
        </div>

                    <div id="editar-foto">
                        <div class="mb-3">
                            <button class="btn btn-info" id="btn-editar-foto">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data" id="form-upload-foto" class="mb-3">
                            <input type="hidden" name="idContato" id="<?=$idContato?>">
                            <label class="form-label" for="arquivo">Selecione um arquivo de imagem da foto</label>
                        <div class="input-group">
                            <input type="file" name="arquivo" id="arquivo" class="form-control">
                            <input type="submit" value="Enviar" class="btn btn-secondary">
                        </div>
                        </form>
                        <div id="mensagem" class="mb-3 alert alert-success">
                            Mensagem aqui
                        </div>
                        <div id="preloader" class="progress">
                            <div id="barra" class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
    </div>
</div>


