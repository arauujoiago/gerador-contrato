<?php
include("../mpdf60/mpdf.php");

session_start();

$pessoa = $_POST['pessoa'];
$cargo = $_POST['cargo'];
$nome = $_POST['nome'];
$nacionalidade = $_POST['nacionalidade'];
$profissao = $_POST['profissao'];
$est_civ = $_POST['est_civ'];
$cpf = $_POST['cpf'];
$cnpj = $_POST['cnpj'];
$rg = $_POST['rg'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$disciplina = $_POST['disciplina'];
$nivel = "Graduação/Pós-Graduação";
$horas = $_POST['horas'];
$ano = date('Y');
$cpf2 = $_POST['cpf2'];
$polidisciplina = $_POST['polidisciplina'];

$html = "
<h2 style='text-align:center'>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</h2>
<p style='text-align:justify'>Pelo presente instrumento particular de prestação de serviços e na melhor forma de direito entre as partes, de um lado o <span style='font-weight: bold;'><strong>Centro integrado para Formação de Executivos</strong></span>, empresa com sede na cidade de Natal, RN, situada na Rua Orlando Silva, 2896 - Capim Macio, inscrita no CNPJ sob o nº 08.241.911/0001-12,
neste ato representada por seu <span style='font-weight: bold;'>Diretor Financeiro</span>, o Sr. <span style='font-weight: bold;'>Oswaldo Guedes de Figueiredo Neto</span>,
inscrito no CPF nº <span style='font-weight: bold;'>876.794.854-53</span>, doravante denominado <strong>CONTRATANTE</strong> e, de outro lado, <span style='font-weight: bold;'>$nome, $nacionalidade,
$profissao, $est_civ, ";

if ($cpf2 == null) {
    if (strlen($cpf) == 11)
        $html .= "CPF: $cpf";
    else
        $html .= "CNPJ: $cpf";
} else {
    $cpf = $cpf2;
    if (strlen($cpf2) == 11)
        $html .= "CPF: $cpf2";
    else
        $html .= "CNPJ: $cpf2";
}

if ($horas == "30")
    $duracao = "20 horas de gravação em estúdio, ou, 4 encontros de 5 horas cada.";
else
    $duracao = "40 horas de gravação em estúdio, ou, 8 encontros de 5 horas cada.";

$html .= ", RG: $rg,</span> residente e domiciliado na <span style='font-weight: bold;'>$rua, $numero, ";

if ($complemento != null && $cargo == "conteudista")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços do(a) professor(a) na elaboração da disciplina $disciplina, nível $nivel, $horas horas, com a finalidade de ser oferecida a distância.</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da disciplina acima referida se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";
else if ($cargo == "conteudista")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços do(a) professor(a) na elaboração da disciplina $disciplina, nível $nivel, $horas horas, com a finalidade de ser oferecida a distância.</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da disciplina acima referida se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";

if ($complemento != null && $cargo == "revisor")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços do(a) professor(a) na revisão da disciplina $disciplina, nível $nivel, $horas horas com, a finalidade de ser oferecida a distância.</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da disciplina acima referida se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";
else if ($cargo == "revisor")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços do(a) professor(a) na revisão da disciplina $disciplina, nível $nivel, $horas horas, com a finalidade de ser oferecida a distância.</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da disciplina acima referida se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";

if ($complemento != null && $cargo == "rev-abnt")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na adequação às normas ABNT da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";
else if ($cargo == "rev-abnt")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na adequação às normas ABNT da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";

if ($complemento != null && $cargo == "rev-lpt")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na revisão de língua portuguesa da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";
else if ($cargo == "rev-lpt")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na revisão de língua portuguesa da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";

if ($complemento != null && $cargo == "rev-lpt/abnt")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na revisão de língua portuguesa e adequação às normas ABNT da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";
else if ($cargo == "rev-lpt/abnt")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O presente contrato tem por objeto a prestação de serviços da professor(a) na revisão de língua portuguesa e adequação às normas ABNT da(s) seguinte(s) disciplina(s):</p>
<p style='text-align:justify'>$polidisciplina</p>
<p style='text-align:justify'>1.2 Parágrafo único. O oferecimento da(s) disciplina(s) acima referida(s) se fará via Internet, computador, televisão ou qualquer outra mídia existente ou que se invente no futuro e que seja considerada adequada ao ensino a distância.</p>

<h3>CLÁUSULA SEGUNDA – DA PRESTAÇÃO DE SERVIÇOS PELO CONTRATADO</h3>
<p style='text-align:justify'>2.1 O(A) CONTRATADO(A) se compromete a cumprir as atividades a seguir discriminadas:</p>";

if ($complemento != null && $cargo == "ator")
    $html .= "$complemento, </span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
    denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>
    
    <h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
    <p style='text-align:justify'>1.1 O objeto deste contrato é a prestação de serviços pelo CONTRATADO(A) para gravação de videoaulas e a consequente CESSÃO DOS DIREITOS DE USO DE IMAGEM das videoaulas referentes ao conteúdo didático de 
    disciplinas a ser utilizada em cursos ministrados pela CONTRATANTE, ou em parceria por ela firmada.</p>
    <p style='text-align:justify'>1.2 As videoaulas, objeto deste contrato, referem-se à compilação do conteúdo produzido para quaisquer disciplinas ou vídeos auxiliares, convertendo esse compilado em aulas gravadas, utilizando recursos 
    como imagens, sons, ilustrações, entre outros, visando proporcionar uma constante reflexão do discente sobre o conteúdo que está estudando.</p>
    <p style='text-align:justify'>1.3 Cada videoaula terá a duração entre 01(um) a 20 (quinze) minutos editados, podendo totalizar até $duracao</p>
    <p style='text-align:justify'>1.4 É responsabilidade do Núcleo de Educação a Distância-NEAD prestar toda a assistência técnica, pedagógica e capacitação profissional (quando couber) necessária ao(a) Professor(a) Autor(a) das videoaulas.</p>
    <p style='text-align:justify'>1.5 Todo o material produzido será considerado aprovado somente após a revisão pedagógica do NEAD.</p>
    <h3>CLÁUSULA SEGUNDA – DO PRAZO DE CONTRATO</h3>
    <p style='text-align:justify'>2.1 Como titular dos direitos autorais do material produzido, objeto do presente contrato, o(a) CONTRATADO(A) cede à CONTRATANTE, total, definitivamente e com exclusividade, pelo prazo indeterminado, 
    renovável em comum acordo entre as partes, o direito de propriedade, cessão dos direitos autorais e de uso da imagem do material supracitado, iniciando-se este prazo na data da assinatura do presente instrumento. 
    A cessão ora contratada é válida para o país, bem como para o exterior.</p><br>
    <p style='text-align:justify; margin-top: 100px;'>2.2 Parágrafo único. A CONTRATANTE poderá, pelo prazo da presente cessão de direito, transferir para outras mídias ou a terceiros os direitos ora cedidos, independentemente de pagamento de qualquer 
    valor ou diferença ao(a) CONTRATADO(A).</p>";

else if ($cargo == "ator")
    $html .= "</span>bairro <span style='font-weight: bold;'>$bairro, $cidade, $estado</span>, doravante
denominado de <strong>CONTRATADO(A)</strong>, têm entre si como justo e contratado o presente Contrato de Prestação de Serviços, que se regerá pelas cláusulas seguintes:</br></p>

<h3>CLÁUSULA PRIMEIRA – DO OBJETO</h3>
<p style='text-align:justify'>1.1 O objeto deste contrato é a prestação de serviços pelo CONTRATADO(A) para gravação de videoaulas e a consequente CESSÃO DOS DIREITOS DE USO DE IMAGEM das videoaulas referentes ao conteúdo didático de 
disciplinas a ser utilizada em cursos ministrados pela CONTRATANTE, ou em parceria por ela firmada.</p>
<p style='text-align:justify'>1.2 As videoaulas, objeto deste contrato, referem-se à compilação do conteúdo produzido para quaisquer disciplinas ou vídeos auxiliares, convertendo esse compilado em aulas gravadas, utilizando recursos 
como imagens, sons, ilustrações, entre outros, visando proporcionar uma constante reflexão do discente sobre o conteúdo que está estudando.</p>
<p style='text-align:justify'>1.3 Cada videoaula terá a duração entre 01(um) a 20 (quinze) minutos editados, podendo totalizar até $duracao</p>
<p style='text-align:justify'>1.4 É responsabilidade do Núcleo de Educação a Distância-NEAD prestar toda a assistência técnica, pedagógica e capacitação profissional (quando couber) necessária ao(a) Professor(a) Autor(a) das videoaulas.</p>
<p style='text-align:justify'>1.5 Todo o material produzido será considerado aprovado somente após a revisão pedagógica do NEAD.</p>
<h3>CLÁUSULA SEGUNDA – DO PRAZO DE CONTRATO</h3>
<p style='text-align:justify'>2.1 Como titular dos direitos autorais do material produzido, objeto do presente contrato, o(a) CONTRATADO(A) cede à CONTRATANTE, total, definitivamente e com exclusividade, pelo prazo indeterminado, 
renovável em comum acordo entre as partes, o direito de propriedade, cessão dos direitos autorais e de uso da imagem do material supracitado, iniciando-se este prazo na data da assinatura do presente instrumento. 
A cessão ora contratada é válida para o país, bem como para o exterior.</p><br>
<p style='text-align:justify; margin-top: 100px;'>2.2 Parágrafo único. A CONTRATANTE poderá, pelo prazo da presente cessão de direito, transferir para outras mídias ou a terceiros os direitos ora cedidos, independentemente de pagamento de qualquer 
valor ou diferença ao(a) CONTRATADO(A).</p>";

////////////////////////////////////////////////////////////////////////

if ($cargo == "rev-abnt") {
    $remuneracao = "R$1,00 (um real)";
    $html .= "<p style='text-align:justify'>2.1.1 Realizar a revisão ABNT de 100% do material didático institucional da(s) disciplina(s) mencionada(s) na Cláusula Primeira:
            <p style='text-align:justify'>$polidisciplina</p>";
}
if ($cargo == "rev-lpt") {
    $remuneracao = "R$4,00 (quatro reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Realizar a revisão de lingua portuguesa de 100% do material didático institucional da(s) disciplina(s) mencionada(s) na Cláusula Primeira:
            <p style='text-align:justify'>$polidisciplina</p>";
}
if ($cargo == "rev-lpt/abnt") {
    $remuneracao = "R$5,00 (cinco reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Realizar a revisão textual, gramatical e ABNT de 100% do material didático institucional da(s) disciplina(s) mencionada(s) na Cláusula Primeira:
            <p style='text-align:justify'>$polidisciplina</p>";
}
if ($horas == "30" && $cargo == "revisor") {
    $remuneracao = "R$500,00 (quinhentos reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Revisar 100% o material didático institucional da disciplina de $disciplina ($horas horas) destinada ao ensino a distância, compreendido por:</p>

            <p>a. Redação Oficial de 06 unidades de aprendizagem com um total máximo de 110 laudas, tendo cada UA em torno de 18 laudas aproximadamente, com todos os tópicos e interações solicitados;<br>
            b. 30 Questões;<br>
            c. 6 Arquivos de PPT;<br>
            d. 9 Roteiros de videoaulas;<br>
            e. 6 Infográficos.</p>";
}
if ($horas == "60" && $cargo == "revisor") {
    $remuneracao = "R$800,00 (oitocentos reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Revisar 100% o material didático institucional da disciplina de $disciplina ($horas horas) destinada ao ensino a distância, compreendido por:</p>

            <p>a.Redação Oficial de 16 unidades de aprendizagem com um total máximo de 300 laudas, tendo cada UA em torno de 18 laudas, aproximadamente, com todos os tópicos e interações solicitados;<br>
            b. 80 Questões (5 para cada UA);<br>
            c. 16 Arquivos de PPT;<br>
            d. 21 roteiros de videoaula (incluindo roteiro de apresentação);<br>
            e. 16 Infográficos.</p>";
}
  $html .= "";
if ($horas == "30" && $cargo == "conteudista") {
    $remuneracao = "R$1.500,00 (mil e quinhentos reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Elaborar o material didático institucional da disciplina de $disciplina ($horas horas) destinada ao ensino a distância, compreendido por:</p>

            <p>a. Redação Oficial de 08 unidades de aprendizagem com um total máximo de 150 laudas, tendo cada UA em torno de 18 laudas aproximadamente, com todos os tópicos e interações solicitados;<br>
            b. 40 Questões;<br>
            c. 8 Arquivos de PPT;<br>
            d. 11 Roteiros de videoaulas;<br>
            e. 8 Infográficos.</p>";
}
if ($horas == "60" && $cargo == "conteudista") {
    $remuneracao = "R$2.500,00 (dois mil e quinhentos reais)";
    $html .= "<p style='text-align:justify'>2.1.1 Elaborar o material didático institucional da disciplina de $disciplina ($horas horas) destinada ao ensino a distância, compreendido por:</p>

            <p>a.Redação Oficial de 16 unidades de aprendizagem com um total máximo de 300 laudas, tendo cada UA em torno de 18 laudas, aproximadamente, com todos os tópicos e interações solicitados;<br>
            b. 80 Questões;<br>
            c. 16 Arquivos de PPT;<br>
            d. 21 roteiros de videoaula (incluindo roteiro de apresentação);<br>
            e. 16 Infográficos.</p>";
}
if ($horas == "30" && $cargo == "ator") {
    $remuneracao = "R$750,00 (setecentos e cinquenta reais)";
}
if ($horas == "60" && $cargo == "ator") {
    $remuneracao = "R$1.500,00 (um mil e quinhentos reais)";
}

if (strlen($cpf) == 11 && $cargo != "ator")
    $html .= "<p style='text-align:justify'>2.2 É dever do(a) CONTRATADO(A) fornecer cópia dos seguintes documentos para o CONTRATANTE: RG, CPF";
else if ($cargo != "ator")
    $html .= "<p style='text-align:justify'>2.2 É dever do(a) CONTRATADO(A) fornecer cópia dos seguintes documentos para o CONTRATANTE: RG, CNPJ";
if ($cargo != "ator")
    $html .= ", PIS, TÍTULO DE ELEITOR e COMPROVANTE DE RESIDÊNCIA.</p>
    <p style='text-align:justify'>2.3 É dever do(a) CONTRATADO(A) emitir e entregar ao CONTRATANTE a Nota Fiscal pela prestação de serviços ora contratada, sendo esta uma condição para o efetivo pagamento da remuneração.</p>
    ";

if ($cargo == "conteudista")
    $html .= "<p style='text-align:justify'>2.4 É dever do CONTRATADO(A) realizar as modificações na disciplina, desde que sugeridas por REVISOR apontado pelo CONTRATANTE, quando cabíveis e justificadas, sendo o CONTRATADO(A) responsável pela manutenção do conteúdo entregue pelo período de 1 ano.</p>
    <p style='text-align:justify'>2.5 Todo o material produzido pelo CONTRATADO(A) passará por revisão de conteúdo e pedagógica. Havendo necessidade de ajustes conceituais, textuais, de roteiros de videoaulas, entre outros, referente ao material, é de responsabilidade do CONTRATADO(A) corrigir dentro do prazo estabelecido pelo CONTRATANTE. </p>
    <p style='text-align:justify'>2.6 O material produzido pelo CONTRATADO(A) só será considerado finalizado após a revisão final do CONTRATANTE.</p>";

if ($cargo == "ator") {
    $html .= "<h3>CLÁUSULA TERCEIRA – OBRIGAÇÕES DO CONTRATANTE</h3>
    <p style='text-align:justify'>3.1 A gravação das videoaulas será realizada em estúdio próprio da CONTRATANTE, localizado no campus CIC na cidade de Natal/RN, ou em local por ela indicado. Estará condicionada ao fechamento de agenda
     do estúdio de vídeos, cumprindo o cronograma de produção de material didático definido pelo NEAD</p>
     <p style='text-align:justify'>3.2 A agenda de gravação das videoaulas será ajustada em comum acordo entre as partes.</p>";
} else {
    $html .= "<h3>CLÁUSULA TERCEIRA – OBRIGAÇÕES DO CONTRATANTE</h3>
<p style='text-align:justify'>3.1 O CONTRATANTE deverá fornecer ao(à) CONTRATADO(A) todas as informações necessárias à realização do serviço, devendo especificar os detalhes necessários à sua perfeita consecução e a forma de como ele deve ser entregue.</p>
<h3>CLÁUSULA QUARTA – DA REMUNERAÇÃO</h3>";
}
if ($cargo == "conteudista")
    $html .= "<p style='text-align:justify'>4.1 O presente serviço será remunerado pela quantia de $remuneracao pela elaboração do conteúdo da disciplina de $disciplina, referente aos serviços efetivamente prestados, devendo ser pago em dinheiro, cheque ou depósito em até 30 dias após a entrega e validação dos serviços prestados, e mediante emissão de Nota Fiscal pelo(a) CONTRATADO(A).</p>";
else if ($cargo == "revisor")
    $html .= "<p style='text-align:justify'>4.1 O presente serviço será remunerado pela quantia de $remuneracao pela revisão do conteúdo da disciplina de $disciplina, referente aos serviços efetivamente prestados, devendo ser pago em dinheiro, cheque ou depósito em até 30 dias após a entrega e validação dos serviços prestados, e mediante emissão de Nota Fiscal pelo(a) CONTRATADO(A).</p>";
else if ($cargo == "rev-lpt" || $cargo == "rev-abnt" || $cargo == "rev-lpt/abnt")
    $html .= "<p style='text-align:justify'>4.1 O presente serviço será remunerado pela quantia de $remuneracao por página revisada, referente aos serviços efetivamente prestados, devendo ser pago em dinheiro, cheque ou depósito, em até 45 dias, após a entrega e validação dos serviços prestados e mediante emissão de RPA pelo CONTRATADO.</p>";
else if ($cargo == "ator")
    $html .= "<h3>CLÁUSULA QUARTA - DA FORMA E DO PRAZO DE PAGAMENTO</h3>
    <p style='text-align:justify'>Pagará a CONTRATANTE a título de direitos contratados ao (à) CONTRATADO(A), o valor de $remuneracao pela transferência dos direitos patrimoniais e de imagem referentes às videoaulas objeto deste 
contrato, de acordo com a Lei 9.610/98, artigos 5º e 7º, por meio de RPA, conforme dispõe a Lei no 8.846/94, artigo 1o, com retenção do Imposto de Renda de acordo com o artigo 45 do Regulamento do Imposto de Renda (RIR) Decreto 3000/99,
 com base na tabela progressiva.</p>
 <p style='text-align:justify'>Parágrafo único. O pagamento ficará condicionado à aprovação, pelo NEAD, das videoaulas em sua versão final.</p>";

if ($cargo != "ator") {
    $html .= "<p style='text-align:justify'>4.2 O pagamento da remuneração poderá ser suspenso com o não cumprimento de qualquer das cláusulas do presente contrato.</p>
<p style='text-align:justify'>4.3 A suspensão do pagamento não suspende, interrompe ou extingue a cessão de direitos autorais prevista em instrumento próprio.</p>
<p style='text-align:justify'>4.4 A rescisão antecipada do presente contrato, mesmo que antes do término da disciplina, não extingue ou revoga a cessão de direitos autorais prevista em instrumento próprio.</p>

<h3>CLÁUSULA QUINTA – TEMPO DA PRESTAÇÃO DOS SERVIÇOS</h3>";

    if ($cargo == "revisor" || $cargo == "rev-lpt" || $cargo == "rev-abnt" || $cargo == "rev-lpt/abnt")
        $html .= "<p style='text-align:justify'>5.1 O período da prestação de serviços seguirá o que estiver indicado no Cronograma de Revisão, que será enviado por e-mail.</p>
    <p style='text-align:justify'>5.2 A alteração de todo e qualquer prazo pode ser realizada mediante a acordo de ambas as partes e aditamento do cronograma ao contrato assinado.</p>
    <p style='text-align:justify'>5.3 A falha no cumprimento das entregas parciais dos materiais por parte do CONTRATADO(A), estabelecidas no cronograma, por um prazo maior que 7 dias, encerra automaticamente o contrato sem ônus para ambas as partes.</p>";
    else
        $html .= "<p style='text-align:justify'>5.1 O período da prestação de serviços seguirá o que estiver indicado no Cronograma de Produção, que será enviado por e-mail juntamente com todos os Formulários de Produção e o Plano de Ensino. O envio desses documentos de produção ocorrerá posteriormente à assinatura desse contrato.</p>
    <p style='text-align:justify'>5.2 A alteração de todo e qualquer prazo pode ser realizada mediante a acordo de ambas as partes e aditamento do cronograma ao contrato assinado.</p>
    <p style='text-align:justify'>5.3 A falha no cumprimento das entregas parciais dos materiais por parte do CONTRATADO(A), estabelecidas no cronograma, por um prazo maior que 7 dias, encerra automaticamente o contrato sem ônus para ambas as partes. </p>";

    $html .= "<h3>CLÁUSULA SEXTA – DA MULTA</h3>
<p style='text-align:justify'>6.1 Em caso do não cumprimento dos prazos estabelecidos no presente contrato, o(a) CONTRATADO(A) fica sujeito a multa contratual de acordo com a tabela abaixo:</p>

<table border='1' style='display: block;  margin-left: 20%; margin-right: 20%;";

    if ($cargo == "revisor")
        $html .= " margin-top: 1000px;";

    $html .= "'>
<tr>
<td>De 1 até 10 dias de atraso:</td>
<td>Desconto de 10% do valor total do contrato.</td>
</tr>
<tr>
<td>Entre 10 e 20 dias de atraso:</td>
<td>Desconto de 25% do valor total do contrato.</td>
</tr>
<tr>
<td>Entre 20 e 30 dias de atraso:</td>
<td>Desconto de 40% do valor total do contrato.</td>
</tr>
<tr>
<td>Acima de 30 dias de atraso:</td>
<td>Rescisão do contrato.</td>
</tr>
</table>

<p style='text-align:justify'>6.2 A cláusula anterior não se aplica à cessão de direitos autorais assinada em instrumento próprio, posto ser definitiva.</p>

<h3>CLÁUSULA SÉTIMA - DA RESCISÃO IMOTIVADA</h3>
<p style='text-align:justify'>7.1 Poderá o presente instrumento ser rescindido por qualquer uma das partes, em qualquer momento, sem que haja qualquer tipo de motivo relevante, não obstante a outra parte deverá ser avisada previamente por escrito, no prazo de 10(dez) dias úteis.</p>
<p style='text-align:justify'>7.2 A rescisão imotivada não extingue ou revoga a cessão de direitos autorais prevista em instrumento próprio. </p>

<h3>CLÁUSULA OITAVA - DAS CONDIÇÕES GERAIS</h3>
<p style='text-align:justify'>8.1 Fica pactuada a total inexistência de vínculo trabalhista entre as partes contratantes, excluindo as obrigações previdenciárias e os encargos sociais, não havendo entre CONTRATADO e CONTRATANTE qualquer tipo de relação de subordinação.</p>
<p style='text-align:justify'>8.2 Salvo com a expressa autorização do CONTRATANTE, não pode o(a) CONTRATADO(A) transferir ou subcontratar os serviços previstos neste instrumento, sob o risco de ocorrer a rescisão imediata.</p>
<p style='text-align:justify'>8.3 O(A) CONTRATADO(A) declara, sob as penas da lei e sob sua inteira e exclusiva responsabilidade, que é o autor e proprietário, integralmente, do conteúdo entregue acima especificado, responsabilizando-se por qualquer dano que venha a causar aos CONTRATANTE.</p>
<p style='text-align:justify'>8.4 Em caso de análise, verificação e conclusão da existência de quaisquer ilegalidades, cópia, plágio e/ou uso de conteúdo de terceiros nos materiais entregues, o(a) CONTRATADO(A) terá o contrato suspenso e o CONTRATANTE não arcará com quaisquer custos ou ônus de qualquer natureza.</p>

<h3 style='margin-top: 1000px;'>CLÁUSULA NONA – DISPOSIÇÕES GERAIS</h3>
<p style='text-align:justify'>9.1 As partes contratantes elegem o foro de Natal/RN para o fim de dirimir quaisquer dúvidas oriundas do presente Contrato.</p>
<p style='text-align:justify'>9.2 E por estarem justas e contratadas, firmam o presente, em duas vias, de igual teor e forma, perante testemunhas, para que produzam seus jurídicos efeitos.</p>

<p style='text-align:center'> </p>
<p style='text-align:center'>Natal, ____ de _______________ de $ano.</p><br><br>
<p style='text-align:center'> </p>
<p style='text-align:center'>______________________________________________________<br>CONTRATADO</p><br><br>
<p style='text-align:center'>______________________________________________________<br>CONTRATANTE</p>
<p style='text-align:center'> </p>

<p>TESTEMUNHAS:</p>

<div id='tabela'>
        <table border='0'>
        <tr>
                <td>1.
                </td>
                <td>
                </td>
                <td style='width: 15px;'>
                </td>2.
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td class='direita'>Nome:
                </td>
                <td>_____________________________________________________
                </td>
                <td>
                </td>
                <td class='direita'>Nome:
                </td>
                <td>_____________________________________________________
                </td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
                <tr>
                    <td class='direita'>CPF.:
                    </td>
                    <td>_____________________________________________________
                    </td>
                    <td>
                    </td>
                    <td class='direita'>CPF.:
                    </td>
                    <td>_____________________________________________________
                    </td>
                </tr>
        </table>
    </div>";

} else {
    $html .= "<h3>CLÁUSULA QUINTA - DA RESCISÃO</h3>
    <p style='text-align:justify'>Este contrato poderá ser rescindido por qualquer uma das partes, sem que haja ônus para ambas, mediante prévia notificação formal e escrita.</p>

    <h3 style='margin-top: 1000px;'>CLÁUSULA SEXTA - DO FORO</h3>
    <p style='text-align:justify'>As partes elegem o Foro da Comarca de Natal/RN, para a solução de dúvidas ou litígios porventura decorrentes deste contrato, com expressa renúncia de qualquer outro, 
    por mais privilegiado que seja. E, por estarem as partes justas e contratadas, assinam o presente instrumento em 2(duas) vias impressas, de igual teor, na presença das testemunhas abaixo nomeadas.</p>
    
    <p style='text-align:center'> </p>
<p style='text-align:center'>Natal, ____ de _______________ de $ano.</p><br><br>
<p style='text-align:center'> </p>
<p style='text-align:center'>______________________________________________________<br>CONTRATADO</p><br><br>
<p style='text-align:center'>______________________________________________________<br>CONTRATANTE</p>
<p style='text-align:center'> </p>

<p>TESTEMUNHAS:</p>

<div id='tabela'>
        <table border='0'>
        <tr>
                <td>
                </td>
                <td>
                </td>
                <td style='width: 15px;'>
                </td>
                <td>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td class='direita'>Nome:
                </td>
                <td>_____________________________________________________
                </td>
                <td>
                </td>
                <td class='direita'>Nome:
                </td>
                <td>_____________________________________________________
                </td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
                <tr>
                    <td class='direita'>CPF.:
                    </td>
                    <td>_____________________________________________________
                    </td>
                    <td>
                    </td>
                    <td class='direita'>CPF.:
                    </td>
                    <td>_____________________________________________________
                    </td>
                </tr>
        </table>
    </div>";
}

$mpdf = new mPDF('pt-br', 'A4', 0, '', 22, 22, 40, 35, 0, 0, 'P');
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("css/stylepdf.css");
$mpdf->WriteHTML($css, 1);
$mpdf->SetDefaultBodyCSS('background', "url('../images/background.jpg')");
$mpdf->SetDefaultBodyCSS('background-image-resize', 6);
$mpdf->WriteHTML($html);
$var = str_replace(" ", "_", $nome);
$mpdf->Output('Contrato_' . $var . '.pdf', 'D');

exit;