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

<div class="row">
    <div class="login" >
     <a type="button" class="btn btn-primary pull-right login" href="login">
                        <span class="glyphicon glyphicon-log-in"></span> Login
                     </a>

    </div>
    </div>
    <div class="overlay">
    <center><h1>Universidad Tecnica Nacional</h1></center>


    <div class="container">
    	<div class="row">
               <div id="custom-search-input">
                <div class="input-group col-md-12">
                    <input type="text" id="search" class=" search search-query form-control" placeholder="Search" />
                </div>
               </div>

                <div class="form-group option">

                     <select name="option" id="option" class="form-control">

                       <option value="skills" >Skills</option>
                       <option value="technology">Technology</option>

                      </select>

                       </div>

                 </div>

               <table id="mytable" class="table table-bordred ">
                <thead>

                 </thead>

                    </tbody>

                  </table>
    	</div>
    </div>

</div>
    @include('front.show')
</body>
</html>