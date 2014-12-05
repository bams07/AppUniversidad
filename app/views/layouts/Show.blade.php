    {{ HTML::style('css/tabs.css'); }}

    {{ HTML::script('js/Tabs.js'); }}

         <div id="my-tab-content" class="tab-content">
          <div class="tab-pane fade in active" id="students">

<div class="form-group">
                     <div class="col-md-12" id="image-space-show" align="center">{{HTML::image('images/admin/student_pic.png','student',array('class'=>'image-student-show','width'=>'170px','heigth'=>'170px','id'=>'image-student-show'))}}</div>
                      </div>
                        <div class="form-group">

                         {{Form::label('dni','DNI')}}
                          {{Form::text('dni','',array('class'=>'form-control','id'=>'dni','disabled'=>'false'))}}
                         </div>

                           <div class="form-group">
                             {{Form::label('firstname','Firstname')}}
                               {{Form::text('firstname','',array('class'=>'form-control','id'=>'firstname','disabled'=>'false'))}}
                            </div>

                           <div class="form-group">
                              {{Form::label('lastname','Lastname')}}
                              {{Form::text('lastname','',array('class'=>'form-control','id'=>'lastname','disabled'=>'false'))}}
                           </div>

                           <div class="form-group">
                                                {{Form::label('career','career')}}
                                                {{Form::text('career','',array('class'=>'form-control','id'=>'career','disabled'=>'false'))}}
                                                </div>

                      </div>
          <div class="tab-pane fade" id="skills">
              <table id="tableSkills" class="table table-bordred ">
                              <thead>

                               </thead>

                                  </tbody>

                                </table>

          </div>
          <div class="tab-pane fade" id="projects">
               <table id="tableProjects" class="table table-bordred ">
                                            <thead>

                                             </thead>

                                                </tbody>

                                              </table>

          </div>
          <div class="tab-pane fade" id="coments">
              <h1>coments</h1>

          </div>
      </div>

