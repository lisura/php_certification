<?php

function 1doEach($n){
    if($n>0){
        1doEach(--n);
        echo ".";
    }else{
        return $n;
    }
}

1doEach(4);
