<?php
    $pdo = new PDO('mysql:host=localhost;dbname=pontes', 'pontesneto', '123456');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if(isset($POST['nome'])){
            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?,?)");
            $sql->execute(array($POST['nome'], $_POST['email']));
            echo 'Dados inseridos com sucesso!';
        }
?>

<form method="post">
    <h1>Cadastro de Clientes</h1>
    <p>Inserção no banco de dados</p>
    <input type="text" name="nome" placeholder="Nome Completo">
    <input type="text" name="email" placeholder="Email">
    <input type="submit" value="Enviar">
</form>

<?php
$sql = $pdo->prepare("SELECT * FROM clientes");
$sql->execute();

$fetchClientes = $sql->fetchAll();

foreach ($fetchClientes as $key => $value){
    echo '<a href="?delete=' . $value['id'] . '">(X)</a>' . $value['nome'] . ' | ' . $value['email'];
    echo '<hr>';
}
?>

<style>
    form{
        display: flex;
        flex-direction: column;
        align-items: Start;
    }
    input{
        width: 60%;
        line-height: 2;
        margin: 10px 0px 0px 0px;
        border-radius: 6px;
        border: 1px solid #c2c2c2;
        background-color: #ededed;
        padding-left: 5px;
    }
    h1, p{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
</style>
