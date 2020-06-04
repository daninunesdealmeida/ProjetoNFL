<?php
include '../pdf/mpdf.php';
define('FPDF_FONTPATH', 'font/');

//conexão com banco de dados
$host="localhost";
$user="root";
$pass="";
$banco="americanfootball";
$conexao=mysqli_connect($host,$user,$pass,$banco);

//pesquisar na tabela
$sql=("SELECT * FROM injurie"); //exibe o registro específico
$busca = mysqli_query($conexao, $sql);

$pdf = new mPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(140,10,('Relatório de Injurie'),0,0,"C");
//exibir imagem no pdf
$pdf->Image('bat.png',10,5,18,21,'PNG');
//$pdf->Image('bat.jpg',10,8,22);
$pdf->ln(20); // espaçamento entra linhas de 15 mm

$pdf->SetFont('Arial','B',12);
$pdf->Cell(5, 7,'id',1,0,"C");
$pdf->Cell(44, 7,'nome',1,0,"C");
$pdf->Cell(44, 7, 'local_fratura',1,0,"C");
$pdf->Cell(30, 7, 'id_jogador',1,0,"C");

$pdf->ln(); //nenhum espaçamentos entre linhas

while ($resultado = mysqli_fetch_array($busca)) {

    
    $pdf->Cell(5, 7, $resultado['id'],1,0,"C");
    $pdf->Cell(44, 7, $resultado['nome'],1,0,"C");
    $pdf->Cell(44, 7, $resultado['local_fratura'],1,0,"C");
    $pdf->Cell(30, 7, $resultado['id_jogador'],1,0,"C");

    $pdf->Ln();
    
}

$pdf->Output();
?>