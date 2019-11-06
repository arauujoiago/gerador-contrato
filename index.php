<?php session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>

    <title>Gerador de Contrato</title>
</head>

<body>
    <div class="container" id="c1">
        <div class="text-center">
            <img class="img-fluid" src="images/logo2.png" id="logo">
        </div>
        <?php
        if (isset($_SESSION['msg'])) {
            ?>
            <div class="alert alert-danger" role="alert">
                <?php
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </div>
        <?php
        }
        ?>
        <form method="POST" action="pages/pdf.php">
            <div class="row" id="r2">
                <div class="col-sm">
                    <div class="form-group">
                        <label for="cargo">Cargo:</label>
                        <select class="form-control" name="cargo" id="cargo">
                            <option value="conteudista">Conteudista</option>
                            <option value="revisor">Revisor</option>
                            <option value="rev-abnt">Revisor - ABNT</option>
                            <option value="rev-lpt">Revisor - LPT</option>
                            <option value="rev-lpt/abnt">Revisor - LPT/ABNT</option>
                            <option value="ator">Ator/Atriz</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="form-group">
                        <label for="horas">Carga Horária:</label>
                        <select class="form-control" name="horas" id="horas">
                            <option value="30">30</option>
                            <option value="60">60</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" id="r1">
                <div class="col-sm-6">
                    <label for="cpf">CPF/CNPJ:</label>
                    <div class="form-group input-group" id="divcpf">
                        <input type="text" class="form-control" id="cpf" name="cpf" onkeypress='return SomenteNumero(event)'>
                        <div class="input-group-append">
                            <button type="button" id="buscar-cpf" style="min-width: 100px;" class="btn input-group-text btn-danger"><span id="conteudoBotaoLoading">Preencher</span>
                                <div id="spinLoading" class="spinner-border spinner-border" style="display: none; margin-left: 26px; width: 20px; height: 20px;" role="status">
                                </div>
                            </button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="rg">RG:</label>
                        <input type="text" class="form-control" name="rg" required onkeyup="formatarg(this,event)" onkeypress='return SomenteNumero(event)'>
                    </div>
                </div>
            </div>
            <div class="row" id="r1">
                <div class="col-md-12">


                    <div class="form-group" id="divDisciplina">
                        <label for="disciplina">Disciplina:</label>
                        <input type="text" class="form-control" id="disciplina" name="disciplina" placeholder="Matemática">
                    </div>
                    <div class="form-group" id="divDisciplina2" style="display: none;">
                        <label for="polidisciplina">Múltiplas Disciplinas:</label>
                        <textarea type="text" class="form-control" id="polidisciplina" name="polidisciplina" placeholder="Estratégia Organizacional, 30 horas, nível: Pós-graduação;
Educação Inclusiva, 30 horas, nível: Pós-graduação;
Meios Alternativos de Resolução de Conflitos, 30 horas, nível: Pós-graduação;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" required>
                    </div>
                    <div class="form-group">
                        <label for="nacionalidade">Nacionalidade:</label>
                        <input type="text" class="form-control" name="nacionalidade" required>
                    </div>
                    <div class="form-group">
                        <label for="profissao">Profissão:</label>
                        <input type="text" class="form-control" name="profissao" required>
                    </div>
                    <div class="form-group">
                        <label for="est_civ">Estado Civil:</label>
                        <input type="text" class="form-control" id="est_civ" name="est_civ" required>
                    </div>
                </div>
            </div>
            <label for="cep">CEP:</label>
            <div class="form-row">
                <div class="input-group form-group">
                    <input type="text" class="form-control" name="cep" id="cep" maxlength='8' value='' onkeypress='return SomenteNumero(event)'>
                    <div class="input-group-append">
                        <button type="button" id="buscar-cep" style="min-width: 100px;" class="btn input-group-text btn-danger"><span id="conteudoBotaoLoadingCEP">Preencher</span>
                            <div id="spinLoadingCEP" class="spinner-border spinner-border" style="display: none; margin-left: 26px; width: 20px; height: 20px;" role="status">
                            </div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="rua">Rua:</label>
                        <input type="text" class="form-control" name="rua" required>
                    </div>
                    <div class="form-group">
                        <label for="numero">Número:</label>
                        <input type="text" class="form-control" name="numero" required>
                    </div>
                    <div class="form-group">
                        <label for="complemento">Complemento:</label>
                        <input type="text" class="form-control" name="complemento">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="bairro">Bairro:</label>
                        <input type="text" class="form-control" name="bairro" required>
                    </div>
                    <div class="form-group">
                        <label for="cidade">Cidade:</label>
                        <input type="text" class="form-control" name="cidade" required>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <input type="text" class="form-control" name="estado" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success btn-lg btn-block">Gerar Contrato</button>
        </form>
    </div>
    <script src="js/scripts.js"></script>
    <script>
        $(function() {

            var availableTags = [<?php include("pages/autocomplete.php"); ?>];

            $("#cpf").autocomplete({
                source: availableTags
            });

        });
    </script>
</body>

</html>