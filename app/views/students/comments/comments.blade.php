 <ul class="list-group">
        @foreach($comments as $comment)
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-lg-12">
                            <div class="comment-user">

                            </div>
                            <div class="comment-date">
                             <p>{{$comment->date}}</p>
                            </div>
                              <div class="comment-text">
                                     <p>{{$comment->commentary}}</p>
                                </div>
                             </div>
                                <div id="comment-options" class="col-lg-10">
                                   {{Form::open(array('url' => array('/admin/students/comments', $comment->idcommentary),'method'=>'DELETE'))}}
                                    <a type="button" data-title="btn-comment-edit" id="{{$comment->idcommentary}}" class="btn btn-primary" title="Edit">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <button type="submit" class="btn btn-danger" title="Delete">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                     <a style="display: none;" idcomment="{{$comment->idcommentary}}" data-title="btn-comment-check" type="button" id="{{$comment->idcommentary}}" class="btn btn-success" title="Confirm update">
                                        <span class="glyphicon glyphicon-check"></span>
                                     </a>
                                {{ Form::close() }}
                                {{--Final del formulario eliminar--}}
                                </div>
                            </div>
                        </div>
                    </li>

         @endforeach
                </ul>