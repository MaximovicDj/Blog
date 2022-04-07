<div class="col-lg-2">
    <a href='' class="text-decoration-none">
      <div class="bg-dark text-light py-5 rounded text-center mb-2">
        <h3><i class="fa-solid fa-book-open"> </i> News</h3>
        <?php echo count($posts->showAll()); ?>
      </div>
    </a>

    <a href='' class="text-decoration-none">
      <div class="bg-dark text-light py-5 rounded text-center mb-2">
        <h3><i class="fa-solid fa-folder"></i> Categories</h3>
        <?php echo count($category->show()); ?>
      </div>
    </a>

    <a href='' class="text-decoration-none">
      <div class="bg-dark text-light py-5 rounded text-center mb-2">
        <h3><i class="fa-solid fa-user"> </i> Users</h3>
        <?php echo count($user->showAll()); ?>
      </div>
    </a>

    <a href='' class="text-decoration-none">
      <div class="bg-dark text-light py-5 rounded text-center mb-2">
        <h3><i class="fa-solid fa-comments"></i> Comments</h3>
        <?php echo count($comment->showAllComment()); ?>
      </div>
    </a>

</div><!-- END First COL-->
