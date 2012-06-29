<label for="ip">IP:</label>
		<input type="text" name="ip" readonly="readonly" value="<?php
		//GET USER IP ADDRESS - http://tutorialfeed.net/development/geo-targeting-with-php
		function get_ip(){
			if( !empty( $_SERVER['HTTP_CLIENT_IP'] ) ){
				$ip = $_SERVER['HTTP_CLIENT_IP'];}
					elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
				$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
					else{$ip = $_SERVER['REMOTE_ADDR'];}echo $ip;}
				get_ip();
	?>"> (read-only)