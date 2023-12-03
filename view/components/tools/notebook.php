<!-- Cadernos -->
<div id="Notebook" class="tool-content">
    <div class="header">
        <h1>Cadernos</h1>
        <button id="create" onclick="showAddNotebook();">Criar</button>
        <button id="minimize-icon" onclick="hiddenElement();"><hr></button>
    </div>

    <div class="body">
        <?php foreach ($notebooks as $notebook => $value) : ?>
            <a class="linkNotebooks" data-id="<?= $value["id_notebook"] ?>" style="background-image: url(<?= $value["cover"] ?>);"></a>
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
<!-- <script>
    $("#form").submit(function() {
    event.preventDefault();

    var url = $(this).attr("action");
    //serializeArray vai pegar todos os campos do array
    var formData = $(form).serializeArray();
    console.log(formData);
    $.post(url, formData).done(function(data) {
        console.log(data); //resultado do envio para o servidor
    });

    });
</script> -->
<script>
$(document).ready(function () {
    // Adiciona um listener para o clique nos links de caderno
    $('.linkNotebooks').on('click', function (e) {
        e.preventDefault();
        
        // Obtém o ID do caderno do atributo data-id
        var cadernoId = $(this).data('id');

        // Faz uma requisição AJAX para obter os detalhes do caderno
        $.ajax({
            type: 'GET',
            url: '<?php echo $_SERVER['PHP_SELF']; ?>?id_notebook=' + cadernoId,
            success: function (data) {
                // Atualiza a div notebookSubject com os detalhes do caderno
                $('#notebookSubject h1').text(data.title);
                $('#notebookSubject textarea').val(data.content);

                // Exibe a div notebookSubject
                $('#notebookSubject').show();
                // Oculta a div Notebook
                $('#Notebook').hide();
            },
            error: function () {
                console.error('Erro ao buscar detalhes do caderno.');
            }
        });
    });
});
</script>