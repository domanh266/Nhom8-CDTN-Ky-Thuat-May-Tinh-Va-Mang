<?php 

	function layFormOption($data, $selected) {
		foreach($data as $val) {
			$id = $val->id;
			$ten = $val->ten;
			if($id == $selected)
				echo "<option value='$id' selected='selected'>$ten</option>";
			else
				echo "<option value='$id'>$ten</option>";
		}
	}

?>