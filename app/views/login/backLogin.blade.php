@extends('layouts.Login')

@section('css')
   {{ HTML::style('css/login.css'); }}
@stop
@section('title_browser')
Login
@stop

@section('js')
 {{ HTML::script('js/Carrousel.js'); }}
@stop

@section('content')

        <div class="row">


            <div class="col-md-12">

            <h1 class="title-login">Universidad Tecnica Nacional</h1>

               <div class="col-md-6">
                <div id="slide" class="carousel slide">

               {{--}}{{ HTML::image('images/estudiantes.jpg') }}--}}
                <!-- Bloque para las imágenes -->
                 <div class="carousel-inner">
                   <div class="item active">
                      {{ HTML::image('images/estudiantes.jpg') }}
                   </div>
                   <div class="item">
                      {{ HTML::image('images/Koala.jpg') }}

                   </div>
                   <div class="item">
                     {{ HTML::image('images/Lighthouse.jpg') }}

                   </div>
                 </div>
               </div>
               </div>

                    <div class="col-md-6">

                <div class="form-group">

                {{--Recive un mensaje por session el cual muestra un error si fuera el caso --}}

                 @if (Session::has('error_login'))
                 <div class="alert alert-danger alert-dismissible" role="alert">
                   <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                   {{Session::get('error_login')}}.
                 </div>
                    @endif

               {{--Inicio formualrio --}}
              {{ Form::open(array('url' => '/admin/login')) }}


                {{Form::label('username','Username:')}}

                <div class="input-group">
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-user"></span>
                  </span>
                  {{Form::text('username','',array('id'=>'username','class'=>'form-control','placeholder'=>'Username'))}}
                </div>

                </div>
                <div class="form-group">

                 {{Form::label('password','Password:')}}
                 <div class="input-group">
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-lock"></span>
                       </span>
                 {{Form::password('password',array('id'=>'password','class'=>'form-control','placeholder'=>'Password'))}}
                  </div>
                 </div>

                 <div class="form-group">

                 <button type="submit" class="btn btn-primary pull-right">
                    <span class="glyphicon glyphicon-log-in"></span>Login
                 </button>

                 </div>
                {{ Form::close() }}
                {{--Fin formualario--}}

					</div>
               					</div>
                </div>
        </div>


@stop
