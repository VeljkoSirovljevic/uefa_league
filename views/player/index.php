<div class="col-lg-12">
    <h1><?php echo $_SESSION['club'] . ' management'; ?></h1>
</div>
<div class="col-lg-6">
        <h2>Choose your own players:</h2>
        <a href="<?php echo ROOT_URL; ?>player/add">Add players</a>
</div>
<?php if(!count($viewmodel)) : ?>
<div class="col-lg-6">
    <h2>Auto generate players:</h2>
        <a href="<?php echo ROOT_URL; ?>player/autogenerate">Auto generate players</a>
</div>
<?php endif; ?>