<!DOCTYPE html>
<html>
<head>
  <title>Calculator</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<div class="calculatorStyle">

  <div class="col1">
    
    <!--Start for calculator  -->	
    <div class="form-group ">
    <label class="d-block pb-2">Enter Expression<span class='asterik'>*</span></label>
    <input type="text" class="form-control" name="math_input" id="math_input"  value="">
    <div class="errorMessage" id="error_msg" style="display:none;">required</div>    
    </div>

    <div class="form-group">
    <label class="d-block pb-2">Result</label>
    <div class="reasultBox" id="cal_result"></div>
    <div id="success_msg" style="display:none;"></div>
    </div>
    <button type="button" class="btn-success" onClick="action_calculate('calculate')">Calculate</button>
    <button type="button" class="btn-success" onClick="action_save('save')">Save</button>  
    <button type="button" class="btn-success" onClick="action_reset()">Reset</button>  
    
    <!--End for calculator  -->
  </div>

  <div class="col2">
    <!--Start for stored calculations listing -->
    <div id="list_cal">

    
    </div>
    <!--End for stored calculations listing -->
  </div>
  
  </div>

</body>
</html>

<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>