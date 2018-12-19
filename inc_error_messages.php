<?php
	if (isset($ErrorMessages) && $ErrorMessages != "") {
		$ErrorArray = explode('|', $ErrorMessages);
		$LobiboxMsg = "";
		foreach($ErrorArray as $item) {
			if ($item != "") {
				$LobiboxMsg .= $item . ', ';
			}
		}
		$LobiboxMsg = substr($LobiboxMsg,0,(strlen($LobiboxMsg)-2)) . ".";
		$flexaction['page_javascript'] .= "
				Lobibox.alert('error', {
					size: 'mini',
					title: 'Errors where encountered.',
					icon: false,
					sound: false,
					msg: '".$LobiboxMsg."'
				});
			";
	}

?>