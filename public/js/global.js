let dateRangePicker = $('.date-range-picker');
let dateMask = $('.date-mask');
let timeMask = $('.time-mask');
let week_days = {
    1: 'Lunes',
    2: 'Martes',
    3: 'Miércoles',
    4: 'Jueves',
    5: 'Viernes',
    6: 'Sábado',
    7: 'Domingo',
};


$(document).ready(function () {

    setDateRangePicker();
    setMasks();

});

$.extend($.fn.dataTable.defaults, {
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

function renderButton(name, action, btnClass) {
    return `<button class="btn btn-sm btn-${btnClass} ${action}">${name}</button>`
}

function setDateRangePicker() {
    if (dateRangePicker.length) {
        if (moment) {
            moment.locale('es');
        }
        dateRangePicker.daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'), 10),
        }, function (start, end, label) {
            if (dateRangePicker.parent().find(`[name=${dateRangePicker.data('field')}]`).length) {
                dateRangePicker.parent().find(`[name=${dateRangePicker.data('field')}]`).val(start.format('Y-MM-DD'));
            } else {
                dateRangePicker.parent().append(`<input type="hidden" name="${dateRangePicker.data('field')}" value="${start.format('Y-MM-DD')}">`)
            }
        });
        dateRangePicker.val('');
    }
}

function setMasks() {
    if (dateMask.length) {
        dateMask.inputmask("99/99/9999");
    }

    if (timeMask.length) {
        timeMask.inputmask("99:99");
    }
}

function tableRemove(url, data, token, title, body, table) {

    swal.fire({
        title: title,
        html: body,
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: '¡Si, borrar!',
        cancelButtonText: 'Cancelar',
        showLoaderOnConfirm: true,
        allowOutsideClick: false,
        preConfirm: () => {
            return new Promise((resolve) => {
                $.ajax({
                    async: true,
                    url: url,
                    type: "DELETE",
                    data: data,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-Token': token
                    },
                    success: function (data) {
                        console.log(data)
                        if (data.response) {
                            table.ajax.reload();
                            swal.fire({
                                type: 'success',
                                html: data.message,
                                confirmButtonText: 'Aceptar',
                            });
                        } else {
                            swal.fire({
                                type: 'error',
                                html: data.message,
                                confirmButtonText: 'Entendido',
                            });
                        }
                    }
                });
            })
        }
    })
}

$.fn.serializeObject = function () {
    var o = {};
    var a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name]) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};