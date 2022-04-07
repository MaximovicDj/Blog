<nav class="navbar navbar-light bg-light navbar-expand-lg p-2 border-bottom shadow-sm sticky-top">
  <div class="container">
    <a href="../index.php" class="navbar-brand">News</a>
    <button type="button" class="navbar-toggler" data-bs-target="#nav" data-bs-toggle="collapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="../index.php" class="nav-link">Home Page</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href=''  data-bs-toggle="dropdown"><?php echo $_SESSION['email'] ?></a>
          <ul class="dropdown-menu">
            <li>
              <a href="profile.php" class="dropdown-item">My Profile</a>
            </li>
            <li>
              <a href="logout.php" class="dropdown-item">Logout</a>
            </li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>
