<?php
class Calculation{
function Multiply_Room_Size(){
echo ($room_length*$room_width);
}
function Multiply_Tile_Dimentions(){
echo ($tile_length*$tile_width);
}

function Divide(){
echo ($room_length*$room_width/$tile_length*$tile_width);
}

function Price(){
echo (($room_length*$room_width/$tile_length*$tile_width)*$price);
}
}
?>