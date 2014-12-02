           {{--Inicio modal--}}
                     <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                           <div class="modal-dialog">
                         <div class="modal-content">
                               <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                 <h4 class="modal-title custom_align" id="heading-user-show">Career edit</h4>
                           </div>
                              {{--Inicio formualrio --}}
                                {{ Form::open(array('method'=>'PUT','id'=>'form-edit'))}}
                               <div class="modal-body">

                               <div class="form-group">
                             {{Form::label('career','career')}}
                             {{Form::text('career','',array('class'=>'form-control','id'=>'career'))}}
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
