
<div class="col-lg-12">
    <?php if(!isset($viewmodel) || count($viewmodel) < 22) : ?>
    <div class="col-lg-6">
        <div class="panel-heading">
            <h3 class="panel-title">Add Player</h3>
        </div>
        <div class="panel-body">
            <form method="post" action="<?php echo ROOT_URL; ?>player/add">
                <div class="form-group">
                    <label>Player first name</label>
                    <input type="text" name="fname" required pattern="[A-Za-z]+$" title="only letters" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Player last name</label>
                    <input type="text" name="lname" required pattern="[A-Za-z]+$" title="only letters" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <select name="position" class="form-control" required>
                        <option value="G">Goalie</option>
                        <option value="D">Defender</option>
                        <option value="M">Midfielder</option>
                        <option value="S">Striker</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Skill</label>
                    <input type="text" required name="skill" pattern="[1-9]|10" title="number from 1 to 10" class="form-control" />
                </div>
                <div class="form-group">
                    <label>Speed</label>
                    <input type="text" required name="speed" pattern="[1-9]|10" title="number from 1 to 10" class="form-control" />
                </div>
                <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
            </form>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-lg-6">
        <?php if(count($viewmodel)) : ?>
            <h2>Added players:</h2>
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
</div>

<div class="col-lg-12">
    <a href="<?php echo ROOT_URL;?>game/index"><button class="btn">Proceed to games</button></a>
</div>