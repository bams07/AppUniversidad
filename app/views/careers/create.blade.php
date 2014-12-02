  {{--Inicio modal--}}
            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create" aria-hidden="true">
                  <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="heading-user-show">Career create</h4>
                  </div>

                   {{--Inicio formualrio --}}
                  {{ Form::open(array('url' => '/admin/careers','id'=>'form-create')) }}

                      <div class="modal-body">

                      <div class="form-group">
                    {{Form::label('career','Career')}}
                    {{Form::text('career','',array('class'=>'form-control','id'=>'career'))}}
                    </div>

                  </div>
                      <div class="modal-footer ">

                    <button type="submit" id="btn-careers-save" class="btn btn-success btn-group-sm" ><span class="glyphicon glyphicon-ok-sign"></span> Create</button>
                    <button type="reset"  id="btn-careers-cancel"  data-dismiss="modal" class="btn btn-default btn-group-sm" ><span class="glyphicon glyphicon-refresh"></span> Cancel</button>

                  </div>
                  {{ Form::close() }}

                  {{--Final del formulario--}}

                    </div>


              </div>
                </div> {{--Fin modal--}}
