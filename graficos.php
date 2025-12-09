<?php
include 'conexao.php';
// ----------------------------------------------------------
//        BUSCAR DADOS PARA OS CARDS
// ----------------------------------------------------------

// 1. Total de alunos
$sql_total = $conexao->query("SELECT COUNT(*) AS total FROM alunos");
$total_alunos = $sql_total->fetch_assoc()['total'];

// 2. Média de alunos por curso
$sql_cursos = $conexao->query("SELECT curso, COUNT(*) AS total FROM alunos GROUP BY curso");
$total_cursos = $sql_cursos->num_rows;

$media_alunos = $total_cursos > 0 ? round($total_alunos / $total_cursos, 1) : 0;

// 3. Alunos que NÃO são de Crateús (aceita grafias diferentes)
$sql_fora = $conexao->query("
    SELECT COUNT(*) AS total 
    FROM alunos 
    WHERE LOWER(cidade) <> 'crateús' 
      AND LOWER(cidade) <> 'crateus'
");
$fora_crateus = $sql_fora->fetch_assoc()['total'];

//4. Alunos que SÃO de CRATEÚS(aceita grafias de diferetnes)
$sql_sede = $conexao->query("SELECT COUNT(*) AS total
        FROM alunos
        WHERE LOWER(cidade) = 'crateús'
        AND LOWER(cidade) = 'crateus'");
        $sede_crateus = $sql_sede->fetch_assoc()['total'];


// ----------------------------------------------------------
//        DADOS PARA O GRÁFICO DE PIZZA
// ----------------------------------------------------------


$curso_a = 0;
$curso_b = 0;
$curso_c = 0;
$curso_d = 0;

$result_alunos_curso = "SELECT * FROM alunos";
$resultado = mysqli_query($conexao, $result_alunos_curso);
while($row_alunos_curso = mysqli_fetch_assoc($resultado)){
    if($row_alunos_curso['curso'] == "Informática"){
        $curso_b++;
    } else if($row_alunos_curso['curso'] == "Enfermagem"){
        $curso_a++;
    } else if($row_alunos_curso['curso'] == "Administração"){
        $curso_d++;
    } else{
        $curso_c++;
    }
}

// ----------------------------------------------------------
//        DADOS PARA O GRÁFICO DE BARRA
// ----------------------------------------------------------

$bairros = [];

$result_bairro_alunos = "SELECT bairro, COUNT(*) as qtd FROM alunos GROUP BY bairro ORDER BY qtd DESC LIMIT 5";
$resultado_bairro = mysqli_query($conexao, $result_bairro_alunos);
while($row_alunos_bairro = mysqli_fetch_assoc($resultado_bairro)){
    $bairros[] = $row_alunos_bairro;

}
?>

<html>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Curso', 'Quantidade de alunos'],
          ['Informática',     <?= $curso_a  ?>],
          ['Enfermagem',      <?= $curso_b  ?>],
          ['Desenvolvimento de Sistemas',  <?= $curso_c  ?>],
          ['Administração', <?= $curso_d  ?>]

        ]);

        var options = {
          title: 'Alunos por Curso:',
colors: ['#6f42c1', '#6610f2', 'blue', '#0d6efd', 'cyan'],};


        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Bairro", "Quantidade de Alunos", { role: "style" } ],
        ['<?= $bairros[0]['bairro'] ?>', <?= $bairros[0]['qtd'] ?>, "#6f42c1"],
        ['<?= $bairros[1]['bairro'] ?>', <?= $bairros[1]['qtd'] ?>, "#6610f2"],
        ['<?= $bairros[2]['bairro'] ?>', <?= $bairros[2]['qtd'] ?>, "blue"],
        ['<?= $bairros[3]['bairro'] ?>', <?= $bairros[3]['qtd'] ?>, "#0d6efd"],
        ['<?= $bairros[4]['bairro'] ?>', <?= $bairros[4]['qtd'] ?>, "cyan"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Bairros com maior quantidade de Alunos:",
        bar: {groupWidth: "95%"},
        legend: { position: "bottom" },
      };
      var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
      chart.draw(view, options);
  }
  </script>

  </head>
  <body>
            
    <div class="row justify-content-sm-center">
      <?php include 'menu.php';?>
    <h2 class="mb-3">Olá, <?= $_SESSION['email']?> </h2>
        <div class="col-5">
     <div class="card text-bg-primary mb-3" >
        
    
  <div class="card-header"></div>
  
  <div class="card-body">
    <h5 class="card-title">Alunos Por Curso:</h5>
      <div>
          <div id="piechart" style="width: 600px; height: 500px;"></div>

      </div>
</div>
</div>
</div>


  <div class="col-5">
     <div class="card text-bg-primary mb-3" >
        
    
  <div class="card-header"></div>
  
  <div class="card-body">
    <h5 class="card-title">Bairros com mais Alunos:</h5>
      <div>
    <div id="barchart_values" style=" height: 500px;"></div>
      </div>
</div>
     </div>
  </div>
    </div>
    </body>
    </html>

    


