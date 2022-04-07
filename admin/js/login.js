$(document).ready(function(){

  //Login button, action for login
  $("#loginBtn").click(function(){

    $.ajax({
      url:"ajax/login/login.php?option=login",
      type:"POST",
      data: new FormData(document.getElementById('loginForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          window.location.assign(obj.success);
        }
        else {
          $("#loginResponse").html("<p class='alert alert-danger'>"+obj.error+"</p>");
        }
      },
      error:function(xhr){
        alert(xhr.status + " " + xhrm.statusText);
      },
      beforeSend:function(response){
        if($("#email").val() == ""){
          $("#loginResponse").html("<p class='alert alert-danger'>Field email is required!</p>");
          return false;
        }
        if($("#password").val() == ""){
          $("#loginResponse").html("<p class='alert alert-danger'>Field password is required!</p>");
          return false;
        }
      }
    });

  }); // end login function


  //registration
  $("#registerBtn").click(function(){

    $.ajax({
      url:"ajax/login/login.php?option=register",
      type:"POST",
      data: new FormData(document.getElementById('registerForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          window.location.assign(obj.success);
        }
        else {
          $("#registerResponse").html("<p class='alert alert-danger'>" + obj.error + "</p>");
        }
      },
      error:function(xhr){
        alert(xhr.status + ' ' + xhr.statusText)
      },
      beforeSend:function(response){
        if($("#first_name").val() == ""){
          $("#registerResponse").html("<p class='alert alert-danger'>Field name is required</p>");
          return false;
        }
        if($("#last_name").val() == ""){
          $("#registerResponse").html("<p class='alert alert-danger'>Field last name is required</p>");
          return false;
        }
        if($("#email").val() == ""){
          $("#registerResponse").html("<p class='alert alert-danger'>Field email is required</p>");
          return false;
        }
        if($("#password").val() == ""){
          $("#registerResponse").html("<p class='alert alert-danger'>Field password is required</p>");
          return false;
        }
        if($("#confirm_password").val() == ""){
          $("#registerResponse").html("<p class='alert alert-danger'>You have to confirm password</p>");
          return false;
        }
      }
    });//end ajax register function

  });// end register button


  //NEW Password
  $("#newPass").click(function(){
    $.ajax({
      url:"ajax/login/login.php?option=newPass",
      type:"POST",
      data:new FormData(document.getElementById('newPasswordForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          window.location.assign(obj.success);
        }
        else {
          $("#newPasswordRep").html("<p class='alert alert-danger'>"+obj.error+"</p>");
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      },
      beforeSend:function(response){
        if($("#email").val() == ""){
          $("#newPasswordRep").html("<p class='alert alert-danger'>Field email is required</p>");
          return false;
        }
        if($("#password").val() == ""){
          $("#newPasswordRep").html("<p class='alert alert-danger'>Field password is required</p>");
          return false;
        }
        if($("#confirm_password").val() == ""){
          $("#newPasswordRep").html("<p class='alert alert-danger'>You have to confirm password</p>");
          return false;
        }
      }
    });
  });
  //END new Password

});//end document.ready function
