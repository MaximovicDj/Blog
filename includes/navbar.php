<nav class="navbar navbar-light bg-light navbar-expand-lg p-2 border-bottom shadow-sm sticky-top">
  <div class="container">
    <a href="index.php" class="navbar-brand">News</a>
    <button type="button" class="navbar-toggler" data-bs-target="#nav" data-bs-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link">Home Page</a>
        </li>
        <li class="nav-item">
          <a href="about.php" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a href="contact.php" class="nav-link">Contact</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">

      <?php if(!$session->signed_in()): ?>

        <li class="nav-item">
          <a href="admin/register.php" class="nav-link">Registration</a>
        </li>
        <li class="nav-item">
          <a href="admin/login.php" class="nav-link">Login</a>
        </li>

      <?php else: ?>
        <li class="nav-item">
          <a href='admin/index.php' class="nav-link">Admin</a>
        </li>

      <?php endif ?>

      </ul>
    </div>
  </div>
</nav>
