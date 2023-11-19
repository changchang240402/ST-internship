<?php
	function correctSpacing($sentence) {
		$str = preg_replace('/\s+/', ' ', trim($sentence));
		echo $str; 
	}
	$str = "       The film   starts       at      midnight.        ";
	print_r(correctSpacing($str));
?>  