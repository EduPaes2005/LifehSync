<div id="notebookSubject" class="tool-content">
    <div class="header">
        <h1><?php echo $notebooks['title']; ?></h1>
        <button id="back"><a href="dashboard.php">Voltar</a></button>
        <button id="minimize-icon"><hr></button>
    </div>

        <div class="body">
            <textarea name="contentSubject" id="" cols="30" rows="28"><?php echo $notebooks['content']; ?></textarea>
        </div>

    <div class="footer">
        <p id="feedback">Feedback <span>⚙️</span></p>
    </div>
</div>