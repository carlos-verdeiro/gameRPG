 // Função para abrir o pop-up
 function openPopup(id) {
    document.getElementById(id).style.display = 'block';
    // Adiciona um event listener para detectar a tecla Esc
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closePopup(id);
        }
    });
}

// Função para fechar o pop-up
function closePopup(id) {
    document.getElementById(id).style.display = 'none';
    // Remove o event listener ao fechar o pop-up
    document.removeEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closePopup(id);
        }
    });
}