<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <h3><?php echo __('welcome_to_findmylocation'); ?></h3>
            <br>
            <p><?php echo __('login_to_see_action');?></p>
            <?php
                if($oSession->hasError('invalid_login'))
                {
                       echo "<label class='error'>".$oSession->getError('invalid_login')."</label>";
                }
            ?>
            <form class="m-t" role="form" action="<?php echo getConfig('siteUrl').'/users/login' ?>" id="loginForm" method="POST" novalidate="novalidate">
                <div class="form-group">
                    <input type="text" name="email" id="email" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"><?php echo __('login'); ?></button>

                <!--<a href="<?php echo getConfig('siteUrl').'/users/forgotpassword' ?>"><small><?php echo __('forgot_password'); ?></small></a>-->
             </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>
