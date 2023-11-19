<?php
function recursive($number) {    
    if($number <= 5 ){    
        echo "$number ";    
        recursive($number+1);    
    }  
}
recursive(1);

