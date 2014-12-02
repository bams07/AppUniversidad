    {{ HTML::style('css/tabs.css'); }}


    {{ HTML::script('js/Tabs.js'); }}

         <div id="my-tab-content" class="tab-content">
          <div class="tab-pane active" id="student">
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
             {{Form::label('image','Image')}}
             {{Form::text('image','',array('class'=>'form-control','id'=>'image','disabled'=>'false'))}}

           </div>

              <div class="form-group">
                {{Form::label('career','career')}}
                {{Form::text('career','',array('class'=>'form-control','id'=>'career','disabled'=>'false'))}}

              </div>
          </div>
          <div class="tab-pane" id="skills">
              <h1>skills</h1>

          </div>
          <div class="tab-pane" id="projects">
              <h1>projects</h1>

          </div>
          <div class="tab-pane" id="coments">
              <h1>coments</h1>

          </div>
          <div class="tab-pane" id="blue">
              <h1>Blue</h1>
              <p>blue blue blue blue blue</p>
          </div>
      </div>
  </div>
