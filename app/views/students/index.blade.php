<!--Extendemos el layouts.Dashboard para la plantilla que manejaremos-->
@extends('layouts.Dashboard')

<!--Incluimos la seccion de tittle_browser-->
@section('title_browser')
Students
@stop<!--Fin de seccion tittle_browser-->

<!--Incluimos la seccion de menu-->
@section('menu')
<!--Incluimos en el layout la ruta de Careers-->
@include('layouts.Menu',array('ruta'=>'Students'))
@stop<!--Fin de seccion menu-->

@section('js')
 {{ HTML::script('js/Students.js'); }}
@stop



@section('content')
        {{--}}RECIBE EL MENSAJE SI FUERA CORRECTO CUANDO SE ALMACENA ALGUN DATO O EDITA DE MALA MANERA Y LO MUESTRA--}}
        @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              {{Session::get('message')}}
            </div>
        @endif
        {{--RECIBE EL MENSAJE SI FUERA ERROR CUANDO SE ALMACENA ALGUN DATO O EDITA DE MALA MANERA Y LO MUESTRA--}}
        @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      {{Session::get('error')}}
                    </div>
        @endif
        {{--Inicio row --}}
        <div class="row">

        <div class="col-lg-12">

              {{-- Inicio table --}}
             <table id="mytable" class="table table-bordred table-striped">

        <h1 class="title-top-table">Students</h1>
            <a type="button" href="#" class="col-lg-2 btn btn-success submit-button pull-right" data-title="create" data-toggle="modal" data-target="#create" data-placement="top">
                 <span class="glyphicon glyphicon-plus"></span>Add
            </a>

            {{--Menu de la tabla--}}
            <thead>

               <th></th>
               <th>DNI</th>
               <th>First Name</th>
               <th>Last Name</th>
               <th>Career</th>
               <th>Options</th>
              </thead>
                <tbody>
                   </tr>
                     @foreach($students as $student)
                       <tr>
                       <td><a type="button" href="#" id="{{$student->idstudent}}" data-title="show" data-toggle="modal" data-target="#show" data-placement="top">
                       {{HTML::image('images/students/'.$student->image,'student',array('class'=>'image-student-list'))}}</a></td>
                       <td>{{$student->dni}}</td>
                       <td>{{$student->firstname}}</td>
                       <td>{{$student->lastname}}</td>
                       <td>{{$student->career}}</td>
                       <td> {{--Inicio formualrio eliminar --}}
                       {{Form::open(array('id'=>'form'.$student->idstudent,'url' => array('/admin/students', $student->idstudent),'method'=>'DELETE'))}}
                        <a type="button" id="{{$student->idstudent}}" data-title="edit" data-toggle="modal" data-target="#edit" data-placement="top" href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
                               <div class="btn-group">
                                                 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                 <span class="glyphicon glyphicon-th-list"></span>  More <span class="caret"></span>
                                                 </button>
                                                 <ul class="dropdown-menu" role="menu">
                                                   <li><a href="#">Projects</a></li>
                                                   <li><a data-toggle="modal" data-title="comments" data-target="#comments" data-placement="top" id="{{$student->idstudent}}"  href="#">Comments</a></li>
                                                 </ul>
                                               </div>
                       {{ Form::close() }}
                          {{--Final del formulario eliminar--}}
                       </td>
                       </tr>

                       @endforeach
                </tbody>

                       </table>


           </div>

 </div> {{--Fin row--}}

     @stop

      {{--Vista del CRUD--}}
         @include('students.show')
         @include('students.comments.modal')
         @include('students.create',array('careers'=>$careers))
         @include('students.edit',array('careers'=>$careers))
