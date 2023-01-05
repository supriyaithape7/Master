<?php
require_once("../common/config.inc.php");
require_once("../classes/calculator-cls.inc.php");

$obj_calc = new calculator();

//echo '<pre>';print_r($_POST);
$action = $_POST['action'];
$val_math_input = $_POST['val_math_input'];
$calculation_id = $_POST['calculation_id'];

/** 
 * json_input: Input value convert into json format
*/
$json_input = '{"input": "'.$val_math_input.'"}';

/** 
 * Calculations
 * val_math_input: input value entered by the user
 * parseEq: function for using calculation by using BODMAS rule and get result
 * simple arithmetic operations(addition, substraction, multiplication and division only)
*/
$val_output = $obj_calc->parseEq($val_math_input);

/** 
 * json_output: output value convert into json format
*/
$json_output = '{"output": "'.$val_output.'"}'; //output json format


// Validation for page
function checkvalid($t){
	$flg=1;	
        
          if(trim($_POST['val_math_input'])==""){
            $error="Please enter Expressions";
            $flg=0;			

          }else{
            
          }
          return $flg;
}

/** 
 * flag_return_html: flag set for return ajax return html by perticular action.
*/
$flag_return_html =0;


/** 
 * action save: Action name to save data in DB.
 * checkvalid: To check validation
 * res_flag: 1= Inserted Successfully, 0=Error
 * message: To display the message after any action is completed.
 * flag_return_html: set flag 1 for action done Successfully and display the updated data in response (html)
 * ##: To use ## for concating flag and message for display.
 * action calculate: To calculate using this parseEq and return result.
 * action Delete: To Delete the particular record from database and return result.
 * action show_calculations: Showing stored calculations.
 * 
*/
if($action=='save'){ 

  if(checkvalid(1)){
      $obj_calc->input	= $json_input;	
      $obj_calc->output	= $json_output;

      $result_save = $obj_calc->save(); 
       $res_flag = 1;
      $message = "Inserted Successfully!";    
      $flag_return_html =1; 
  }else{
        $res_flag = 0;
       $message = "Error";      
  }

 echo $res = $res_flag.'##'.'<div class="successMessage pb-3">'.$message.'</div>';

}else if($action=='calculate'){  ## Calculate
  
  echo $result_cal = $obj_calc->parseEq($val_math_input);
  $flag_return_html =0;

}else if($action=='delete_cal'){ ## Delete

  $obj_calc->calculation_id=$calculation_id;	 	
  $result_del = $obj_calc->delete();  
  $message = "Deleted Successfully!";   

  echo $res = $result_del.'##'.'<div class="successMessage pb-3">'.$message.'</div>';
  $flag_return_html =1;

}else if($action=='show_calculations'){  ## Show Calculations
  
}
/** 
 * displayAll: Display the last Five stored calculations from database.
*/
$res_calculations = $obj_calc->displayAll();
$num_calculations	= mysqli_num_rows($res_calculations);

if($action=='show_calculations' || $flag_return_html==1){ 
?>
<table class="table table-striped">
<thead>
<tr>
	<th class="col-xl-3">Input</th>
	<th>Output</th>                          
	<th class="text-center"><div class="td_action">Action</div></th>
</tr>
</thead>
<tbody>
              <?php
								$i=0;
								while ($rec = mysqli_fetch_array($res_calculations,  MYSQLI_ASSOC)){
									$calculation_id	= $rec["calculation_id"];
									$json_input	= json_decode($rec["input"]);
									$cal_input = $json_input->input;

									$json_output = json_decode($rec["output"]);
									$cal_output	= $json_output->output;								
							?>
                  <tr>
                    <td><div><?=$cal_input?></div></td>
                    <td><div><?=$cal_output?></div></td>
                    <td>
                      <div class="td_action">                              
                    <button class="btn btn-rounded btn-icon btn-del-row" onClick="action_delete('delete_cal', '<?=$calculation_id?>')">
                      <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </button>
                      </div>
                    </td>
                  </tr>

                  <?php  $i++; }
                    if($num_calculations==0){ ?>

                      <tr align="center">
                      <td  colspan="7" align="center"><div style="text-align:center; font-weight:bold;">No records available</div></td>
                      </tr>
            <?php } ?>

	</tbody>
</table>
<?php } ?>



