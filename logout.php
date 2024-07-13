<?php 
    session_unset();
    session_destroy();
    header('Location: login.php')
?>



<?php 
    //conexao com o banco de dados
    include './db/conexao.php';

    //verificação no banco de dados
    $msg_error = "";

    if(isset($_POST['loginUser']) & isset($_POST['senhaUser'])){
        $loginUser = mysqli_escape_string($conexao, $_POST['loginUser']);
        $senhaUser = $_POST['senhaUser'];
        //$senhaUser = $_POST['senhaUser'];
        
        $sql = "SELECT * FROM tbusuarios WHERE loginUser = '$loginUser' AND senhaUser = '$senhaUser'";
        $rs = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_assoc($rs);
        $linha = mysqli_num_rows($rs);

        if( $linha != 0){
            session_start();
            $_SESSION['loginUser'] = $loginUser;        
            $_SESSION['senhaUser'] = $senhaUser;        
            $_SESSION['nomeUser'] = $dados['nomeUser'];   
            
            header('Location: index.php');
    }else{
        $msg_error = "  <div class='alert alert-danger mt-3'
                            <p>Usuario nao encontrando ou senha não confere</p>
                        </div>";
        }
    }
?>