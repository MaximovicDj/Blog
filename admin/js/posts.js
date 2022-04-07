$(document).ready(function(){


  //ADDMING NEW POST!
  $("#add").click(function(){
    tinyMCE.triggerSave();
    $.ajax({
      url:"ajax/posts/posts.php?option=add",
      type:"POST",
      data:new FormData(document.getElementById('addPostForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        // alert(response);
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
        if($("#title").val() == ""){
          alert("Field title is required");
          return false;
        }
        if(tinyMCE.activeEditor.getContent() == ""){
          alert("Field text is required");
          return false;
        }
        if($("#category_id").val() == "0"){
          alert("You have to choose category");
          return false;
        }
        if($("#mainImage").val() == ""){
          alert("You have to choose main Image");
          return false;
        }
        if($("#images").val() == ""){
          alert("Youi have to choose more images");
          return false;
        }
      }
    });
  });
  // END ADDING NEW POST;


  //DELETEING POST
  $(".deletePost").click(function(){
    $.ajax({
      url:"ajax/posts/posts.php?option=delete",
      type:"POST",
      data:{id:$(this).data("id")},
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
        if(!confirm("Are you sure you want to delete post?")) return false;
      }
    });
  })
  //END DELETING POST



  //EDTI POST
    $("#editBtn").click(function(){
      tinyMCE.triggerSave();
      let title = $("#title").val();
      let text = $("#text").val();
      let category = $("#category").val();
      let oldImg = $("img#oldImg").attr('src');
      let newImg = $("#newImg").val();
      let images = $("#files").val();
      $.ajax({
        url:"ajax/posts/posts.php?option=edit",
        type:"POST",
        data:new FormData(document.getElementById('editFormPost')),
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
      });
    });
  //END EDTI POST



  //DELETING MULTIPLE IMAGES ON DBLCLICK
  $(document).on("dblclick", '[data-role=deleteMultiple]', function(){
    $.ajax({
      url:"ajax/posts/posts.php?option=deleteMultiple",
      type:"POST",
      data:{id: $(this).data("id"), name:$(this).data("name")},
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
        if(!confirm("Are you sure you want to delete image?")) return false;
      }
    });

  });
  // END DELETING MULTIPLE IMAGES ON DBLCLICK






}); // END DOCUMENT.READY FUNCTION
