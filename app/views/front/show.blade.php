{{--Inicio modal--}}
        <div class="modal fade" id="showSearch" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="heading-user-show">User detail</h4>
                                    <div class="board">
                                        <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                                        <div class="board-inner">
                                        <ul class="nav nav-tabs" id="myTab">
                                        <div class="liner"></div>
                                         <li class="active">
                                         <a href="#students" data-toggle="tab" title="students">
                                          <span class="round-tabs one">
                                                  <i class="glyphicon glyphicon-user"></i>
                                          </span>
                                      </a></li>

                                      <li><a href="#skills" data-toggle="tab" title="skills">
                                         <span class="round-tabs two">
                                             <i class="glyphicon glyphicon-tasks"></i>
                                         </span>
                               </a>
                                     </li>
                          <li><a href="#projects" data-toggle="tab" title="projects">
                                                                  <span class="round-tabs three">
                                                                      <i class="glyphicon glyphicon-folder-open"></i>
                                                                  </span>
                                                        </a>
                                                              </li>
                           <li><a href="#coments" data-toggle="tab" title="coments">
                                                                   <span class="round-tabs four">
                                                                       <i class="glyphicon glyphicon-comment"></i>
                                                                   </span>
                                                         </a>
                                                               </li>

                                         </ul>
              </div>
                  <div class="modal-body">


                    @include('layouts.Show')

                  <div class="modal-footer ">
                    <button type="button" id="btn-modal-edit" class="btn btn-warning btn-lg" data-dismiss="modal" ><span class="glyphicon glyphicon-ok-sign"></span> Back</button>
                  </div>
                </div>
          </div>
            </div> {{--Fin modal--}}