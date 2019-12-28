<?php
require_once('../resources/config.php');
require_once(TEMPLATE_FRONT . '/header.php');

// echo isset($_GET['id'])? 'set': 'not set';
// echo '<br>';
// echo is_int($_GET['id'])? 'int':'not int'.' '.gettype($_GET['id']);
// echo '<br>';
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Qeury Error: no category found");
}
$id = (int) $_GET['id'];
?>
<!-- Page Content -->
<div class="container">

    <!-- Jumbotron Header -->
    <header class="jumbotron hero-spacer">
        <h1>A Warm Welcome!</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
        <p><a class="btn btn-primary btn-large">Call to action!</a>
        </p>
    </header>

    <hr>

    <!-- Title -->
    <div class="row">
        <div class="col-lg-12">
            <h3>Latest Features</h3>
        </div>
    </div>
    <!-- /.row -->

    <!-- Page Features -->
    <div class="row text-center">
        <?php get_category_products($id); ?>
    </div>
    <!-- /.row -->
</div>


<?php require_once(TEMPLATE_FRONT . '/footer.php'); ?>