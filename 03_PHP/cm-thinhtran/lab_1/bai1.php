<?php
	function recursive($count){
		if($count < 10){
			echo "call recursive turn $count\n";
			return recursive(++$count);
		}
		echo "final count value: ".$count;
	}

	$count = 0;
	recursive($count);
?>