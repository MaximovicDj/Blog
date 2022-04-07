<?php $post = new Post(); ?>

<h2 class="mb-4 bg-dark text-light p-2">Popular News</h2>

<?php if(count($post->mostViewed()) < 1) echo "<p class=''>No News yet..</p>"; ?>
<?php foreach($post->mostViewed() as $post): ?>

    <div class="">
      <a href='post.php?id=<?php echo $post->id ?>'><img src="admin/img/<?php echo $post->image ?>" style="height:200px; width:300px;" alt=""></a>
      <p> <?php echo $post->title ?> </p>
    </div><hr class="my-4">

<?php endforeach ?>


<h2 class="mb-4 bg-dark text-light p-2">Categories</h2>

<?php $category = new Category(); foreach($category->show() as $category): ?>

  <div class="bg-light p-1 mb-1">
    <ul class="list-unstyled">
      <li><a href="index.php?category=<?php echo $category->name ?>"><?php echo $category->name ?></a> </li>
    </ul>
  </div>

<?php endforeach ?>

<a href='rss.php'><img src="admin/img/rss.jpg" class="img-fluid mt-4 ms-5" style="height:150px; width:200px;" alt=""></a>
