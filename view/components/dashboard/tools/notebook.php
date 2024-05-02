        <div id="Notebook" class="tool-content">
            <div class="header">
                <h1 id="notebookTitle">Cadernos</h1>
                <button id="btnUpdateNotebook"></button>
                <button id="create" onclick="showAddNotebook();">Criar</button>
                <button id="minimize-iconNB"><hr></button>
            </div>

            <div class="body">
                <?php if (!empty($notebooks)): ?>
                    <?php foreach ($notebooks as $notebook => $value): ?>
                        <?php
                            $encodedCover = str_replace(' ', '%20', $value["cover"]);
                        ?>
                        <a class="linkNotebooks" data-id="<?= $value["id_notebook"] ?>" style="background-image: url(<?= $encodedCover ?>);">
                            <p class="titleCover"><?= $value["title"] ?></p>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p id="NotebooksCover">Nenhum caderno encontrado!
                        <br>Caso ainda não tenha, clique em <b>"Criar"</b> e construa seus mais diversos espaços de anotações de maneira fácil e organizada.
                        <br>Bom trabalho!
                    </p>
                <?php endif; ?>
            </div>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
                <button id="deleteNotebook"></button>
            </div>
        </div>

        <div id="addNotebook" class="tool-content">
            <div class="header">
                <h1 id="notebookTitleCreate1">Criação</h1>
                <button id="back" onclick="showNotebook();">Voltar</button>
                <button id="minimize-icon2NB"><hr></button>
            </div>

            <form id="formCreate" enctype="multipart/form-data">
                <h2 id="notebookTitleCreate2">Crie seu caderno</h2>
                <input type="hidden" name="idUser" value="<?= $id_user ?>">

                <label for="title" id="labelTitleCreate">Título do Caderno</label>
                <input type="text" id="title" name="title" placeholder="Nomear caderno" required>

                <label for="cor" id="labelCoverCreate">Capa do Caderno</label>
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

                <button id="btn" type="button" onclick="createNotebook();">Criar</button>
            </form>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
            </div>
        </div>

        <div id="updateNotebook" class="tool-content" style="display: none;">
            <div class="header">
                <h1 id="notebookTitleCreate1">Atualização</h1>
                <button id="back" onclick="hideUpdateNotebook();">Voltar</button>
                <button id="minimize-icon3NB"><hr></button>
            </div>

            <form id="form">
                <h2 id="notebookTitleCreate2">Atualize seu caderno</h2>
                <input type="hidden" name="id_notebook" value="<?= $id_notebook ?>">

                <label for="title" id="labelTitleCreate">Título do Caderno</label>
                <input type="text" id="title" name="titleUpdate" placeholder="Renomear caderno" required>

                <label for="cor" id="labelCoverCreate">Capa do Caderno</label>
                <div class="inputs">
                    <select id="cor">
                        <option value="" disabled selected>Escolher cor</option>
                        <option value="vermelho">Vermelho</option>
                        <option value="azul">Azul</option>
                        <option value="verde">Verde</option>
                    </select>

                    <div class="containerFileInput">
                        <input type="text" id="cover" name="coverUpdate" placeholder="Escolher arquivo" required>
                    </div>
                </div>

                <button id="btnUpNotebook" onclick="hideUpdateNotebook();">Atualizar</button>
            </form>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
            </div>
        </div>

        <div id="notebookSubject" class="tool-content">
            <div class="header">
                <h1></h1>
                <button id="backContent" onclick="hideDeleteNotebook();">Voltar</button>
                <button id="minimize-icon4NB"><hr></button>
            </div>

            <div class="body">
                <textarea name="contentSubject" id="subject" cols="30" rows="28"></textarea>
            </div>

            <div class="footer">
                <p id="feedback">Feedback <span>⚙️</span></p>
            </div>
        </div>

        <script>
            function loadNotebooks() {
                var id_users = <?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 'null'; ?>;
                var currentNotebookIds = []; // Array para armazenar os IDs dos cadernos atuais

                // Armazena os IDs dos cadernos atualmente exibidos
                $('.linkNotebooks').each(function() {
                    currentNotebookIds.push($(this).data('id'));
                });

                $.ajax({
                    url: '../action/ReadNotebook.php',
                    type: 'GET',
                    dataType: 'json',
                    data: {id_users: id_users},
                    success: function(response) {
                        // Itera sobre os novos dados dos cadernos
                        response.forEach(function(notebook) {
                            var $elemento = $('[data-id="' + notebook.id_notebook + '"]');
                            
                            // Verifica se o caderno já está sendo exibido
                            if ($elemento.length) {
                                // Atualiza os dados do caderno existente
                                $elemento.css('background-image', 'url(' + notebook.cover + ')');
                                $elemento.find('.titleCover').text(notebook.title);
                            } else {
                                // Se o caderno não está sendo exibido, adiciona-o ao DOM
                                var newNotebookHtml = `
                                    <a class="linkNotebooks" data-id="${notebook.id_notebook}" style="background-image: url(${notebook.cover});">
                                        <p class="titleCover">${notebook.title}</p>
                                    </a>`;
                                $('.body').append(newNotebookHtml);
                            }
                        });

                        // Oculta os cadernos que não estão mais presentes na consulta mais recente
                        $('.linkNotebooks').each(function() {
                            var notebookId = $(this).data('id');
                            if (currentNotebookIds.indexOf(notebookId) === -1) {
                                $(this).remove();
                            }
                        });

                        console.log('Cadernos atualizados com sucesso!');
                    },
                    error: function(xhr, status, error) {
                        console.error('Erro ao atualizar cadernos:', error);
                    }
                });
            }
                // function loadNotebooks() {
                //     var id_users = <//?php echo isset($_SESSION['id_user']) ? $_SESSION['id_user'] : 'null'; ?>;
                //     $.ajax({
                //         url: '../action/ReadNotebook.php',
                //         type: 'GET',
                //         dataType: 'json',
                //         data: {id_users: id_users},
                //         success: function(response) {
                //             // Atualize a interface do usuário com os novos dados dos cadernos, se necessário
                //             // Atualizar o conteúdo dos elementos com os notebooks retornados
                //             response.forEach(function(notebook) {
                //                 var $elemento = $('[data-id="' + notebook.id_notebook + '"]');
                //                 $elemento.css('background-image', 'url(' + notebook.cover + ')');
                //                 $elemento.find('.titleCover').text(notebook.title);
                //             });
                //             console.log('Cadernos atualizados com sucesso!');
                //         },
                //         error: function(xhr, status, error) {
                //             console.error('Erro ao atualizar cadernos:', error);
                //         }
                //     });
                // }
        </script>

        <!-- Criação de Cadernos -->
        <script>
            function createNotebook() {
                var formData = new FormData($("#formCreate")[0]);

                $.ajax({
                    type: 'POST',
                    url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=create',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log("Imagem salva com sucesso!");
                        // location.reload();
                        loadNotebooks();
                        showNotebook();
                    }
                });
            }
        </script>

        <!-- Deleção de Cadernos -->
        <script>
            var deleteNotebook = document.getElementById('deleteNotebook');
            var linkNotebooks = document.querySelectorAll(".linkNotebooks");
            var linkPreventDefault = false;

            deleteNotebook.addEventListener('click', function() {
                if (!linkPreventDefault) {
                    linkNotebooks.forEach(function(link) {
                        link.addEventListener('click', linkClickHandlerDelete)
                    });
                    deleteNotebook.classList.add('active-button');
                    linkPreventDefault = true;
                } else {
                    linkNotebooks.forEach(function(link) {
                        link.removeEventListener('click', linkClickHandlerDelete);
                    });
                    deleteNotebook.classList.remove('active-button');
                    linkPreventDefault = false;
                }
            });

            function linkClickHandlerDelete(event) {
                event.preventDefault();
                console.log('O link foi clicado, mas não será seguido.');
                // Exibe um pop-up de confirmação
                var result = confirm("Deseja realmente excluir este caderno?");

                    // Se o usuário confirmar, executa a exclusão do caderno
                    if (result) {
                        currentNotebookId = $(this).data('id');

                            $.ajax({
                                type: 'GET',
                                url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=readOne&id_notebook=' + currentNotebookId,
                                success: function (response) {
                                    console.log('Caderno recuperado!');
                                },
                                error: function () {
                                    console.error('Erro ao buscar caderno!');
                                }
                            });

                            var id_notebook = currentNotebookId; // Obtém o ID do caderno

                            // Envia a solicitação AJAX para atualizar o conteúdo no banco de dados
                            $.ajax({
                                type: 'POST',
                                url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=delete&id_notebook=' + currentNotebookId, // Arquivo PHP para executar a atualização no banco de dados
                                data: {
                                    id_notebook: id_notebook
                                },
                                success: function (response) {
                                    console.log("Caderno excluído!");
                                    // location.reload();
                                    loadNotebooks();
                                },
                                error: function () {
                                    console.error('Erro ao excluir o caderno!');
                                }
                            });
                            
                    } else {
                        console.log("A exclusão do caderno foi cancelada!");
                    }
            }

            function hideDeleteNotebook(){
                linkNotebooks.forEach(function(link) {
                    link.removeEventListener('click', linkClickHandlerDelete);
                });
                showNotebook();
                deleteNotebook.classList.remove('active-button');
                linkPreventDefault = false;
            }
        </script>

        <!-- Resgate & Atualização de Cadernos -->
        <script>
            var btnUpdateNotebook = document.getElementById('btnUpdateNotebook');
            var linkNotebooks = document.querySelectorAll(".linkNotebooks");
            var updateNotebook = document.getElementById("updateNotebook");
            var notebookSubject = document.getElementById("notebookSubject");
            var btnUpNotebook = document.getElementById("btnUpNotebook");
            var linkPreventDefault = false;

            btnUpdateNotebook.addEventListener('click', function() {
                if (!linkPreventDefault) {
                    linkNotebooks.forEach(function(link) {
                        link.addEventListener('click', linkClickHandler)
                    });
                    btnUpdateNotebook.classList.add('active-button');
                    linkPreventDefault = true;
                } else {
                    linkNotebooks.forEach(function(link) {
                        link.removeEventListener('click', linkClickHandler);
                    });
                    btnUpdateNotebook.classList.remove('active-button');
                    linkPreventDefault = false;
                }
            });

            function linkClickHandler(event) {
                event.preventDefault();
                console.log('O link foi clicado, mas não será seguido.');
                showUpdateNotebook();

                currentNotebookId = $(this).data('id');

                    $.ajax({
                        type: 'GET',
                        url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=readOne&id_notebook=' + currentNotebookId,
                        success: function (data) {
                            $('#updateNotebook input[name="id_notebook"]').val(data.id_notebook);
                            $('#updateNotebook input[name="titleUpdate"]').val(data.title);
                            $('#updateNotebook input[name="coverUpdate"]').val(data.cover);
                        },
                        error: function () {
                            console.error('Erro ao buscar detalhes do caderno!');
                        }
                    });
            }

            function hideUpdateNotebook(){
                linkNotebooks.forEach(function(link) {
                    link.removeEventListener('click', linkClickHandler);
                });
                showNotebook();
                btnUpdateNotebook.classList.remove('active-button');
                linkPreventDefault = false;
            }
        </script>
        <script>
            $(document).ready(function () {
                $('#updateNotebook input[name="titleUpdate"], #updateNotebook input[name="coverUpdate"]').on('input', function () {
                    var title = $('#updateNotebook input[name="titleUpdate"]').val(); // Captura o conteúdo digitado do título
                    var cover = $('#updateNotebook input[name="coverUpdate"]').val(); // Captura o conteúdo digitado da capa
                    var id_notebook = currentNotebookId; // Obtém o ID do caderno

                    $('#btnUpNotebook').on('click', function (e) {
                        e.preventDefault();
                        // Envia a solicitação AJAX para atualizar o conteúdo no banco de dados
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=update&id_notebook=' + currentNotebookId, // Arquivo PHP para executar a atualização no banco de dados
                            data: {
                                title: title,
                                cover: cover,
                                id_notebook: id_notebook
                            },
                            success: function (response) {
                                console.log('Caderno atualizado!');
                                loadNotebooks();
                                showNotebook();
                            },
                            error: function () {
                                console.error('Erro ao atualizar o caderno!');
                            }
                        });
                    });
                });
            });
        </script>

        <!-- Resgate & Atualização de Conteúdo -->
        <script>
            $(document).ready(function () {
                $('.linkNotebooks').on('click', function (e) {
                    e.preventDefault();
                    
                    currentNotebookId = $(this).data('id');

                    $.ajax({
                        type: 'GET',
                        url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=readOne&id_notebook=' + currentNotebookId,
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
                            console.error('Erro ao buscar detalhes do caderno!');
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $('#subject').on('input', function () {
                    var content = $(this).val(); // Captura o conteúdo digitado
                    var id_notebook = currentNotebookId; // Obtém o ID do caderno

                    // Envia a solicitação AJAX para atualizar o conteúdo no banco de dados
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo $_SERVER['PHP_SELF']; ?>?action=updateNotebookContent&id_notebook=' + currentNotebookId, // Arquivo PHP para executar a atualização no banco de dados
                        data: {
                            content: content,
                            id_notebook: id_notebook
                        },
                        success: function (response) {
                            console.log('Conteúdo do caderno atualizado!');
                        },
                        error: function () {
                            console.error('Erro ao atualizar o conteúdo do caderno!');
                        }
                    });
                });
            });
        </script>