<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="style.css" rel="stylesheet">
 
</head>
<html>
<body>
<h1 style="text-align:center;">Калькулятор расчета плитки</h1>
<form action="" method="post">
    <input type='text' name='room_length' placeholder='Длина комнаты, м. (например, 5.2)' class="form-control" /> <br />
     <input type='text' name='room_width' placeholder='Ширина комнаты, м. (например, 2.5)' class="form-control" /> <br />
    <input type='text' name='tile_length' placeholder='Длина плитки, см.' class="form-control" /> <br />
    <input type='text' name='tile_width' placeholder='Ширина плитки, см.' class="form-control"/> <br />
    <input type='text' name='price' placeholder='Стоимость плитки, грн. за м2' class="form-control"/> <br />
    <input type='submit'name='Calculation' value='Посчитать' class='btn btn-success btn-sm'/>
</form>

</div>

<?php
class Calculation{
function Multiply_Room_Size($room_length, $room_width){
echo "<div class='alert alert-warning' role='alert'>Площадь вашей комнаты:".round(($room_length*$room_width), 2)." м2<br></div>";
}
function Multiply_Tile_Dimentions($room_length, $room_width, $tile_length, $tile_width){
echo "<div class='alert alert-info' role='alert'>Необходимо плиток при укладке первой стороной:".ceil(($room_length/($tile_length/100))) * ceil(($room_width/($tile_width/100)))."  шт.<br></div>";
}

//function Divide($room_length, $room_width, $tile_length, $tile_width){
//echo (($room_length*$room_width)/($tile_length*$tile_width))."<br>";
//}

//в зависимости от укладки - 2 варианта
// диагональная укладка
function Multiply_Tile_Dimentions_Width($room_length, $room_width, $tile_length, $tile_width){
echo "<div class='alert alert-info' role='alert'>Необходимо плиток при укладке второй стороной:".ceil(($room_length/($tile_width/100))) * ceil(($room_width/

($tile_length/100)))." шт.<br></div>";
}

function Multiply_Tile_Dimentions_Diagonal($room_length, $room_width, $tile_length, $tile_width){
echo "<div class='alert alert-info' role='alert'>Необходимо плиток при диагональной укладке:".ceil((($room_length/($tile_length/100))*(1.10)) * ceil

(($room_width/($tile_width/100))*(1.10)))."

шт.<br></div>";
}

function Price($room_length, $room_width, $tile_length, $tile_width, $price){
echo "<div class='alert alert-success' role='alert'>Стоимость при укладке первой стороной:".ceil(100/((($tile_length*$tile_width))/100))*($price)." 
грн.<br></div>";
}

function Price_Width($room_length, $room_width, $tile_length, $tile_width, $price){
echo "<div class='alert alert-success' role='alert'>Стоимость при укладке второй стороной:".ceil(100/((($tile_width*$tile_length))/100))*($price)."
грн.<br></div>";
}

function Price_Diagonal($room_length, $room_width, $tile_length, $tile_width, $price){
echo "<div class='alert alert-success' role='alert'>Стоимость при диагональной укладке:".ceil(100/((($tile_length*$tile_width))/100))*($price*1.10)." грн.<br></div>";
}
}

?>

<?php
if(isset($_POST['Calculation'])){
$room_length=$_POST['room_length'];
$room_width=$_POST['room_width'];
$tile_length=$_POST['tile_length'];
$tile_width=$_POST['tile_width'];
$price=$_POST['price'];
//var_dump('b0'.$price);
$room_length=str_replace(",",".",$room_length);
$room_width=str_replace(",",".",$room_width);
$price=str_replace(",",".",$price);
//var_dump('b1'.$price);
if(empty($room_length) or !($room_width) or !($tile_length) or !($tile_width) or !($price)){
echo "<div class='alert alert-warning' role='alert' style='color:#bf1010;'>Заполните все поля</div>";
}else{
//echo "$room_length, $room_width, $tile_width, $tile_length, $price";

$cal=new Calculation;
$cal->Multiply_Room_Size($room_length, $room_width);
$cal->Multiply_Tile_Dimentions($room_length, $room_width, $tile_length, $tile_width);
$cal->Multiply_Tile_Dimentions_Width($room_length, $room_width, $tile_length, $tile_width);
$cal->Multiply_Tile_Dimentions_Diagonal($room_length, $room_width, $tile_length, $tile_width);
//$cal->Divide($room_length, $room_width, $tile_length, $tile_width);
$cal->Price($room_length, $room_width, $tile_length, $tile_width, $price);
$cal->Price_Width($room_length, $room_width, $tile_length, $tile_width, $price);
$cal->Price_Diagonal($room_length, $room_width, $tile_length, $tile_width, $price);
//var_dump($cal);
}
}

?>
<div><p style="text-align:center;">Ivan G. April 2017</p></div>
</body>
</html>


