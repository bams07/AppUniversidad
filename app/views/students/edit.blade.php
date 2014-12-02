                   {{--Inicio modal--}}
                     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                           <div class="modal-dialog">
                         <div class="modal-content">
                               <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title custom_align" id="heading-user-show">Student edit</h4>
                           </div>
                              {{--Inicio formualrio --}}
                                {{ Form::open(array('method'=>'PUT','id'=>'form-edit','files'=>true))}}
                               <div class="modal-body">

                                  <div class="form-group">

                                      <div class="col-md-12" id="image-space-edit" align="center">{{HTML::image('images/admin/student_pic.png','student',array('class'=>'image-student-edit','width'=>'170px','heigth'=>'170px','id'=>'image-student-edit'))}}</div>
                                      <div class="col-md-12" align="center">{{Form::file('image-file-edit',array('class'=>'btn btn-primary','id'=>'image-file-edit'))}}</div>

                                   </div>

                                    <div class="form-group">
                                        {{Form::label('dni','DNI')}}
                                        {{Form::text('dni','',array('class'=>'form-control','id'=>'dni'))}}
                                    </div>

                                        <div class="form-group">
                                          {{Form::label('firstname','Firstname')}}
                                          {{Form::text('firstname','',array('class'=>'form-control','id'=>'firstname'))}}
                                        </div>

                                         <div class="form-group">
                                           {{Form::label('lastname','Lastname')}}
                                           {{Form::text('lastname','',array('class'=>'form-control','id'=>'lastname'))}}

                                         </div>

                                           <div class="form-group">
                                           {{Form::label('careers','Careers')}}
                                            <select name="career" id="career" class="form-control">

                                               @foreach($careers as $careers)

                                                 <option value="{{$careers->idcareer}}">{{$careers->career}}</option>

                                               @endforeach

                                            </select>
                                            </div>
                          </div>
                               <div class="modal-footer ">
                             <button type="submit" id="btn-modal-edit" class="btn btn-success btn-lg" ><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
                           </div>
                          {{ Form::close() }}
                          {{--Final del formulario--}}
                             </div>
                       </div>
                         </div> {{--Fin modal--}}