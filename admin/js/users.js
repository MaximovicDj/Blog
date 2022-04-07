$(document).ready(function(){

  // deleting user
  $(".deleteUser").click(function(){
    $.ajax({
      url:"ajax/users/users.php?option=delete",
      type:"POST",
      data: {id:$(this).data("id")},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else{
          alert(obj.error);
        }
      },
      error:function(response){
        console.log(xhr.status + ' ' + xhr.statusText);
      },
      beforeSend:function(response){
        if(!confirm("Are you sure you want to delete User?")) return false;
      }
    });
  });
  //END DELETEING USER



  //ADDING NEW USER
  $("#add").click(function(){
    $.ajax({
      url:"ajax/users/users.php?option=add",
      type:"POST",
      data: new FormData(document.getElementById('addUserForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else{
          alert(obj.error);
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      },
      beforeSend:function(response){
        if($("#first_name").val() == ""){
          alert("Field name is required")
          return false;
        }
        if($("#last_name").val() == ""){
          alert("Field last name is required")
          return false;
        }
        if($("#email").val() == ""){
          alert("Field email is required")
          return false;
        }
        if($("#password").val() == ""){
          alert("Field password is required")
          return false;
        }
      }
    });
  });
  //END ADDING NEW USER


  $(".editUser").click(function(){
    let id = $(this).data('id');
    let first_name = $(this).data('first_name');
    let last_name = $(this).data('last_name');
    let email = $(this).data('email');
    let password = $(this).data('password');

    $("#id_edit").val(id);
    $("#first_name_edit").val(first_name);
    $("#last_name_edit").val(last_name);
    $("#email_edit").val(email);
    $("#password_edit").val(password);

    $("#editUserModal").modal('toggle');

  });

  $("#edit").click(function(){
    $.ajax({
      url:"ajax/users/users.php?option=edit",
      type:"POST",
      data: new FormData(document.getElementById('editUserForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else{
          alert(obj.error);
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      }
      // beforeSend:function(response){
      //   if($("#first_name_edit").val() == ""){
      //     alert("Morate uneti ime");
      //     return false;
      //   }
      //   if($("#last_name_edit").val() == ""){
      //     alert("Morate uneti prezime");
      //     return false;
      //   }
      //   if($("#email_edit").val() == ""){
      //     alert("Morate uneti email");
      //     return false;
      //   }
      //   if($("#password_edit").val() == ""){
      //     alert("Morate uneti lozinku");
      //     return false;
      //   }
      // }
    });
  });


}); // END DOCUMENT.READY FUNCTION
