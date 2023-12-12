    <div class="perfil">
        <div class="rainbow-border"></div>
        <?php
            $encodedImgProfile = str_replace(' ', '%20', $imgProfile);
        ?>
        <button id="perfil-icon" style="background-image: url(<?php echo ($encodedImgProfile ? $encodedImgProfile : '../public/assets/Account.svg'); ?>);"></button>
    </div>