require('./bootstrap');
require('justifiedGallery');

// Toda vez que anexar uma imagem na galeria,
// dispara a função preview_image()
$("#images").change(function () {
    preview_image();
});

// Função que renderiza a imagem, 
// antes de fazer upload para a galeria de um Veículo
function preview_image() {
    var total_file = document.getElementById("images").files.length;
    var images = '';

    for(var i = 0; i < total_file; i++) {
        images += '<a>';
        images += '<img src="' + URL.createObjectURL(event.target.files[i]) + '">';
        images += '</a>';
    }

    $('#images_preview').html(images);
    $('#images_preview').justifiedGallery({
        lastRow : 'justify',
        rowHeight: 50,
        cssAnimation: true,
        margins : 5
    });
}

// Renderiza a galeria de imagens de veículo
// para o usuário escolher qual será excluída
$('#gallery-delete').justifiedGallery({
    lastRow : 'justify',
    rowHeight: 30,
    cssAnimation: true,
    margins : 5
});