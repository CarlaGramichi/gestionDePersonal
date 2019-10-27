$(document).ready(function () {

});

$.extend( $.fn.dataTable.defaults, {
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
    }
});

function httpRedirect(url) {
    window.location.href = url;
}

function renderActions(actions) {

    let button = [
        '<div class="dropdown">',
        '<button type="button" id="dropdownMenuButton" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Acciones ',
        '&emsp;<span class="caret"></span>',
        '</button>',
        '<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">'
    ].join('');

    $.each(actions, function (index, value) {
        switch (value) {
            case "edit":
                button += '<a class="dropdown-item edit" href="javascript:void(0)"><i class="fa fa-edit"></i>&emsp;Editar</a>';
                break;
            case "copy":
                button += '<a class="dropdown-item copy"  href="javascript:void(0)"><i class="fa fa-files-o"></i>&emsp;Duplicar</a>';
                break;
            case "delete":
                button += '<a class="dropdown-item remove" href="javascript:void(0)"><i class="fa fa-trash"></i>&emsp;Borrar</a>';
                break;
            case "preview":
                button += '<a class="dropdown-item preview"  href="javascript:void(0)"><i class="fa fa-eye"></i>&emsp;Vista previa</a>';
                break;
            case "image":
                button += button += '<a class="images"  href="javascript:void(0)"><i class="fa fa-picture-o"></i>&emsp;Imágenes</a>';
                break;
            case "password":
                button += '<a class="dropdown-item changepass" href="javascript:void(0)"><i class="fa fa-key"></i></span> Contraseña</a>';
                break;
            default:
                button += value;
        }
    });

    button += [
        '</div>',
        '</div>',
    ].join('');

    return button;
}