<!--Extendemos el layouts.Dashboard para la plantilla que manejaremos-->
@extends('layouts.Dashboard')

@section('css')
 {{ HTML::style('css/front.css'); }}
 {{ HTML::style('css/tabs.css'); }}
@stop

@section('js')
 {{ HTML::script('js/Searchs.js'); }}
 {{ HTML::script('js/Tabs.js'); }}
@stop


<title>Universidad Tecnica Nacional</title>
</head>
<body>

<div class="row">{{--Inicio del div  class row--}}
    <div class="login" >{{--Inicio del div  class login--}}
     <a type="button" class="btn btn-primary pull-right login" href="admin/login">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                     </a>
    </div>{{--Fin del div  class login--}}
    <div class="overlay">
    <center><h1>Universidad Tecnica Nacional</h1></center>


    <div class="container">{{--Inicio del div  class container--}}
    	<div class="row">{{--Inicio del div  class row--}}
               <div id="custom-search-input">{{--Inicio del div  id custom-search-input--}}
                <div class="input-group col-md-12">{{--Inicio del div  class input-group col-md-1--}}
                    <input type="text" id="search" class=" search search-query form-control" placeholder="Search" />
                </div>{{--Fin del div  class input-group col-md-12--}}
               </div>{{--Fin del div  id custom-search-input--}}

                <div class="form-group option">{{--Inicio del div  class option--}}
                    {{--Inicio de select--}}
                     <select name="option" id="option" class="form-control">

                       <option value="skills" >Skills</option>
                       <option value="technology">Technology</option>

                      </select>{{--Fin de select--}}

                       </div>{{--Fin del div  class option--}}

                 </div>{{--Fin del div  class row--}}

                {{--Inicio de la tabla--}}
               <table id="mytable" class="table table-bordred ">
                <thead>

                 </thead>

                    </tbody>

                  </table>{{--Fin de la tabla--}}
    	</div>{{--Fin del div  class container--}}
    </div>{{--Fin del div  class overlay--}}

</div>{{--Fin del div  class login--}}
    @include('front.show'){{--Incluimos el front.show--}}
</body>
</html>