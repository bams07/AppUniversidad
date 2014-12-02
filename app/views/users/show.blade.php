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
                 {{Form::label('rol','Rol')}}
                 {{Form::text('rol','',array('class'=>'form-control','id'=>'rol','disabled'=>'false'))}}
                  </div>
                  <div class="form-group">
                {{Form::label('username','Username')}}
                {{Form::text('username','',array('class'=>'form-control','id'=>'username','disabled'=>'false'))}}
                </div>
                <div class="form-group">
                {{Form::label('name','Name')}}
                {{Form::text('name','',array('class'=>'form-control','id'=>'name','disabled'=>'false'))}}
                </div>
                <div class="form-group">
                {{Form::label('dni','DNI')}}
                {{Form::text('dni','',array('class'=>'form-control','id'=>'dni','disabled'=>'false'))}}

                </div>
              </div>
                  <div class="modal-footer ">
                <button type="button" id="btn-modal-edit" class="btn btn-warning btn-lg" data-dismiss="modal" ><span class="glyphicon glyphicon-ok-sign"></span> Back</button>
              </div>
                </div>
          </div>
            </div> {{--Fin modal--}}
