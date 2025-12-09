<?php 
session_start();
include 'menu.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register new element</title>
    
</head>
<body class="bg-light">
    <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-sm-center h-100">
                    <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                        <div class="card shadow-lg">
                        <div class="card-body p-3">
                            <h1 class="fs-4 card-tittle fw-bold mb-1">New Element</h1>
                        
                        <form action="formulario.php" method="POST" class="needs-validation" novalidate="" autocomplete="off">
                          
                        <!--Mensagem de cadastro inicio-->
							<?php 
								if(isset($_SESSION['mensagem'])):
							?>
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<?= $_SESSION['mensagem']; ?>
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
							<?php 
								unset($_SESSION['mensagem']); //limpa a msg após exibir
								endif;
							?>
							<!--Mensagem de cadastro final-->
                        <div class="mb-3">
                            <label for="nome" class="mb-2 text-muted">Nome Completo:</label>
                            <input type="name" id="name" class="form-control " name="name" value="" required autofocus autocomplete>
                            </div>

                            <div class="mb-3">
                                <div class="row g-2">
                                <div class="col-6">
                                    <label for="date" class="mb-2 text-muted">Data Nascimento:</label>
                                    <input type="date" id="date" class="form-control" name="data_nasc" value="" required autofocus>
                                </div>
                                <div class="col-6 ">
                                    <label for="text" class="mb-2 text-muted">CPF:</label>
                                    <input type="text" id="text" class="form-control" name="cpf" value="" required autofocus maxlength="14">
                                </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="mb-2 text-muted">Rua:</label>
                                <input type="address" id="address" class="form-control" name="rua" value="" required autofocus>
                            </div>
                                <div class="mb-3">
                                <label for="address" class="mb-2 text-muted">CEP:</label>
                                <input type="address" id="address" class="form-control" name="cep" value="" required autofocus maxlength="8">
                            </div>

                            <div class="mb-3">
                                <div class="row g-1">
                                <div class="col-4">
                                <label for="address" class="mb-2 text-muted">Cidade:</label>
                                <input type="address" id="address" class="form-control" name="cidade" value="" required autofocus>
                            
                                </div>
                                <div class="col-4">
                                <label for="address" class="mb-2 text-muted">Bairro:</label>
                                <input type="address" id="address" class="form-control" name="bairro" value="" required autofocus>
                                </div>

                                <div class="col-4">
                                <label for="number" class="mb-2 text-muted">Número:</label>
                                <input type="text" id="number" class="form-control" name="number" value="" required autofocus>
                                </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="row g-1">
                                <div class="col-8">
                                <label for="nome" class="mb-2 text-muted">Nome Responsável:</label>
                            <input type="text" id="name" class="form-control " name="name_resp" value="" required autofocus>
                            </div>

                            <div class="col-4">
                                <label for="type" class="mb-2 text-muted">Tipo:</label>
                                <select class="form-select" aria-label="Default select example" name="tipo_resp">
                                <option value="Pai">Pai</option>
                                <option value="Mãe">Mãe</option>
                                <option value="Avó">Avó</option>
                                <option value="Avô">Avô</option>
                                <option value="Outro">Outro</option>
                                </select>
                                
                            </div>
                            </div>
                            </div>

                            <div class="mb-3">
                                <label for="couse" class="mb-2 text-muted">Curso:</label>
                                <select class="form-select" aria-label="Default select example" name="curso">
                                <option value="Administração">Administração</option>
                                <option value="Desenvolvimento de Sistemas">Desenvolvimento de Sistemas</option>
                                <option value="Enfermagem">Enfermagem</option>
                                <option value="Informática">Informática</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                Cadastrar
                            </button>
                            </div>
                            </div>


                        </form>
                        </div>
                    </div>
                </div>

            </div>



    </section>
    	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>
</html>
