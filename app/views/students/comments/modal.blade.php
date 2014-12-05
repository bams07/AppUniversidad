 {{--Inicio modal--}}
            <div class="modal fade" id="comments" tabindex="-1" role="dialog" aria-labelledby="comments" aria-hidden="true">
                  <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title custom_align" id="heading-user-show">Student comments</h4>
                  </div>
                   <div class="modal-body">

                   <div id="comments">

              <ul class="list-group">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="http://www.jquery2dotnet.com/2013/10/google-style-login-page-desing-usign.html">
                                        Google Style Login Page Design Using Bootstrap</a>
                                    <div class="m   ic-info">
                                        By: <a href="#">Bhaumik Patel</a> on 2 Aug 2013
                                    </div>
                                </div>
                                <div class="comment-text">
                                    Awesome design
                                </div>
                                <div class="action">
                                    <button type="button" class="btn btn-primary btn-xs" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                    </div>

                 {{ Form::open(array('url' => '/admin/students/comments','id'=>'form-create')) }}

                  {{Form::hidden('idUser',Auth::user()->idUser,array('class'=>'form-control','id'=>'idUser'))}}
                  {{Form::hidden('idStudent',Auth::user()->idUser,array('class'=>'form-control','id'=>'idStudent'))}}

                                    <div class="form-group">
                                    {{Form::label('date','Date')}}
                                    {{Form::input('date','date',null,array('class'=>'form-control','id'=>'comment'))}}

                                    </div>

                                      <div class="form-group">
                                    {{Form::label('nameUser','Teacher')}}
                                    {{Form::text('nameUser',Auth::user()->name,array('class'=>'form-control','id'=>'nameUser','disabled'=>'true'))}}
                                    </div>

                                    <div class="form-group">
                                    {{Form::label('comment','Comment')}}
                                    {{Form::textarea('comment','',array('class'=>'form-control','id'=>'comment'))}}

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


