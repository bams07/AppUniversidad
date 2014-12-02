// se activa cuando el documento este cargado
$(document).ready(function () {

    // funcion que se activa cuando se hace click para mostrar
    $("a[data-title=show]").click(function () {

        var idCareer = this.id;

        // obtiene los datos del usuario
        $.get(this.baseURI + '/' + idCareer, function (data) {

            // variables
            var career = data.career;

            // iguala los campos con las variables
            document.getElementById('career').value = career;

        });
    });

    // se activa cuando se cancela el proceso de creacion de usuarios
    $("#btn-careers-cancel").click(function () {

        $('#form-create').each(function () {
            this.reset();
        });
    });

    // se activa cuando se quiere editar algun usuario
    $("a[data-title=edit]").click(function () {

        var idCareer = this.id;

        // obtiene los datos del usuario para editar
        $.get(this.baseURI + '/' + idCareer + '/edit', function (data) {

            // variables
            var career = data.career;


            // recorre el formualario de edit para poder igualar los campos con las variables
            $('#form-edit').each(function () {

                // se igualan los campos del formualario con las variables
                this.action = this.action + '/' + data.idcareer;
                this.elements.namedItem('career').value = career;

            });


        });
    });



});