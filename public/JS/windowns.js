function showNotebook() {
    document.getElementById('Notebook').style.display = 'flex';
    document.getElementById('addNotebook').style.display = 'none';
    document.getElementById('notebookSubject').style.display = 'none';
}

function showAddNotebook() {
    document.getElementById('Notebook').style.display = 'none';
    document.getElementById('addNotebook').style.display = 'flex';
    document.getElementById('notebookSubject').style.display = 'none';
}

function showNotebookSubject() {
    document.getElementById('Notebook').style.display = 'none';
    document.getElementById('addNotebook').style.display = 'none';
    document.getElementById('notebookSubject').style.display = 'flex';
}