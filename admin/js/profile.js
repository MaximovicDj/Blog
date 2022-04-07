$(function(){

  $(document).on('click', '[data-role=editUserProfile]', function(){
    let id = $(this).data("id");
    let first_name = $(this).data("name");
    let last_name = $(this).data("last_name");
    let email = $(this).data("email");
    let password = $(this).data("password");

    $("#first_name").val(first_name);
    $("#last_name").val(last_name);
    $("#email").val(email);
    $("#email").val(email);
    $("#password").val(password);

    $("#edit").click(function(){
      $.ajax({
        url:"ajax/profile/profile.php?option=edit",
        type:"POST",
        data:{id:id, first_name:first_name, last_name:last_name, email:email, password:password},
        success:function(response){
          let obj = JSON.parse(response);
          if(obj.error == ""){
            alert(obj.success);
            location.reload();
          }
          else {
            alert(obj.error);
          }
        },
        error:function(xhr){
          console.log(xhr.status + " " + xhr.statusText);
        },
        beforeSend:function(response){
          if($("#first_name").val() == ""){
            alert("Field name is required");
            return false;
          }
          if($("#last_name").val() == ""){
            alert("Field last name is required");
            return false;
          }
          if($("#email").val() == ""){
            alert("Field email is required");
            return false;
          }
          if($("#password").val() == ""){
            alert("Field password is required");
            return false;
          }
        }
      });
    })
  });

});
