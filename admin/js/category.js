$(function(){

  //delete Category
  $(".delete").click(function(){

    $.ajax({
      url:"ajax/category/category.php?option=delete",
      type:"POST",
      data:{id: $(this).data("id")},
      cache:false,
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
        if(!confirm("Are your sure your want to delete Category?")) return false;
      }
    });

  });// end delete Category


  //add new  category
  $("#add").click(function(){
    $.ajax({
      url:"ajax/category/category.php?option=add",
      type:"POST",
      data: new FormData(document.getElementById('categoryForm')),
      processData:false,
      contentType:false,
      cache:false,
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else {
          console.log(obj.error);
        }
      },
      error:function(xhr){
        alert(xhr.status + ' ' + xhr.statusText)
      },
      beforeSend:function(response){
        if($("#name").val() == ""){
          return false;
        }
      }
    });
  }); // end add category



  //edit category, update
  $(document).on('click', 'span[data-role=editCat]', function(){
    let id = $(this).data("id");
    let name = $("#"+id).children('td[data-target=name]').text();

    $("#editId").val(id);
    $("#editName").val(name);
    $("#editModal").modal('toggle');

  });

  $("#edit").click(function(){

    let catId = $("#editId").val();
    let catName = $("#editName").val();

    $.ajax({
      url:"ajax/category/category.php?option=edit",
      type:"POST",
      data:{id:catId, name:catName},
      success:function(response){
        let obj = JSON.parse(response);
        if(obj.error == ""){
          alert(obj.success);
          location.reload();
        }
        else{
          alert(obj.error);
          return false;
        }
      },
      error:function(xhr){
        console.log(xhr.status + " " + xhr.statusText);
      },
      beforeSend:function(response){
        if($("#editName").val() == ""){
          alert("This field is required");
          return false;
        }
      }
    });
  });



}); // end document ready function
