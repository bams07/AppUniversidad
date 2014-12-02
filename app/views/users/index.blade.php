@extends('layouts.Dashboard')

@section('title_browser')
Users
@stop

@section('menu')
@include('layouts.Menu',array('ruta'=>'Users'))
@stop

@section('js')

 {{ HTML::script('js/Users.js'); }}

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

        <h1 class="title-top-table">Users</h1>
            <a type="button" href="#" class="col-lg-2 btn btn-success submit-button pull-right" data-title="create" data-toggle="modal" data-target="#create" data-placement="top">
                 <span class="glyphicon glyphicon-plus"></span>Add
            </a>

            {{--Menu de la tabla--}}
            <thead>
            <th>Username</th>
            <th>Name</th>
            <th>DNI</th>
            <th>Role</th>
            <th>Options</th>
            </thead>
            {{--Fin menu--}}

            <tbody>

            {{--Ciclo que recorre los usuarios y los muestra--}}
            @foreach($users as $user)
                        <tr>
                        <td><a type="button" href="#" id="{{$user->idUser}}" data-title="show" data-toggle="modal" data-target="#show" data-placement="top">{{$user->username}}</a></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->dni}}</td>
                        <td>{{$user->rol}}</td>
                        <td>

                      {{--Inicio formualrio --}}
                      {{Form::open(array('id'=>'form'.$user->idUser,'url' => array('/admin/users', $user->idUser),'method'=>'DELETE'))}}

                       <a type="button" id="{{$user->idUser}}" data-title="edit" data-toggle="modal" data-target="#edit" data-placement="top" href="#" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                       <a type="button" href="javascript:document.getElementById('form{{$user->idUser}}').submit()" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a>

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
    @include('users.show')
    @include('users.create',array('roles'=>$roles))
    @include('users.edit',array('roles'=>$roles))
