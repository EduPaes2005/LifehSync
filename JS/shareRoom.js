// Variável para armazenar a frase
var alertMessage = 'Sua sala foi copiada para a Área de Transferência!';

document.getElementById('shareButton').addEventListener('click', function() {
    // Obtém a URL do navegador
    var url = window.location.href;
    // Cria um elemento de texto temporário
    var inputElement = document.createElement('textarea');
    inputElement.value = url;
    // Adiciona o elemento de texto à página
    document.body.appendChild(inputElement);
    // Seleciona o texto no elemento de texto
    inputElement.select();
    // Copia o texto para a área de transferência
    document.execCommand('copy');
    // Remove o elemento de texto temporário
    document.body.removeChild(inputElement);
    // Mensagem indicando que a cópia foi realizada
    alert(alertMessage);
});