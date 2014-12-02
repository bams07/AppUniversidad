<!--Creamos el layout del main principal para implementarlo en las demas views-->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!--Implementamos los css y javascript con codigo blade-->
    {{ HTML::style('css/bootstrap.css'); }}
    {{ HTML::style('css/bootstrap-theme.css'); }}
    {{HTML::style('css/sb-admin.css')}}
    {{HTML::style('css/styles.css')}}
     @yield('css')

    {{ HTML::script('js/jquery.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/jasny-bootstrap.js'); }}

     @yield('js')


    <title>@yield('title_browser')- Universidad Tecnica Nacional</title>

</head>
<body>

  <div id="wrapper">

      @yield('menu')

      <!--div con class top-->
      <div clas="top">
         @yield('tittle')<!--Aqui va el contenido que va a tener top con el contenido tittle-->
      </div><!--fin div top-->

       <!--div con class container-->
        <div class="container-fluid">
           @yield('content')<!--Aqui va el contenido que va a tener container con el contenido content-->
        </div><!--fin div container-->

         <!--div con class footer-->
          <div class="footer">
             @yield('foot')<!--Aqui va el contenido que va a tener footer con el contenido foot-->
          </div><!--fin div footer-->

   </div>

          <script type="javascript">

                @yield('function_js')


          </script>

</body>
</html>