
                     {{--Inicio modal--}}
                     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                           <div class="modal-dialog">
                         <div class="modal-content">
                               <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title custom_align" id="heading-user-show">User edit</h4>
                           </div>
                              {{--Inicio formualrio --}}
                                {{ Form::open(array('method'=>'PUT','id'=>'form-edit'))}}
                               <div class="modal-body">

                                      <div class="form-group">

                                            {{Form::label('roles','Roles')}}
                                        <select name="rol" id="roles" class="form-control">

                                            @foreach($roles as $rol)

                                                <option value="{{$rol->idRol}}">{{$rol->rol}}</option>

                                            @endforeach

                                        </select>

                                     </div>
                               <div class="form-group">
                             {{Form::label('username','Username')}}
                             {{Form::text('username','',array('class'=>'form-control','id'=>'username'))}}
                             </div>

                             <div class="form-group">
                             {{Form::label('name','Name')}}
                             {{Form::text('name','',array('class'=>'form-control','id'=>'name'))}}
                             </div>

                             <div class="form-group">
                             {{Form::label('dni','DNI')}}
                             {{Form::text('dni','',array('class'=>'form-control','id'=>'dni'))}}
                             </div>

                              <div class="form-group">
                              {{Form::label('password','Password (Leave white if you like the same password)')}}
                               {{Form::password('password',array('class'=>'form-control','id'=>'password'))}}
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

















