<div class="container">
  <hr class="my-5">
  <p class="display-6">Comments</p>

  <?php if(count($comment->showForOnePost($_GET['id'])) > 0): ?>

      <?php foreach($comment->showForOnePost($_GET['id']) as $comment): ?>
        <div class="d-flex w-75">
            <img src="admin/img/user-avatar.png" class="img-fluid rounded border p-2 me-4" style='height: 100px;' alt="">

            <div class="ms-3">
              <span><i><?php echo $comment->name ?> &nbsp &nbsp<?php if(!is_null($comment->email)) echo $comment->email; ?></i></span><br>
              <span><i><?php echo $comment->time ?></i></span>
              <p class="mt-1"><?php echo $comment->comment ?></p>
            </div>
        </div>

          <?php
          if(isset($_SESSION['user_id'])) $userId = $_SESSION['user_id'];
          else $userId = "";
          ?>
          <?php if($userId == $posts->showById($_GET['id'])->user_id): ?>
            <a href="#" data-id="<?php echo $comment->id ?>" class="deleteComment text-decoration-none text-danger"><i class="fa-solid fa-trash text-danger me-1 mt-2"> </i>Obrisite komentar</a>
          <?php endif ?>
        <hr>
      <?php endforeach ?>

    <?php else: ?>
      <p>No comments yet..</p>
    <?php endif ?>

</div>
