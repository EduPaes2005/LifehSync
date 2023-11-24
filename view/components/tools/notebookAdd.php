<div class="tool-content">
    <div id="header">
        <h1>Criação</h1>
        <button id="back"><a href="components/tools/notebook-main.php">Voltar</a></button>
        <button id="minimize-icon"><hr></button>
    </div>

    <form id="form" class="body" action="../action/CreateBook.php/?action=create" method="POST">
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
                <input type="file" class="cover" name="cover">
            </div>
        </div>

        <button id="btn" type="submit" name="send">Criar</button>
    </form>

    <footer>
        <p id="feedback">Feedback <span>⚙️</span></p>
    </footer>
</div>

<script>
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
</script>