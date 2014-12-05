// se activa cuando el documento este cargado
$(document).ready(function () {

    // Carga la imagen en el espacio de la imagen
    $('#image-file').change(function() {

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

            reader.onload = function(e) {

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
                            $student += '<th class="Skills">Image</th>><th class="Skills">DNI</th>><th class="Skills">First Name</th><th class="Skills">Last Name</th>';
                        }
                        $student += '<tr><td class="Skills"><a type="button" href="#"   data-title="showSearch" data-toggle="modal" data-target="#showSearch" data-placement="top"  id="' + data[i].idstudent + '" >';
                        $student += '<img id="student" class="image-student-list" src="/images/students/' + data[i].dni + '" ></a></td>'
                        $student += '<td class="Skills">' + data[i].dni + '</td><td class="Skills">' + data[i].firstname + '</td><td class="Skills">' + data[i].firstname + '</td></tr>';


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
            $skills = "";
            $projects = "";
            $comments = "";

            // obtiene los datos del usuario
            $.get(this.baseURI + '/show/' + idStudent, function (data) {

                // variables
                var dni = data['students'][0].dni;
                var firstname = data['students'][0].firstname;
                var lastname = data['students'][0].lastname;
                var image = data['students'][0].image;
                var idcareer = data['students'][0].career;


                // iguala los campos con las variables
                document.getElementById('dni').value = dni;
                document.getElementById('firstname').value = firstname;
                document.getElementById('lastname').value = lastname;
                document.getElementById('career').value = idcareer;

                var image_Values = document.getElementById('image-student-show');

                image_Values.src =  window.location.protocol+"//"+window.location.host+'/images/students/'+image;
                image_Values.width = 180;
                image_Values.height = 170;

                for (i = 0; i < data['skills'].length; i++){

                    $skills += '<tr></tr><td>' + data['skills'][i].skill + '</td></tr>';

                }
                document.getElementById('tableSkills').innerHTML = $skills;

                for (j = 0; j < data['projects'].length; j++){

                    if (j == 0) {
                        $projects += '<th >Course</th><th>Duration</th><th>Description</th><th>Date</th><th>score</th><th>Technology</th>';
                    }
                    $projects += '<tr><td>' + data['projects'][j].course + '</td>';
                    $projects += '<td>' + data['projects'][j].duration + '</td>';
                    $projects += '<td>' + data['projects'][j].description + '</td>';
                    $projects += '<td>' + data['projects'][j].date + '</td>';
                    $projects += '<td>' + data['projects'][j].score + '</td>';
                    $projects += '<td><select class="selectpicker" data-style="btn-success" size="2">';
                    $projects += '<option>' +data['projects'][j].technology + '</option>';
                    for (k = j + 1; k < data['projects'].length; k++) {

                        if (data['projects'][j].description == data['projects'][k].description) {

                            $projects += '<option>' + data['projects'][k].technology + '</option>';
                            j++;

                        } else {

                            break;
                        }
                    }
                    $projects += '</select> </td></tr>';


                }
                document.getElementById('tableProjects').innerHTML = $projects;

                for(l = 0; l < data['comments'].length; l++){
                    $comments += '<div class="comment-text">' + data['comments'][l].commentary + '</div>';
                    $comments += '<div class="mic-info"> By:' + data['comments'][l].firstname + ' on:' + data['comments'][l].date + '</div>';

                }
                document.getElementById('comment').innerHTML = $comments;

            });
        });
    }
});