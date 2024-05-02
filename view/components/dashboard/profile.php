    <div class="perfil">
        <div class="rainbow-border"></div>
        <?php
            $encodedImgProfile = str_replace(' ', '%20', $imgProfile);
        ?>
        <button id="perfil-icon" style="background-image: url(<?php echo ($encodedImgProfile ? $encodedImgProfile : '../assets/Account.svg'); ?>);"><a id="viewAccount" href='?action=update&id_user=<?= $id_user ?>'></a></button>
    </div>
    
    <?php
        if(isset($_GET['action']) && $_GET['action'] == 'update' && isset($_GET['id_user'])){
            $id_user = $_GET['id_user'];
            $result = $crudAccount->readOne($id_user);

            if(!$result){
                echo "Registro não encontrado.";
                exit();
            }

            $username = $result['username'];
            $email = $result['email'];
            $imgProfile = $result['imgProfile'];
    ?>
        <div id="accountElement" class="content">
            <div class="header">
                <button id="minimize-iconAE"><hr></button>
            </div>

            <form id="formAccount" action="?action=update" method="POST">
                <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                <h2 id="titleProfile">Seu Perfil</h2>

                <label for="username" id="labelUser">Nome do Usuário</label>
                <input type="text" id="username" name="username" value="<?php echo $username ?>" placeholder="Renomear Usuário">

                <label for="email" id="labelEmail">E-mail</label>
                <input type="text" id="email" name="email" value="<?php echo $email ?>" placeholder="Atualizar E-mail">

                <label for="imgProfile" id="labelImg">Foto do Perfil</label>
                <input type="text" id="imgProfile" name="imgProfile" value="<?php echo $imgProfile ?>" placeholder="Alterar Imagem de Perfil">

                <button id="btnProfile" type="submit" name="enviar" value="Atualizar" onclick="return confirm('Certeza que deseja atualizar?')">Atualizar</button>
            </form>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
            </div>
        </div>
    <?php
        }
    ?>