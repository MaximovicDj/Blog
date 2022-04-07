$(function(){
  $("#sendContact").click(function(){
    $.ajax({
      url:"admin/ajax/contact/contact.php?option=addContact",
      type:"POST",
      data:new FormData(document.getElementById('contactForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          $("#contactResponse").html("<p class='alert alert-success'>"+obj.success+"</p>");
          $("input").val("");
          $("textarea").val("");
        }
        else{
          $("#contactResponse").html("<p class='alert alert-danger'>"+obj.error+"</p>");
        }
      },
      beforeSend:function(response){
        if($("#user_name").val() == ""){
          $("#contactResponse").html("<p class='alert alert-danger'>Field name is required</p>");
          return false;
        }
        if($("#email").val() == ""){
          $("#contactResponse").html("<p class='alert alert-danger'>Field email is required</p>");
          return false;
        }
        if($("#text").val() == ""){
          $("#contactResponse").html("<p class='alert alert-danger'>Field text is required</p>");
          return false;
        }
      }
    });
  });

  $(document).on('click', '[data-role=makeSeen]', function(){
    $.ajax({
      url:"ajax/contact/contact.php?option=markAsRead",
      type:"POST",
      data:{id:$(this).data("id")},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          location.reload();
        }
        else{
          alert(obj.error);
        }
      },
      beforeSend:function(response){
        if(!confirm("Are you sure you want to mark as read?")) return false;
      }
    });
  });

});
