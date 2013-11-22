<?php
	function alert($msg,$url=""){
		$location="";
		if($url){$location="location='".base_url().$url."'";}
		echo "<script>alert('$msg');$location</script>";
	}
?>