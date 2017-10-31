<?php

function generatekodepembayaran($length = 6) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

echo  generatekodepembayaran(); 
