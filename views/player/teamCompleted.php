<div class="col-lg-12">
    <?php if(count($viewmodel)) : ?>
        <h2> Congratulate, this is your team</h2>
        <table class="table">
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position</th>
            </tr>
            <?php foreach ($viewmodel as $player) : ?>
                <tr>
                    <td><?php echo $player['firstname']; ?></td>
                    <td><?php echo $player['lastname']; ?></td>
                    <td><?php echo $player['position']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>


    <?php endif; ?>
</div>

<div class="col-lg-12">
    <a href="<?php echo ROOT_URL;?>game/index"><button class="btn">Proceed to games</button></a>
</div>