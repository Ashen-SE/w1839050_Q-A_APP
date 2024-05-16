<html>
<head>
  <title>Q&A_w1839050</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <style>
    /* Navbar */
.navbar {
  background-color: #91ADBB;
}

.navbar-brand {
  font-size: 24px;
  color: #000000;
}

.navbar-nav .nav-link {
  font-size: 18px;
  color: #293363;
}

/* Responsive Navbar Toggler */
.navbar-toggler-icon {
  background-color: #91ADBB;
}

/* Navbar Links */
.navbar-nav .nav-item {
  margin-right: 10px;
}

/* Alerts */
.alert {
  margin-top: 20px;
  border-radius: 8px;
}

.alert-success {
  background-color: #91ADBB;
  color: #fff;
}

.alert-primary {
  background-color: #c24d2c;
  color: #fff;
}

.alert-danger {
  background-color: #c24d2c;
  color: #fff;
}

.alert-warning {
  background-color: #ffc107;
  color: #000;
}

</style>
</head>

<body >
  <nav class="navbar navbar-expand-lg bg-body-tertiary" >
    <div class="container-fluid">
      <a class="navbar-brand" href="<?php echo base_url(); ?>questions">Q & A</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url(); ?>questions">Questions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="<?php echo base_url(); ?>about">About</a>
          </li>
        </ul>
        <ul class="nav navbar-brand navbar-right">
          <?php if (!$this->session->userdata('logged_in')) : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/login">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
            </li>
          <?php endif; ?>
          <?php if ($this->session->userdata('logged_in')) : ?>
            <li class="nav-item"><p class="nav-link text-warning">Welcome, <?php echo $this->session->userdata('username')?></p></li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>questions/create">Ask Question</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a>
            </li>
            
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <br><?php if ($this->session->flashdata('user_loggedin')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('user_loggedout')) : ?>
      <?php echo '<p class="alert alert-primary">' . $this->session->flashdata('user_loggedout') . '</p>'; ?>
    <?php endif; ?>

    <br><?php if ($this->session->flashdata('registered_user')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('registered_user') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('question_created')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('question_created') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('question_updated')) : ?>
      <?php echo '<p class="alert alert-success">' . $this->session->flashdata('question_updated') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('question_deleted')) : ?>
      <?php echo '<p class="alert alert-danger">' . $this->session->flashdata('question_deleted') . '</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('login_failed')) : ?>
      <?php echo '<p class="alert alert-warning">' . $this->session->flashdata('login_failed') . '</p>'; ?>
    <?php endif; ?>

    