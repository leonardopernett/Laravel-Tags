<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
    </head>
    <body>
      <div class="container">
          <div class="row">
              <div class="col-md-8">
                  <h1 class="page-header"> Sistema de etiquetas</h1>
                  <br>
                  @if(Session::has('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                  @endif

                  @if(count($errors))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>  {{$error}}</li>
                            @endforeach
                       </ul>
                    </div>
                  @endif
                  <div class="panel">
                        <form action="{{ route('post.store') }}" method="post">
                         @csrf
                         <div class="form-group">
                            <input type="text" class="form-control" placeholder="title" name="title">
                         </div>
                         <div class="form-group">
                             <textarea name="description" class="form-control" placeholder="description" rows="2"></textarea>
                         </div>
            
                        <div class="form-group well">
                            <label for="">tags (wors separate comma) </label>
                            <input type="text" class="form-control" data-role="tagsinput" placeholder="Tags" name="tags">
                         </div>
                         <button class="btn btn-primary" type="submit">Save</button>
                      </form>
                  </div>
                  <hr>
                  <h4>Lists tags</h4>
                  @foreach($posts as $post)      
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                         <h4>{{$post->title}}</h4>
                      </div>
                      <div class="panel-body">
                          {{$post->description}}
                      </div>
                      <div class="panel-footer">
                          @forelse($post->tags as $tag)
                               <span class="label label-info ">
                                   {{ $tag->name}}
                               </span>
                            @empty
                            <em>Sin etiquetas</em>
                          @endforelse
                      </div>
                    </div>
                 @endforeach
              </div>
          </div>
      </div>


       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    </body>
</html>
