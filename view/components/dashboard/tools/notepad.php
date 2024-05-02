        <div id="Notepad" class="tool-content">
            <div class="header">
                <h1 id="notepadText">Notas</h1>
                <button id="minimize-iconNP"><hr></button>
            </div>

            <div class="body">
                <textarea name="contentSubject" id="subjectNotepad" cols="30" rows="28" placeholder="Insira aqui suas anotações:"></textarea>
            </div>
        </div>

        <!-- Resgate & Atualização de Dados -->
        <!-- <script>
            $(document).ready(function () {
                $('.linkNotebooks').on('click', function (e) {
                    e.preventDefault();
                    
                    currentNotebookId = $(this).data('id');

                    $.ajax({
                        type: 'GET',
                        url: '<//?php echo $_SERVER['PHP_SELF']; ?>?id_notebook=' + currentNotebookId,
                        success: function (data) {
                            $('#notebookSubject h1').text(data.title);
                            $('#notebookSubject textarea').val(data.content);

                            if ($('#updateNotebook').css('display') === 'flex') {
                                showUpdateNotebook();
                            } else {
                                showNotebookSubject();
                            }
                        },
                        error: function () {
                            console.error('Erro ao buscar detalhes do caderno.');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#subject').on('input', function () {
                    var content = $(this).val(); // Captura o conteúdo digitado
                    var id_notebook = currentNotepadId; // Obtém o ID do caderno

                    // Envia a solicitação AJAX para atualizar o conteúdo no banco de dados
                    $.ajax({
                        type: 'POST',
                        url: '../action/UpNotepad.php', // Arquivo PHP para executar a atualização no banco de dados
                        data: {
                            content: content,
                            id_notebook: id_notebook
                        },
                        success: function (response) {
                            console.log('Conteúdo atualizado no banco de dados.');
                        },
                        error: function () {
                            console.error('Erro ao atualizar o conteúdo no banco de dados.');
                        }
                    });
                });
            });
        </script> -->