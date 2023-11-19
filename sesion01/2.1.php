<?php
    $divide=null;
    $dividendo=0;
    $divisor=0;
    echo "Introduce primer valor (dividendo): ";
    $dividendo = fgets(STDIN);
    echo"Introduce segundo valor (divisor): ";
    $divisor = fgets(STDIN);
    function divide($dividendo,$divisor){
        if($divisor==0){
            echo "valor: " ;
            echo "null \n";
        }else{
            echo "valor: " ;
            echo $dividendo/$divisor;
            echo "\n";
        }
    }
    divide($dividendo,$divisor);
?>