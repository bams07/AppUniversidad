@extends('layouts.Dashboard')

@section('title_browser')
Dashboard
@stop

@section('menu')
@include('layouts.Menu',array('ruta'=>'Dashboard'))
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

                             <h1 class="title-top-table">Dashboard</h1>


                                 {{--Menu de la tabla--}}
                                 <thead>
                                <th>Search</th><!--th para el campo ID-->
                                <th>Description</th><!--th para el campo Name-->
                                <th>Date</th><!--th para el campo Options-->
                                 </thead>
                                 {{--Fin menu--}}

                                 <tbody>

                                @foreach($shows as $show)
                                <tr><!--tr de la tabla-->
                                <td>{{$show->type}}</td>
                                <td>{{$show->description}}</td><!--td donde va el valor del campo Name-->
                                <td>{{$show->date}}
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