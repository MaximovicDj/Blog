<?php require_once "includes/header.php" ?>

<?php require_once "includes/navbar.php" ?>

<?php require_once "includes/adminDashboard.php" ?>

<?php if(!$session->signed_in()) redirect("login.php"); ?>

<?php if($_SESSION['status'] != "Admin") redirect('../index.php'); ?>

<div class="container my-5">

<?php if(count($contact->showNotSeen()) < 1) echo "<p class='display-6 my-5'>No messages..</p>"; ?>

<?php foreach($contact->showNotSeen() as $contact): ?>
  <div class="w-50">
    <span>Name: - <?php echo $contact->name ?></span><br>
    <span>Email: - <?php echo $contact->email ?></span>
    <p class="mb-1">Message: - <?php echo $contact->text ?></p>
    <a href="#" class="text-decoration-none" data-role="makeSeen" data-id="<?php echo $contact->id ?>">Mark as read</a>
    <hr>
  </div>
<?php endforeach ?>

</div>


<script src='js/contact.js'></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
