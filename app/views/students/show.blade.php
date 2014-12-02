{{--Inicio modal--}}
        <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
              <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title custom_align" id="heading-user-show">User detail</h4>
              </div>
                  <div class="modal-body">

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

                  <div class="modal-footer ">
                    <button type="button" id="btn-modal-edit" class="btn btn-warning btn-lg" data-dismiss="modal" ><span class="glyphicon glyphicon-ok-sign"></span> Back</button>
                  </div>
                </div>
          </div>
            </div> {{--Fin modal--}}
