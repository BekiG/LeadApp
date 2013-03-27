<?php echo Form::open('my/route'); ?>
<div>
    <?php
        echo Form::label('username', 'Username');
        echo Form::text('username');
    ?>
</div>
<div>
    <?php
        echo Form::label('password', 'Password');
        echo Form::password('password');
    ?>
</div>
<div>
    <?php
    echo Form::select('Leads', array(
        'Lead Group 1' => array(
            "Lead 1" => "Lead 1",
            "Lead 2" => "Lead 2",
            "Lead 3" => "Lead 3",
        ),
        'Lead Group 2' => array(
            "Lead 21" => "Lead 21",
            "Lead 22" => "Lead 22",
            "Lead 23" => "Lead 23",
        )

    ));
    ?>
</div>
<div>
    <?php
        echo Form::submit('Login');
    ?>
</div>
<?php echo Form::close(); ?>