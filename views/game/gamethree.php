<div class="col-lg-12">
    <h1>Game three</h1>
    <h1><?php echo $_SESSION['club']?> vs Salzburg</h1>
</div>

<div class="col-lg-12">
    <h1>Your Team:</h1>
    <table class="table">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Position</th>
        </tr>
        <?php foreach ($viewmodel['team'] as $player) : ?>
            <tr>
                <td><?php echo $player['firstname']; ?></td>
                <td><?php echo $player['lastname']; ?></td>
                <td><?php echo $player['position']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="col-lg-12">
    <h1>Result:</h1>
    <h2><?php echo $viewmodel['result']; ?></h2>
</div>

<div class="col-lg-12">
    <h1>Injured player:</h1>
    <h3>Position: <?php echo $viewmodel['injured']['position']; ?></h3>
    <h3>Name: <?php echo $viewmodel['injured']['firstname']; ?> <?php echo $viewmodel['injured']['lastname']; ?></h3>
</div>

<div class="col-lg-12">
   <a href="<?php echo ROOT_URL;?>game/newteam"><button class="btn">PLay again</button></a>
</div>