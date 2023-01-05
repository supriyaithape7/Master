<?php
class calculator{		
	
	/** 
	 * save: insert data in json format
	*/
	function save(){			
		$sql_save = "insert into  calculation (  
			input,
			output            
			) values (                       
			'".$this->input."',
            '".$this->output."'
		);";

		//echo $sql_save; exit;
		$strLock="LOCK TABLES calculation WRITE";
		mysqli_query($GLOBALS["___mysqli_ston"], $strLock) or die($strLock);

		$result_save = mysqli_query($GLOBALS["___mysqli_ston"], $sql_save);	
		$calculation_id=((is_null($___mysqli_res = mysqli_insert_id($GLOBALS["___mysqli_ston"]))) ? false : $___mysqli_res);
		
		$strLock="UNLOCK TABLES; ";		
		mysqli_query($GLOBALS["___mysqli_ston"], $strLock) or die($strLock);	
		
		if($result_save)
			$this->status = true;
		else 
			$this->status = false;
				
		//return($this->status);	
	}

	/** 
	 * calculation: TO calculate by using BODMAS rule and return result.
	 * simple arithmetic operations(addition, substraction, multiplication and division only)
	*/		
	function parseEq($eq) {
		$char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
		$achar = array_map('ord', $char);
	
		//echo $eq . PHP_EOL;
	
		// replaceing 2( or 2x with 2* or 2*x
		$eq = preg_replace('/(\d+)([\(a-z])/', "$1*$2", $eq);
		//echo $eq . PHP_EOL;
	
		$eq = str_replace($char, $achar, $eq);
	
		//echo $eq . PHP_EOL;

		return eval(strtr('return {eq};', [
			'{eq}' => strtr($eq, [
				'=' => '==',
			])
		]));
	}

	/** 
	 * displayAll: Get the last Five stored records from database..
	*/	
	function displayAll(){
		$sql_view = "SELECT * FROM calculation ORDER BY calculation_id DESC LIMIT 5"; 
		$result=mysqli_query($GLOBALS["___mysqli_ston"], $sql_view);
		return($result);
	}  

	/** 
	 * delete: To Delete the particular record using id from database and return result.
	*/	
	function delete(){			
		$sql_save = "delete from calculation where calculation_id='".$this->calculation_id."'";     
                $result_save = mysqli_query($GLOBALS["___mysqli_ston"], $sql_save);	
                              
		if($result_save)
			$this->status = true;
		else 
			$this->status = false;

			return($this->status);	
	}	
}
?>