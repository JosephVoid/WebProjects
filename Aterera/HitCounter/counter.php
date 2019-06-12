<?php
function counts($ip_addr){
	
	
	@$ipf=file('ip.txt');
	foreach(@$ipf as $ip) {
		$ip_trim=trim($ip);
		if($ip_addr==$ip_trim){
			$found = true;
			break;
		}
		else{
		$found = false;}
	}
	if(@$found==false)
	{
		$filename="counter.txt";
		@$handle=fopen($filename,"r");
		@$fz=filesize("counter.txt");
		@$current= fread($handle,$fz);
		@fclose($handle);
		$current_inc=$current+1;
		
		$handle=fopen($filename,'w');
		fwrite($handle,$current_inc);
		fclose($handle);
		
		$handle=fopen('ip.txt','a');
		fwrite($handle,$ip_addr.PHP_EOL);
		fclose($handle);
		
	}	
	
}

	

?>