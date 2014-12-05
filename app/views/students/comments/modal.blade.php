 {{--Inicio modal--}}
            <div class="modal fade" id="comments" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="comments" aria-hidden="true">
                  <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                    <button type="button" id="comment-modal-close" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="heading-user-show">Student comments</h4>
                  </div>
                   <div class="modal-body">



                   {{--Aqui van los comentarios--}}
                   <div class="comments">

                    </div>

                 {{ Form::open(array('url' => '/admin/students/comments','id'=>'form-comments')) }}

                  {{Form::hidden('idUser',Auth::user()->idUser,array('class'=>'form-control','id'=>'comment-idUser'))}}
                  {{Form::hidden('idStudent',Auth::user()->idUser,array('class'=>'form-control','id'=>'comment-idStudent'))}}

                                    <div class="form-group">
                                    {{Form::label('date','Date')}}
                                    {{Form::input('date','date','20/2/2013',array('class'=>'form-control','id'=>'comment-date'))}}

                                    </div>

                                    <div class="form-group">
                                    {{Form::label('comment','Comment')}}
                                    {{Form::textarea('comment','',array('class'=>'form-control','id'=>'comment-text'))}}

                                    </div>
                    </div>
                      <div class="modal-footer ">

                        <button type="submit" id="btn-comment-save" class="btn btn-success btn-group-sm" ><span class="glyphicon glyphicon-ok-sign"></span> Create</button>
                        <button type="reset"  id="btn-comment-cancel"  data-dismiss="modal" class="btn btn-default btn-group-sm" ><span class="glyphicon glyphicon-refresh"></span> Cancel</button>

                       {{ Form::close() }}

                  </div>
                    </div>


              </div>
                </div> {{--Fin modal--}}


