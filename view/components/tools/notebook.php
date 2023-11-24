<div id="Notebook" class="tool-content">
    <div class="header">
        <h1>Cadernos</h1>
        <!-- <a href="updateNotebook.php?action=update&id_notebook=<//?= $value["id_notebook"] ?>">Editar</a> -->
        <button id="create">Criar</button>
        <button id="minimize-icon"><hr></button>
    </div>

    <div class="body">
        <?php foreach ($notebooks as $notebook => $value) : ?>
            <a href="dashboard_Notebook.php?id_notebook=<?= $value["id_notebook"] ?>" style="background-image: url(<?= $value["cover"] ?>);"></a>
        <?php endforeach; ?>
    </div>

    <div class="footer">
        <p id="feedback">Feedback <span>⚙️</span></p>
    </div>
</div>