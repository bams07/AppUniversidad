 <?php

    $menu = array(
    array('icon'=>'glyphicon glyphicon-th-large','title'=>'Dashboard','url'=>'/admin'),
    array('icon'=>'glyphicon glyphicon-folder-close','title'=>'Careers','url'=>'/admin/careers'),
    array('icon'=>'glyphicon glyphicon-book','title'=>'Students','url'=>'/admin/students'),
    array('icon'=>'glyphicon glyphicon-user','title'=>'Users','url'=>'/admin/users'));

    ?>

     <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Universidad Tecnica Nacional</a>
                </div>

                {{-- Menu usuario --}}
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Bienvenido {{Auth::user()->username}}<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="#"><i class="glyphicon glyphicon-user"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="/admin/logout"><i class="glyphicon glyphicon-log-out"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                {{-- Termina Menu usuario --}}

               {{-- Menu de lado --}}
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">

                     @foreach($menu as $item)
                          @if($ruta == $item['title'])
                                 <li class="active">
                           @else
                                   <li>
                           @endif
                                   <a href="{{$item['url']}}">
                                      <i class="{{$item['icon']}}"></i>
                                      <span> {{$item['title']}}</span>
                                   </a>
                                   </li>
                        @endforeach
                    </ul>
                </div>
                {{-- Termina Menu de lado --}}
            </nav>

