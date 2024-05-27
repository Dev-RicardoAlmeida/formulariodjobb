<?php
require_once('TCPDF/tcpdf.php');

$pdf = new TCPDF();

function recebeDadosContaJudicial()
{
    global $radio_Tipo_Conta_Judicial, $numero_Conta_Judicial1, $numero_Processo, $tribunal;    //variáveis obrigatórias
    global $numero_Conta_Judicial2, $numero_Conta_Judicial3;    //variáveis opcionais
    global $htmlDadosContaJudicial;     //texto a ser escrito no pdf

    $radio_Tipo_Conta_Judicial = $_POST['radio_Tipo_Conta_Judicial'];
    $numero_Conta_Judicial1 = $_POST['numero_Conta_Judicial1'];
    $numero_Processo = $_POST['numero_Processo'];
    $tribunal = $_POST['tribunal'];
    $contasJudiciais = $numero_Conta_Judicial1;
    if(isset($_POST['numero_Conta_Judicial2']) && $_POST['numero_Conta_Judicial2'] != ""){
        $numero_Conta_Judicial2 = $_POST['numero_Conta_Judicial2'];
        $contasJudiciais .= "   / $numero_Conta_Judicial2";
    }
        
    if(isset($_POST['numero_Conta_Judicial3']) && $_POST['numero_Conta_Judicial3'] != ""){
        $numero_Conta_Judicial3 = $_POST['numero_Conta_Judicial3'];
        $contasJudiciais .= "   / $numero_Conta_Judicial3";
    }
    
    $htmlDadosContaJudicial = "<h4>Dados da Conta Judicial</h4>
    <p>Tipo de Conta Judicial: $radio_Tipo_Conta_Judicial<br>
Conta Judicial: $contasJudiciais<br>
Número do Processo: $numero_Processo<br>
Tribunal: $tribunal</p>";
}

function recebeDadosPessoaisBeneficiario()
{
    global $nome_Beneficiario, $cpf_cnpj_Beneficiario, $htmlDadosPessoaisBeneficiario;

    $nome_Beneficiario = $_POST['nome_Beneficiario'];
    $cpf_cnpj_Beneficiario = $_POST['cpf_cnpj_Beneficiario'];

    $htmlDadosPessoaisBeneficiario = "<h4>Dados Pessoais do Beneficiário</h4>
<p>Nome: $nome_Beneficiario <br>
CPF ou CNPJ: $cpf_cnpj_Beneficiario</p>";
}

function recebeDadosBancariosBeneficiario()
{
    global $banco_Beneficiario, $agencia_Beneficiario, $conta_Beneficiario, $tipo_conta_Beneficiario, 
    $tipo_Valor_Beneficiario, $valor_Reais_Beneficiario, $valor_Porcentagem_Beneficiario;
    global $htmlDadosBancariosBeneficiario;

    $banco_Beneficiario = $_POST['banco_Beneficiario']; $agencia_Beneficiario = $_POST['agencia_Beneficiario'];
    $conta_Beneficiario = $_POST['conta_Beneficiario']; $tipo_conta_Beneficiario = $_POST['tipo_conta_Beneficiario'];
    $tipo_Valor_Beneficiario = $_POST['tipo_Valor_Beneficiario']; $valor_Reais_Beneficiario = $_POST['valor_Reais_Beneficiario'];
    $valor_Porcentagem_Beneficiario = $_POST['valor_Porcentagem_Beneficiario'];
    $valor = "";
    if(isset($tipo_Valor_Beneficiario ) && $tipo_Valor_Beneficiario === 'Valor Parcial'){
        if($valor_Reais_Beneficiario != ''){
            $valor = "<br> " . $valor_Reais_Beneficiario;
        }else{
            $valor = "<br> " . $valor_Porcentagem_Beneficiario;
        }
    }
    $valor .= "</p>";

    $htmlDadosBancariosBeneficiario = "<h4>Dados Bancários do Beneficiário</h4>
<p>Banco: $banco_Beneficiario<br>
Agência: $agencia_Beneficiario<br>
Conta: $conta_Beneficiario<br>
Tipo de conta: $tipo_conta_Beneficiario<br>
Valor: $tipo_Valor_Beneficiario" . $valor;
}//Esta função deve ter sua chamada condicionada!!!

function recebeDadosPessoaisProcurador()
{
    global $nome_Procurador, $cpf_cnpj_Procurador, $htmlDadosPessoaisProcurador;

    $nome_Procurador = $_POST['nome_Procurador'];
    $cpf_cnpj_Procurador = $_POST['cpf_cnpj_Procurador'];

    $htmlDadosPessoaisProcurador = "<h4>Dados Pessoais do Procurador</h4>
<p>Nome: $nome_Procurador <br>
CPF ou CNPJ: $cpf_cnpj_Procurador</p>";
}//Esta função deve ter sua chamada condicionada!!!

function recebeDadosBancariosProcurador()
{
    global $banco_Procurador, $agencia_Procurador, $conta_Procurador, $tipo_conta_Procurador, 
    $tipo_Valor_Procurador, $valor_Reais_Procurador, $valor_Porcentagem_Procurador;
    global $htmlDadosBancariosProcurador;

    $banco_Procurador = $_POST['banco_Procurador']; $agencia_Procurador = $_POST['agencia_Procurador'];
    $conta_Procurador = $_POST['conta_Procurador']; 
    if(isset($_POST['tipo_conta_Procurador']))
        $tipo_conta_Procurador = $_POST['tipo_conta_Procurador'];
    else
        $tipo_conta_Procurador = "";
    
    if(isset($_POST['tipo_Valor_Procurador']))
        $tipo_Valor_Procurador = $_POST['tipo_Valor_Procurador'];
    else
        $tipo_Valor_Procurador = "";
    
    $valor_Reais_Procurador = $_POST['valor_Reais_Procurador'];
    
    $valor_Porcentagem_Procurador = $_POST['valor_Porcentagem_Procurador'];
    $valor = "";
    if(isset($tipo_Valor_Procurador ) && $tipo_Valor_Procurador === 'Valor Parcial'){
        if($valor_Reais_Procurador != ''){
            $valor = "<br> " . $valor_Reais_Procurador;
        }else{
            $valor = "<br> " . $valor_Porcentagem_Procurador;
        }
    }
    $valor .= "</p>";

    $htmlDadosBancariosProcurador = "<h4>Dados Bancários do Procurador</h4>
<p>Banco: $banco_Procurador<br>
Agência: $agencia_Procurador<br>
Conta: $conta_Procurador<br>
Tipo de conta: $tipo_conta_Procurador<br>
Valor: $tipo_Valor_Procurador" . $valor;
}//Esta função deve ter sua chamada condicionada!!!

function recebeDadosContato()
{
    global $telefone, $email, $local, $data, $htmlDadosContato;

    $telefone = $_POST['telefone']; $email = $_POST['email'];
    $local = $_POST['local']; $dataForm = $_POST['data'];
    $dataForm = DateTime::createFromFormat('Y-m-d', "$dataForm");
    $data = $dataForm->format('d/m/Y');

    $htmlDadosContato = "<h4>Dados para Contato</h4>
<p>Telefone: $telefone  E-mail: $email<br>
Local: $local   Data: $data</p>";
}

recebeDadosContaJudicial();
recebeDadosPessoaisBeneficiario();

recebeDadosBancariosBeneficiario();
recebeDadosContato();

$htmlCabecalho = "<h2>Formulário de Solicitação para Resgate de Depósito Judicial</h2>";

$pdf->setFont("times");
$pdf->setPrintHeader(false);
$pdf->AddPage();

$pdf->Image('../img/bb-logo.jpg', 19.0, 10.5, 12.0, 12.0, 'JPG', '', '', false, 150, '', false, false, 0, false, false, false);

$pdf->writeHTMLCell(0,0,22.0, 12.0, $htmlCabecalho, 0 ,1, false, true, "C", true);

$pdf->Ln();

//AQUI É ONDE COMEÇA A IMPRIMIR OS DADOS DO FORMULÁRIO ***
$pdf->writeHTMLCell(
    0, //largura
    0, //altura
    null,   //x
    null,   //y
    $htmlDadosContaJudicial, //string
    1, //borda
    1, //line next
    false); //preenchimento

$pdf->Ln(5.0);

$pdf->writeHTMLCell(0, 0, null, null, $htmlDadosPessoaisBeneficiario, 1, 1, false); 
$pdf->Ln(5.0);

$pdf->writeHTMLCell(0, 0, null, null, $htmlDadosBancariosBeneficiario, 1, 1, false); 
$pdf->Ln(5.0);

if(isset($_POST['creditoProcurador'])){
    recebeDadosPessoaisProcurador();
    $pdf->writeHTMLCell(0, 0, null, null, $htmlDadosPessoaisProcurador, 1, 1, false);
    $pdf->Ln(5.0);
    recebeDadosBancariosProcurador();
    $pdf->writeHTMLCell(0, 0, null, null, $htmlDadosBancariosProcurador, 1, 1, false);
    $pdf->Ln(5.0);
}

$pdf->writeHTMLCell(0, 0, null, null, $htmlDadosContato, 1, 1, false);

$campoAssinatura = 
"_______________________________________________________________
Assinatura do(a) Beneficiário(a) ou Procurador(a)";

$pdf->MultiCell(0, 0, $campoAssinatura, 0, "C", false, 0, 22.0, 265.0);


if(isset($_POST["isentoIR"])){
    escreveDeclaracaoIsencao() ;
}


function escreveDeclaracaoIsencao()
{
    global $pdf, $nome_Beneficiario, $cpf_cnpj_Beneficiario, $numero_Processo, $tribunal, $local, $data;
    $pdf->AddPage();
    $pdf->writeHTMLCell(0,0,22.0, 52.0, "<b>DECLARAÇÃO DE ISENÇÃO DE IMPOSTO DE RENDA<b>", 0 ,1, false, true, "C", true);
    $pdf->writeHTMLCell(0, 0, 22.0, 57.0, "<b>DEPÓSITO JUDICIAL<b>", 0 ,1, false, true, "C", true);
    $pdf->writeHTMLCell(0, 0, 22.0, 62.0, "Precatório ou Requisição de Pequeno Valor", 0 ,1, false, true, "C", true);

    $corpoDeclaracao = "    $nome_Beneficiario" . " residente ou domiciliado em $local, inscrito no CPF/CNPJ sob nº " . $cpf_cnpj_Beneficiario
    . ", para fins da não retenção do imposto de renda de que trata o art. 27 da Lei nº 10.833, de 29 de dezembro de 2003, sobre rendimentos a serem recebidos em cumprimento de decisão da Justiça, conforme Processo nº " 
    . $numero_Processo . " do " . $tribunal . " pagos pelo BANCO DO BRASIL SA, declara que:";

    $pdf->Ln(20.0);

    $pdf->MultiCell(0, 0, $corpoDeclaracao, 0, "J", false);

    $opcaoDeclaracao = "";
    if(mb_strlen($cpf_cnpj_Beneficiario)>14){
        $opcaoDeclaracao = "( X ) está inscrita no Sistema Integrado de Pagamento de Impostos e Contribuições das Microempresas e das Empresas de Pequeno Porte (Simples Nacional).";
    }else{
        $opcaoDeclaracao = "( X ) o montante R$ _________________ constitui rendimento isento ou não tributável.";
    }

    $pdf->Ln(15.0);
    $pdf->MultiCell(0, 0, $opcaoDeclaracao, 0, "L", false);

    $pdf->Ln(10.0);
    $pdf->MultiCell(0, 0, "    O(a) beneficiário(a) fica ciente de que a falsidade na prestação destas informações o(a) sujeitará, juntamente as demais pessoas que para ela concorrerem, às penalidades previstas na legislação tributária e penal, relativas à falsidade ideológica (art. 299 do Código Penal) e ao crime contra a ordem tributária (art. 1º da Lei nº 8.137, de 27 de dezembro de 1990).", 0, "L", false);
    $pdf->Ln(15.0);
    $pdf->MultiCell(0, 0, "$local, $data", 0, "R", false);
    $pdf->Ln(25.0);
    $pdf->MultiCell(0, 0, "    ____________________________________________________
    Assinatura do(a) Beneficiário(a) ou Representante Legal", 0, "L", false);
    $pdf->Ln(25.0);
    $pdf->MultiCell(0, 0, "    ____________________________________________________
    Abono da Assinatura pela Instituição Financeira", 0, "L", false);
}

$pdf->Output("$nome_Beneficiario Formulario.pdf",'I');
