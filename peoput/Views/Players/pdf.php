<?php
$community = $_POST['community'];
$name = $_POST['name'];
$age = $_POST['age'];
$sex = $_POST['sex'];
$feature = $_POST['feature'];
$remarks = $_POST['remarks'];
$others = $_POST['others'];

?>
<?php
include "./tcpdf/tcpdf.php";

$tcpdf = new TCPDF();
$tcpdf->AddPage();

$tcpdf->SetFont("kozgopromedium", "", 10);

$html = <<< EOF
<style>
h1 {
    font-size: 24px;
    color: #7b6d83;
    text-align: center;
}
p {
    font-size: 12px;
    color: #000000;
    text-align: left;
}
</style>
<h1>peoput search detail<h1>
<p>community : $community</p>
<p>name : $name</p>
<p>age : $age</p>
<p>sex : $sex</p>
<p>feature : $feature</p>
<p>remarks : $remarks</p>
<p>others : $others</p>
EOF;

$tcpdf->writeHTML($html);
$tcpdf->Output('peoput.pdf', 'D'); // 第二引数をDに変更する
?>