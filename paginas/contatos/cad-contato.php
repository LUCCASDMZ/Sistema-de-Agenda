<header>
    <h3><i class="bi bi-person-square"></i> Cadastro de Contato</h3>
</header>
<div>
    <form class="needs-validation" action="index.php?menuop=inserir-contato" method="post" novalidate>
        <div class="mb-3">
            <label for="nomeContato" class="form-label">Nome</label>
            <input type="text"  name="nomeContato" required class="form-control" id="nomeContato">
            <div class="valid-feedback">
                Tudo certo!
            </div>
            <div class="invalid-feedback">
                Por favor, digite seu nome.
            </div>
        </div>
        <div class="mb-3">
            <label for="emailContato">E-mail</label>
            <input type="email" name="emailContato" required class="form-control" id="emailContato">
            <div class="valid-feedback">
                Tudo certo!
            </div>
            <div class="invalid-feedback">
                Por favor, digite um e-mail.
            </div>
        </div>
        <div class="mb-3">
            <label for="telefoneContato" class="form-label">Telefone</label>
            <input type="text" name="telefoneContato" required class="form-control" id="telefoneContato">
            <div class="invalid-feedback">
                Por favor, digite seu telefone.
            </div>
        </div>
        <div class="mb-3">
            <label for="enderecoContato" class="form-label">Endereço</label>
            <input type="text" name="enderecoContato" required class="form-control" id="enderecoContato">
            <div class="invalid-feedback">
                Por favor, digite seu endereço.
            </div>
        </div>
        <div class="row">
            <div class="mb-3 col-3">
                <label for="sexoContato" class="form-label">Sexo </label>
                <select required class="form-control" name="sexoContato" id="sexoContato">
                    <option selected value="">Selecione o sexo</option>
                    <option value="M">MASCULINO</option>
                    <option value="F">FEMININO</option>
                </select>
            </div>
            <div class="mb-5 col-3">
                <label for="dataNascContato" class="form-label">Data de Nascimento</label>
                <input type="date" name="dataNascContato" required class="form-control" id="dataNascContato">
            </div>
        </div>
        <div class="mb-3 row col-3">
            <label for="foto">Insira sua foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div class="mb-3" >
            <input class="btn btn-success" type="submit" value="Adicionar" name="btnAdicionar">
        </div>
    </form>
</div>