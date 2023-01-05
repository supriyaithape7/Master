// JavaScript Document

/** 
 * Client side validation
 * math_input: Input field to enter value
 * error_msg: To show error message
 */
function validateCal() {
  var valid = true;	
  var math_input = $("#math_input").val(); 

  $("#error_msg").show();

  if(!$("#math_input").val()) {
      $("#error_msg").show();
      $("#error_msg").html("Please enter Expression");
     
      valid = false;

  }else if(! math_input.match(/\d+/)){
        
    $("#error_msg").html("Invalid");    
    valid = false;
  }

 return valid;
}

/** 
 * Showing stored calculations
 * action_show: called function for show stored calculation using Ajax
 * show_calculations: name for action
 */
$(document).ready(function() { //alert();
  action_show('show_calculations');
});

/** 
 * Save input in database by using Ajax
 * action: action name eg. save, delete etc...
 * list_cal: To show updated records
 * setTimeout: Is used for hide success message after some time
 * successMessage: To show success message
 */
function action_save(action) { 

  var val_math_input = $("#math_input").val();

  var valid;	
  valid = validateCal();
  if(valid) {

    $("#error_msg").hide();
                          
          $.ajax({

            type: "POST",
            url: "includes/calculate.php",
            data: {      
              action: action,
              val_math_input: val_math_input
            },
            cache: false,
            success: function(response) {      
            
             var response_arr = response.split("##");

              //alert(response_arr[1]); //return false;  

                if(response_arr[0]==0){          
                  $("#error_msg").show();

                }else{
                  $("#success_msg").html(response_arr[1]);              
                    
                      $("#list_cal").html(response_arr[1]);
                      setTimeout(function(){ 
                        $('.successMessage').stop().fadeOut();
                        }, 3000);             
                }                       
            }

          });  
   }
}

/** 
 * Calculate and to show the result.
 * action: action name eg. save, calculate etc...
 * val_math_input: input field value
 * cal_result: To show the result
 * validateCal: for validation
 */
function action_calculate(action) { 

  var val_math_input = $("#math_input").val();

      var valid;	
      valid = validateCal();
      if(valid) {

              $("#error_msg").hide();               
                          
              $.ajax({

                type: "POST",
                url: "includes/calculate.php",
                data: {     
                  val_math_input: val_math_input,
                  action: action
                },
                cache: false,
                success: function(response) {
              
              // alert(response); return false;                
                  $("#cal_result").html(response);                                   
                }

              }); 
        } 
}

/** 
 * To Delete the particular record from database.
 * action: action name eg. delete_cal, calculate etc...
 * val: calculation_id
 * list_cal: To show updated records
 * setTimeout: Is used for hide success message after some time
 * successMessage: To show success (deleted) message
 */
function action_delete(action, val) { 
       
      $.ajax({

        type: "POST",
        url: "includes/calculate.php",
        data: {     
          action: action,
          calculation_id: val
        },
        cache: false,
        success: function(response) {
      
      //alert(response); return false;   
      var response_arr = response.split("##");
           
          $("#list_cal").html(response_arr[1]);
          setTimeout(function(){ 
            $('.successMessage').stop().fadeOut();
            }, 3000);
          
        }

      });         
}

/** 
 * Showing stored calculations using Ajax
 * action: action name eg. show_calculations, calculate etc...
 * list_cal: To show updated records
*/

function action_show(action) { 
       
  $.ajax({

    type: "POST",
    url: "includes/calculate.php",
    data: {     
      action: action
    },
    cache: false,
    success: function(response) {
  
  //alert(response); return false;        
      $("#list_cal").html(response);      
    }

  });         
}

/** 
 * Clear the input field
 * math_input: input field value entered by the user
 * cal_result: To show the calculation
 * Reset the fields.
*/
function action_reset() {
       
  $("#math_input").val(''); 
  $("#cal_result").html('');  
}