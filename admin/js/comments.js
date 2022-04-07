$(function(){

  // ADD NEW COMMENT
  $(document).on('click', '[data-role=addComment]', function(){
    let id = $(this).data('id');
    let name = $("#comment_name").val();
    let email = $("#comment_email").val();
    let comment = $("#comment_text").val();

    $.ajax({
      url:"admin/ajax/comments/comments.php?option=add",
      type:"POST",
      data:{id:id, name:name, email:email, comment:comment},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload()
        }
        else {
          alert(obj.error);
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      },
      beforeSend:function(response){
        if(name == ""){
          alert("Field name is required");
          return false;
        }
        if(comment == ""){
          alert("Field comment is required");
          return false;
        }
      }
    });
  });
  //END ADD NEW COMMENT


  // DELETEING COMMENT
  $(".deleteComment").click(function(){
    $.ajax({
      url:"admin/ajax/comments/comments.php?option=delete",
      type:"POST",
      data:{id:$(this).data("id")},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else {
          obj.error;
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      },
      beforeSend:function(response){
        if(!confirm("Are your sure you want to delete Comment?")) return false;
      }
    });

  });
  //END DELETING COMMENT

});
