<!-- Cadernos -->
<div id="Notebook" class="tool-content">
    <div class="header">
        <h1>Cadernos</h1>
        <button id="create" onclick="showAddNotebook();">Criar</button>
        <button id="minimize-icon" onclick="hiddenElement();"><hr></button>
    </div>

    <div class="body">
        <?php foreach ($notebooks as $notebook => $value) : ?>
            <?php
                $encodedCover = str_replace(' ', '%20', $value["cover"]);
            ?>
            <a class="linkNotebooks" data-id="<?= $value["id_notebook"] ?>" style="background-image: url(<?= $encodedCover ?>);"></a>
        <?php endforeach; ?>
    </div>

    <div class="footer">
        <p id="feedback">Feedback <span>⚙️</span></p>
    </div>
</div>

<!--AddCadernos-->
<div id="addNotebook" class="tool-content">
    <div class="header">
        <h1>Criação</h1>
        <button id="back" onclick="showNotebook();">Voltar</button>
        <button id="minimize-icon" onclick="hiddenElement();"><hr></button>
    </div>

    <form id="form" action="?action=create" method="POST" enctype="multipart/form-data">
        <h2>Crie seu caderno</h2>

        <label for="title">Título do Caderno</label>
        <input type="text" id="title" name="title" placeholder="Nomear caderno" required>

        <label for="cor">Capa do Caderno</label>
        <div class="inputs">
            <select id="cor">
                <option value="" disabled selected>Escolher cor</option>
                <option value="vermelho">Vermelho</option>
                <option value="azul">Azul</option>
                <option value="verde">Verde</option>
            </select>

            <div class="containerFileInput">
                <div class="labelFileInput">Escolher arquivo</div>
                <input type="file" id="cover" name="cover">
            </div>
        </div>

        <button id="btn" type="submit" name="send" onclick="showNotebook();">Criar</button>
    </form>

    <div class="footer">
        <p id="feedback">Feedback <span>⚙️</span></p>
    </div>
</div>

<!--CadernosConteúdos-->
<div id="notebookSubject" class="tool-content">
    <div class="header">
        <h1><?php echo $noteContent['title']; ?></h1>
        <button id="back" onclick="showNotebook();">Voltar</button>
        <button id="minimize-icon" onclick="hiddenElement();"><hr></button>
    </div>

    <div class="body">
        <textarea name="contentSubject" id="subject" cols="30" rows="28"><?php echo $noteContent['content']; ?></textarea>
    </div>

    <div class="footer">
        <p id="feedback">Feedback <span>⚙️</span></p>
    </div>
</div>

<script>
$(document).ready(function () {
    $('.linkNotebooks').on('click', function (e) {
        e.preventDefault();
        
        var cadernoId = $(this).data('id');

        $.ajax({
            type: 'GET',
            url: '<?php echo $_SERVER['PHP_SELF']; ?>?id_notebook=' + cadernoId,
            success: function (data) {
                $('#notebookSubject h1').text(data.title);
                $('#notebookSubject textarea').val(data.content);

                $('#notebookSubject').show();
                $('#Notebook').hide();
            },
            error: function () {
                console.error('Erro ao buscar detalhes do caderno.');
            }
        });
    });
});
</script>