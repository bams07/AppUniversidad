@extends('layouts.Dashboard')

@section('title_browser')
Careers
@stop

@section('menu')
@include('layouts.Menu',array('ruta'=>'Careers'))
@stop

@section('js')

 {{ HTML::script('js/Careers.js'); }}

@stop

 @section('content')

         @if (Session::has('message'))
             <div class="alert alert-success alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
               {{Session::get('message')}}
             </div>
         @endif

         {{--Inicio row --}}
         <div class="row">

         <div class="col-lg-12">

               {{-- Inicio table --}}
              <table id="mytable" class="table table-bordred table-striped">

         <h1 class="title-top-table">Careers</h1>
             <a type="button" href="#" class="col-lg-2 btn btn-success submit-button pull-right" data-title="create" data-toggle="modal" data-target="#create" data-placement="top">
                  <span class="glyphicon glyphicon-plus"></span>Add
             </a>

             {{--Menu de la tabla--}}
             <thead>
            <th>ID</th><!--th para el campo ID-->
            <th>Career</th><!--th para el campo Name-->
            <th>Options</th><!--th para el campo Options-->
             </thead>
             {{--Fin menu--}}

             <tbody>

            @foreach($careers as $career)
            <tr><!--tr de la tabla-->
            <td><a type="button" href="#" id="{{$career->idcareer}}" data-title="show" data-toggle="modal" data-target="#show" data-placement="top">{{$career->idcareer}}</a></td>
            <td>{{$career->career}}</td><!--td donde va el valor del campo Name-->
            <td><!--td donde va el valor del campo Options-->

                       {{--Inicio formualrio --}}
            {{Form::open(array('id'=>'form'.$career->idcareer,'url' => array('/admin/careers', $career->idcareer),'method'=>'DELETE'));}}

                        <a type="button" id="{{$career->idcareer}}" data-title="edit" data-toggle="modal" data-target="#edit" data-placement="top" href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                        <a type="button" href="javascript:document.getElementById('form{{$career->idcareer}}').submit()" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>

                        {{ Form::close() }}
                        {{--Final del formulario--}}
                         </td>
                         </tr>

                         @endforeach
              {{--Fin del ciclo--}}

             </tbody>


             </table>
             {{--Fin table--}}


             </div>

                 </div> {{--Fin row--}}

     @stop

     {{--Vista del CRUD--}}
     @include('careers.show')
     @include('careers.create')
     @include('careers.edit')


















