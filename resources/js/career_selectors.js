let year = $('.year-selector option:selected').val();

$(document).ready(function () {
    if (year) {
        getCareers(year);
    }

    $('.year-selector').change(function () {
        $('.career_id-selector').html('<option value="">Seleccionar año</option>');

        if ($(this).val()) {
            getCareers($(this).val());
        }
    });

    $('.career_id-selector').change(function () {
        if ($(this).val()) {
            getCourses($(this).val());
        }
    });

    $('.course_id-selector').change(function () {
        if ($(this).val()) {
            getDivisions($('.career_id-selector option:selected').val(), $(this).val());
        }
    });

    $('.division_id-selector').change(function () {
        if ($(this).val()) {
            getSubjects(
                $('.career_id-selector option:selected').val(),
                $('.course_id-selector option:selected').val(),
                $(this).val()
            );
        }
    });

    $('.subject_id').change(function () {
        if ($(this).val()) {
            showSubject(
                $('.career_id-selector option:selected').val(),
                $('.course_id-selector option:selected').val(),
                $(this).val()
            );
        }
    });
});

function getCareers(year) {
    $.ajax({
        async: true,
        url: `${baseUri}/pof/careers`,
        data: {
            year: year,
            table: false,
        },
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            $('.career_id-selector').html('<option value="">Seleccionar</option>');
        },
        success: function (response) {
            if (response) {
                $.each(response, function (id, name) {
                    $('.career_id-selector').append(`<option value="${id}">${name}</option>`)
                });
            }
        }
    });
}

function getCourses(career_id) {
    $.ajax({
        async: true,
        url: `${baseUri}/pof/careers/${career_id}/courses`,
        type: 'get',
        data: {
            table: false,
        },
        dataType: 'json',
        beforeSend: function () {
            $('.course_id-selector').html('<option value="">Seleccionar</option>');
        },
        success: function (response) {
            if (response) {
                $.each(response, function (id, name) {
                    $('.course_id-selector').append(`<option value="${id}">${name}</option>`)
                });
            }
        }
    });
}

function getDivisions(career_id, course_id) {
    $.ajax({
        async: true,
        url: `${baseUri}/pof/careers/${career_id}/courses/${course_id}/divisions`,
        type: 'GET',
        data: {
            table: false,
        },
        dataType: 'json',
        beforeSend: function () {
            $('.division_id-selector').html('<option value="">Seleccionar</option>');
        },
        success: function (response) {
            if (response) {
                $.each(response, function (id, name) {
                    $('.division_id-selector').append(`<option value="${id}">${name}</option>`)
                });
            }
        }
    });
}

function getSubjects(career_id, course_id, division_id) {
    $.ajax({
        async: true,
        url: `${baseUri}/pof/careers/${career_id}/courses/${course_id}/subjects`,
        type: 'GET',
        data: {
            career_course_division_id: division_id,
            table: false,
        },
        dataType: 'json',
        beforeSend: function () {
            $('.subject_id-selector').html('<option value="">Seleccionar</option>');
        },
        success: function (response) {
            if (response) {
                $.each(response, function (id, name) {
                    $('.subject_id-selector').append(`<option value="${id}">${name}</option>`)
                });
            }
        }
    });
}

function showSubject(career_id, course_id, subject_id) {
    $.ajax({
        async: true,
        url: `${baseUri}/pof/careers/${career_id}/courses/${course_id}/subjects/${subject_id}`,
        type: 'get',
        data: {},
        dataType: 'json',
        beforeSend: function () {
            // subject_data_container.addClass('d-none');
            // subject_data_container.find('.subject-data').empty();
        },
        success: function (response) {
            if (response) {
                // subject_data_container.removeClass('d-none');
                // subject_data_container.find('.subject-data').html(`
                //             <div class="col-sm-4"><p><span>Nombre: </span><strong>${response.name}</strong></p></div>
                //             <div class="col-sm-4"><p><span>Régimen: </span><strong>${response.regimen.name}</strong></p></div>
                //             <div class="col-sm-4"><p><span>Horas cátedra: </span><strong>${response.hours} hs.</strong></p></div>
                //         `);

            }
        }
    });
}
