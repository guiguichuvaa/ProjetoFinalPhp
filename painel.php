<?php
session_start();
include('verifica_login.php');
include ('graficos.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap - Main Painel</title>
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

</head>
<body class="bg-light">
<section class="h-100">

<div class="row justify-content-sm-center h-100 ">


<div class="row justify-content-sm-center">
<div class="col-4">

    <div class="card text-bg-primary ">

  <div class="card-header"></div>

  <div class="card-body">
    <h5 class="card-title">Total de Alunos:</h5>
    <h3><?php echo $total_alunos;?></h3>
  </div>
</div>

</div>
<div class="col-4">

    <div class="card text-bg-primary" >

  <div class="card-header"></div>
  
  <div class="card-body">
    <h5 class="card-title">Média de alunos por curso:</h5>
    <h3><?php echo  $media_alunos;?></h3>
  </div>

</div>

</div>
</div>

<div class="row justify-content-sm-center">
  
  <div class="col-4">
    
    <div class="card text-bg-primary" >
      
      <div class="card-header primary-text-emphasis"></div>
      
      <div class="card-body">
        <h5 class="card-title">Alunos Zona Rural:</h5>
        <h3><?php echo $fora_crateus;?></h3>
      </div>
      
    </div>
    
  </div>

  <div class="col-4">
    
    <div class="card text-bg-primary mb-3" >
      
      <div class="card-header primary-text-emphasis"></div>
      
      <div class="card-body">
        <h5 class="card-title">Alunos Sede:</h5>
        <h3><?php echo $sede_crateus;?></h3>
      </div>
      
    </div>
    
  </div>
</div>

<?php 
include ('footer.php');

?>
</div>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</script>
</body>
</html>
