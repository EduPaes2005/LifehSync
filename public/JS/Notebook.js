document.addEventListener('DOMContentLoaded', function () {
    const tool6Div = document.getElementById('tool6'); // Adicionei esta linha
    const addNotebookDiv = document.getElementById('create');
    const Notebook = document.getElementById('Notebook');

    addNotebookDiv.addEventListener('click', () => {
        // Esconde a estrutura HTML existente
        Notebook.style.display = 'none';

        // Cria a nova div
        const addNotebook = document.createElement('div');
        addNotebook.id = 'addNotebook';
        addNotebook.className = 'tool-content';

        // Adiciona o conteúdo à nova div
        addNotebook.innerHTML = `
            <div class="header">
                <h1>Criação</h1>
                <button id="back">Voltar</button>
                <button id="minimize-icon"><hr></button>
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

                <button id="btn" type="submit" name="send">Criar</button>
            </form>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
            </div>
        `;

        // Adiciona a nova div ao documento
        tool6Div.appendChild(addNotebook);

        // Adiciona um evento de clique ao botão "Voltar"
        const backButton = addNotebook.querySelector('#back' || '#btn');
        backButton.addEventListener('click', () => {
            // Exibe a estrutura HTML existente
            Notebook.style.display = 'block';

            // Oculta a nova div
            addNotebook.style.display = 'none';
        });
    });
});