<div class="container"><hr>
  <div class="w-75 p-3">
    <p class="display-6 my-4">Post Comment</p>

    <form onsubmit="return false;">

      <div class="input-group">
        <span class="input-group-text"><i class="fa-regular fa-id-badge"></i></span>
        <input type="text" class="form-control" name="comment_name" id="comment_name" placeholder="Enter your name">
      </div>

      <div class="input-group my-3">
        <span class="input-group-text"><i class="fa-solid fa-envelope"> </i></span>
        <input type="text" class="form-control" name="comment_email" id="comment_email" placeholder="Enter your email (Not required)">
      </div>

      <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-align-justify"></i></span>
        <textarea class="form-control" placeholder="Enter comment" name="comment_text" id="comment_text" rows="8" cols="80"></textarea>
      </div>

      <button data-role="addComment" data-id="<?php echo $_GET['id'] ?>" class="btn btn-secondary">Post Comment</button>
    </form>

  </div>
</div><!--END CONTINER-->
