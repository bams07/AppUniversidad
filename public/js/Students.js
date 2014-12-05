// se activa cuando el documento este cargado
$(document).ready(function () {


    // se activa cuando se va abrir la ventana de comentarios
    $("a[data-title=comments]").click(function () {

        var idStudent = this.id;
        var url = this.baseURI + "/comments/" + idStudent;
        var contCheck = 0;

        document.getElementById('comment-idStudent').value = idStudent;

        // trae los comentarios
        $.get(url)
            .done(function (data) {

                if (data) {
                    $("div .comments").html(data);
                } else {
                    $("div .comments").html("<strong>No comments</strong>");
                }

            }).always(function () {

                // se activa cuando se va editar un comentario
                $("a[data-title=btn-comment-edit]").click(function () {

                    var idcomment = this.id;
                    var url = this.baseURI + "/comments/" + idcomment + "/edit"

                    // recorre los botonos de aceptar actualizacion y los esconde
                    $("#comments").find("a[data-title=btn-comment-check]").each(function(){

                        $("a[idcomment=" + this.id + "]").css("display", "none");

                    });

                    // bloque al boton de guardar
                    document.getElementById('btn-comment-save').disabled = true;

                    // trae el comentario que se va editar
                    $.get(url, function (data) {

                        $("#comment-text").val(data.commentary);
                        $("#comment-date").val(data.date);

                        // muestra el boton de check para aceptar la actualizacion
                        $("a[idcomment=" + idcomment + "]").css("display", "inline");

                    });

                });

                // se activa cuando se hace click en el boton para aceptar los cambios del comentario
                $("a[data-title=btn-comment-check]").click(function () {

                    var idcomment = this.id;
                    var url = this.baseURI + "/comments/" + idcomment;
                    var date = document.getElementById('comment-date').value;
                    var comment = document.getElementById('comment-text').value;
                    var data = {_method: "PUT", date: date, comment: comment};

                    // envia los datos para ser actualizados
                    $.ajax({
                        url: url,
                        data: data,
                        type: "POST"
                    }).done(function (data) {

                        window.location.href = "/admin/students";

                    });

                });


            });

    });

    // limpia el formulario al darle el boton cancel
    $("#btn-comment-cancel, #comment-modal-close").click(function () {

        // desbloquea el boton de guardar
        document.getElementById('btn-comment-save').disabled = false;

        $('#form-comments').each(function () {
            this.reset();
        });

    });


    // funcion que se activa cuando se hace click para mostrar
    $("a[data-title=show]").click(function () {


        var idStudent = this.id;


        // obtiene los datos del usuario
        $.get(this.baseURI + '/' + idStudent, function (data) {

            // variables
            var dni = data[0].dni;
            var firstname = data[0].firstname;
            var lastname = data[0].lastname;
            var image = data[0].image;
            var idcareer = data[0].career;


            // iguala los campos con las variables
            document.getElementById('dni').value = dni;
            document.getElementById('firstname').value = firstname;
            document.getElementById('lastname').value = lastname;
            document.getElementById('career').value = idcareer;

            var image_Values = document.getElementById('image-student-show');

            image_Values.src = window.location.protocol + "//" + window.location.host + '/images/students/' + image;
            image_Values.width = 180;
            image_Values.height = 170;


        });
    });
    // ------------ Fin metodo de mostrar


    // se activa cuando se cancela el proceso de creacion de estudiantes

    $("#btn-students-cancel").click(function () {


        $('#form-create').each(function () {
            this.reset();

            var image_Values = document.getElementById('image-student-create');

            image_Values.src = window.location.protocol + "//" + window.location.host + '/images/admin/student_pic.png';
            image_Values.width = 180;
            image_Values.height = 170;

        });

    });
    //------------- Fin metodo limpiar formulario create


    // se activa cuando se quiere editar algun usuario
    $("a[data-title=edit]").click(function () {


        var idStudent = this.id;

        // obtiene los datos del estudiante para editar
        $.get(this.baseURI + '/' + idStudent + '/edit', function (data) {

            // variables

            var dni = data[0].dni;
            var firstname = data[0].firstname;
            var lastname = data[0].lastname;
            var image = data[0].image;
            var idcareer = data[0].career;


            // recorre el formualario de edit para poder igualar los campos con las variables
            $('#form-edit').each(function () {

                // se igualan los campos del formualario con las variables

                this.action = this.baseURI + '/' + data[0].idstudent;
                this.elements.namedItem('dni').value = dni;
                this.elements.namedItem('firstname').value = firstname;
                this.elements.namedItem('lastname').value = lastname;

                var image_Values = document.getElementById('image-student-edit');

                image_Values.src = window.location.protocol + "//" + window.location.host + '/images/students/' + image;
                image_Values.width = 180;
                image_Values.height = 170;


                // se seleciona el rol basado en el que tenga el cliente
                $("#career option").filter(function () {

                    return $(this).text() == idcareer;

                }).attr('selected', true);


            });


        });

    });
    // --------- Fin metodo edit


    // Carga la imagen en el espacio de la imagen
    $('#image-file').change(function () {

        // Variables
        var cargar_imagen = document.getElementById('image-file');
        var mostrar_imagen = document.getElementById('image-student-create');


        //Toma los datos del input
        var file = cargar_imagen.files[0];
        // Tipo de datos que buscamos
        var tipo_imagen = /image.*/;

        //Compara si el archivo seleccionado es de tipo imagen
        if (file.type.match(tipo_imagen)) {

            // Variable que es una funcion de leer archivos
            var reader = new FileReader();

            reader.onload = function (e) {

                // Crea una variable de tipo tag IMG

                mostrar_imagen.src = reader.result;
                mostrar_imagen.width = 180;
                mostrar_imagen.height = 170;

            }

            // Convierte el archivo leido en un dato binario
            reader.readAsDataURL(file);

        } else {

            mostrar_imagen.innerHTML = "File not supported"
        }

    });
    // -------------- Fin metodo cargar imagen

    // Carga la imagen en el espacio de la imagen
    $('#image-file-edit').change(function () {

        // Variables
        var cargar_imagen = document.getElementById('image-file-edit');
        var mostrar_imagen = document.getElementById('image-student-edit');


        //Toma los datos del input
        var file = cargar_imagen.files[0];
        // Tipo de datos que buscamos
        var tipo_imagen = /image.*/;

        //Compara si el archivo seleccionado es de tipo imagen
        if (file.type.match(tipo_imagen)) {

            // Variable que es una funcion de leer archivos
            var reader = new FileReader();

            reader.onload = function (e) {

                // Crea una variable de tipo tag IMG

                mostrar_imagen.src = reader.result;
                mostrar_imagen.width = 180;
                mostrar_imagen.height = 170;

            }

            // Convierte el archivo leido en un dato binario
            reader.readAsDataURL(file);

        } else {

            mostrar_imagen.innerHTML = "File not supported"
        }

    });
    // -------------- Fin metodo cargar imagen


    $(".search").keyup(function (event) {
        if (event.keyCode == 13) {
            $search = document.getElementsByClassName("search")[0].value;
            $student = "";

            $select = document.getElementById('option').value;
            $function = "";
            if ($select === 'skills') {
                $function = "searchSkill";
            } else if ($select === 'technology') {
                $function = "searchTechnology";
            }

            if ($search != ' ') {

                $.get(this.baseURI + $function + '/' + $search, function (data) {

                    for (i = 0; i < data.length; i++) {
                        if (i == 0) {
                            $student += "<th>DNI</th><th>First Name</th><th>Last Name</th>";
                        }
                        $student += '<tr><td><a type="button" href="#"   data-title="showSearch" data-toggle="modal" data-target="#show" data-placement="top"  id="' + data[i].idstudent + '" >';
                        $student += '<img id="student" class="image-student-list" src="/images/students/' + data[i].dni + '" ></a></td>'
                        $student += '<td>' + data[i].firstname + '</td><td>' + data[i].firstname + '</td></tr>';


                    }

                    document.getElementById('mytable').innerHTML = $student;
                    show();
                });
            }

            document.getElementById('mytable').innerHTML = $student;

        }
    });

    function show() {
        // funcion que se activa cuando se hace click para mostrar
        $("a[data-title=showSearch]").click(function () {


            var idStudent = this.id;


            // obtiene los datos del usuario
            $.get(this.baseURI + '/show/' + idStudent, function (data) {

                // variables
                var dni = data[0].dni;
                var firstname = data[0].firstname;
                var lastname = data[0].lastname;
                var image = data[0].image;
                var career = data[0].career;


                // iguala los campos con las variables
                document.getElementById('dni').value = dni;
                document.getElementById('firstname').value = firstname;
                document.getElementById('lastname').value = lastname;
                document.getElementById('image').value = image;
                document.getElementById('career').value = career;


            });
        });
    }

});

