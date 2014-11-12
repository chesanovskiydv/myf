<?php 
session_start();

$width = 300;				//������ �����������
$height = 60;				//������ �����������
$fontSize = 16;   			//������ ������
$letAmount = 6;				//���������� ��������, ������� ����� �������
$fonLetAmount = 100;		//���������� �������� �� ����
$font = "font/cour.ttf";	//���� � ������
 
//����� ��������
$letters = array("a","b","c","d","e","f","g","h","i","j","k");		
//�����
$colors = array("90","110","130","150","170","190","210");	
 
$src = imagecreatetruecolor($width,$height);	//������� �����������				
$fon = imagecolorallocate($src,255,255,255);	//������� ���
imagefill($src,0,0,$fon);						//�������� ����������� �����
 
for($i=0;$i < $fonLetAmount;$i++)			//��������� �� ��� �������
{
	//��������� ����
   	$color = imagecolorallocatealpha($src,rand(0,255),rand(0,255),rand(0,255),100);	
   	//��������� ������
   	$letter = $letters[rand(0,sizeof($letters)-1)];	
	//��������� ������								
   	$size = rand($fontSize-1,$fontSize+1);											
   	imagettftext($src,$size,rand(0,45),
	   	rand($width*0.1,$width-$width*0.1),
		rand($height*0.2,$height),$color,$font,$letter);
}
 
for($i=0;$i < $letAmount;$i++)		//�� �� ����� ��� �������� ����
{
   $color = imagecolorallocatealpha($src,$colors[rand(0,sizeof($colors)-1)],
   		$colors[rand(0,sizeof($colors)-1)],
   		$colors[rand(0,sizeof($colors)-1)],rand(20,40)); 
   $letter = $letters[rand(0,sizeof($letters)-1)];
   $size = rand($fontSize*2-2,$fontSize*2+2);
   $x = ($i+6)*$fontSize + rand(1,5);		//���� ������� ������� ��������� ��������
   $y = (($height*2)/3) + rand(0,5);							
   $cod[] = $letter;   						//���������� ���
   imagettftext($src,$size,rand(0,15),$x,$y,$color,$font,$letter);
}
 
//$cod = implode("",$cod);					//��������� ��� � ������
$_SESSION['secpic'] = implode('',$cod);
 
header ("Content-type: image/gif"); 		//������� ������� ��������
imagegif($src); 
?>