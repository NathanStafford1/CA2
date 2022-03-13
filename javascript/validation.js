//user id validation starts
function userid_validation(){
    'use strict';
    var userid_name = document.getElementById("userid");
    var userid_value = document.getElementById("userid").value;
    var userid_length = userid_value.length;
    if(userid_length<5 || userid_length>30 )
    {
    document.getElementById('uid_err').innerHTML = 'Value must not be less than 5 characters and greater than 30 characters';
    userid_name.focus();
    document.getElementById('uid_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('uid_err').innerHTML = 'Valid name';
    document.getElementById('uid_err').style.color = "#00AF33";
    }
    }
    //user id validation ends
    //password validation starts
    function passwd_validation(){
    'use strict';
    var passid_name = document.getElementById("passid");
    var passid_value = document.getElementById("passid").value;
    var passid_length = passid_value.length;
    var numbers = /^[0-9]+$/;
    if(!passid_value.match(numbers))
    {
    document.getElementById('passwd_err').innerHTML = 'List price must be a number';
    passid_name.focus();
    document.getElementById('passwd_err').style.color = "#FF0000";
    }
    else
    {
    document.getElementById('passwd_err').innerHTML = 'Valid price';
    document.getElementById('passwd_err').style.color = "#00AF33";
    }
    }
    //password validation ends
    //user name validation starts
    function quantity_validation(){
        'use strict';
        var passid_name = document.getElementById("quantity");
        var passid_value = document.getElementById("quantity").value;
        var passid_length = passid_value.length;
        if(passid_length<0)
        {
        document.getElementById('quantity_err').innerHTML = 'Quantity must be a positive number';
        passid_name.focus();
        document.getElementById('quantity_err').style.color = "#FF0000";
        }
        else
        {
        document.getElementById('quantity_err').innerHTML = 'Valid quantity';
        document.getElementById('quantity_err').style.color = "#00AF33";
        }
        }
    //user name validation ends
    
  
    