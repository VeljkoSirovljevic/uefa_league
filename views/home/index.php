
<div class="text-center" style="padding-top: 50px; width: 100%; text-align: center">

    <h1 class="display-4">Welcome, Club manager</h1>
    <p>Please enter your club name</p>
    <hr class="my-4">
    <form class="form-inline" method="post" action="<?php echo ROOT_URL; ?>player">
        <input class="form-control mr-sm-2" name="club" required pattern="[a-zA-Z0-9\s]+" title="Only alphanumeric and spaces" type="text" placeholder="Enter Club" aria-label="Club">
        <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
</div>