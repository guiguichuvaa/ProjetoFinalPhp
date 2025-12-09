<?php 
session_start();

if (empty($_POST['nome']) && empty($_POST['curso']) && empty($_POST['bairro']) && empty($_POST['rua'])) {
    $_SESSION['busca'] = "Busca não identificada.";
    header('Location: listar.php');
    exit();
}
    $_SESSION['busca'] = "Busca realizada com sucesso!";

/* --- FILTROS --- */
$nome_filtro  = "%". trim($_POST['nome'])."%";
$curso_filtro = "%". trim($_POST['curso'])."%";
$bairro_filtro = "%". trim($_POST['bairro'])."%";
$rua_filtro = "%". trim($_POST['rua'])."%";

$dbh = new PDO('mysql:host=localhost;dbname=login', 'root', '');

/* CRIA A QUERY DINAMICAMENTE */
$sql = "SELECT * FROM alunos WHERE 1=1";

if (!empty($_POST['nome'])) {
    $sql .= " AND nome_aluno LIKE :nome";
}

if (!empty($_POST['curso'])) {
    $sql .= " AND curso LIKE :curso";
}

if (!empty($_POST['bairro'])) {
    $sql .= " AND bairro LIKE :bairro";
}

if (!empty($_POST['rua'])) {
    $sql .= " AND rua LIKE :rua";
}

$sth = $dbh->prepare($sql);

/* BIND SOMENTE DO QUE FOI USADO */
if (!empty($_POST['nome'])) {
    $sth->bindParam(':nome', $nome_filtro, PDO::PARAM_STR);
}

if (!empty($_POST['curso'])) {
    $sth->bindParam(':curso', $curso_filtro, PDO::PARAM_STR);
}

if (!empty($_POST['bairro'])) {
    $sth->bindParam(':bairro', $bairro_filtro, PDO::PARAM_STR);
}

if (!empty($_POST['rua'])) {
    $sth->bindParam(':rua', $rua_filtro, PDO::PARAM_STR);
}

$sth->execute();
$resultados = $sth->fetchAll(PDO::FETCH_ASSOC);
?>


<?php 
include 'menu.php';
include 'lista.php';
include 'helper.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista dos Alunos</title>
        	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body>
    <header>
        <h1>Lista dos Alunos Cadastrados:</h1>

         <!--Mensagem de cadastro inicio-->
							<?php 
								if(isset($_SESSION['busca'])):
							?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $_SESSION['busca']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php 
								unset($_SESSION['busca']); //limpa a msg após exibir
								endif;
							?>
							<!--Mensagem de cadastro final-->

    <form action="filtro.php" method="POST" >
        <div class="row g-1">
    <div class="col-3">
        <div class="form-group">
            <label for="nome">Nome: </label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do aluno" name="nome">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Curso: </label>
            <input type="text" class="form-control" id="curso" placeholder="Curso do aluno" name="curso">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Bairro: </label>
            <input type="text" class="form-control" id="bairro" placeholder="Bairro do aluno" name="bairro">
        </div>
    </div>

    <div class="col-3">
        <div class="form-group">
            <label for="nome">Rua: </label>
            <input type="text" class="form-control" id="rua" placeholder="Rua do aluno" name="rua">
        </div>
    </div>
      
    </div>
 
    <button type="submit"  class="btn btn-primary mb-3 mt-3 w-100">Buscar</button><br>
    <button type="submit"  class="btn btn-danger mb-3 mt-3 w-100"> Limpar Filtro</button>       
</form>
</div>
    </header>

    <div class="row justify-content-sm-center h-100 g-2">
    <table class="table table-striped-columns" border="1">
        <tr scope="col">
            <th scope="row">Nome do Aluno</th>
            <th scope="row">Data de Nascimento</th>
            <th scope="row">CPF</th>
            <th scope="row">Curso</th>
            <th scope="row">Nome do Responsável</th>
            <th scope="row">Parentalidade</th>
            <th scope="row">Rua</th>
            <th scope="row">Bairro</th>
            <th scope="row">Cidade</th>
            <th scope="row">CEP</th>
            <th scope="row">Número da Casa</th>
            <th scope="row">Opções</th>
        </tr>
        <?php foreach ($resultados as $Resultado) : ?>
            <tr scope="col">
                <td><?php echo $Resultado['nome_aluno']; ?></td>
                <td><?php echo traduz_data_exibir($Resultado['data_nasc']); ?></td>
                <td><?php echo $Resultado['cpf']; ?></td>
                <td><?php echo $Resultado['curso']; ?></td>
                <td><?php echo $Resultado['nome_resp']; ?></td>
                <td><?php echo $Resultado['tipo_resp']; ?></td>
                <td><?php echo $Resultado['rua']; ?></td>
                <td><?php echo $Resultado['bairro']; ?></td>
                <td><?php echo $Resultado['cidade']; ?></td>
                <td><?php echo $Resultado['cep']; ?></td>
                <td><?php echo $Resultado['numero_casa']; ?></td>
                <td>
                    <div class="text-align-center">
                    <a type="button" class="btn btn-primary mb-3 mt-3 " href="edita.php?id_aluno=<?php echo $Resultado['id_aluno']; ?>">
                      Editar
        </a>
                    <a  type="button" class="btn btn-danger " href="deleta.php?id_aluno=<?php echo $Resultado['id_aluno']; ?>">
                      Deletar
        </a></div>
                </td>
            </tr>
        <?php endforeach; ?>
        
    </table>

    </div>
            	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>