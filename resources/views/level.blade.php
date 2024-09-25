<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>usuarios de {{ $level->name }}</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>
    <body class="antialiased">
        <div class="container">
            <div class="col-12 my-3 pt-3 shadow">
                <h1>Contenido de usuarios nivel {{ $level->name }}</h1>
                <hr>

            </div>
                <div class="row">
                @foreach ($posts as $post )
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{$post->image->url}}" class="card-img">
                                    </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$post->name}}</h5>
                                        <h6 class="card-subtitle text-muted">
                                            {{$post->category->name}}
                                            {{$post->comments_count}}
                                            {{Str::plural('comentario',$post->comments_count)}}
                                        </h6>
                                        <p  class="card-text small">
                                            @foreach ($post->tags as $tag )
                                            <span class="badge badge-light bg-dark">#{{$tag->name}}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>

                <h1>Contenido en videode usuarios nivel {{ $level->name }}</h1>
                <hr>
                <div class="row">
                @foreach ($videos as $video )
                    <div class="col-6">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{$video->image->url}}" class="card-img">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$video->name}}</h5>
                                        <h6 class="card-subtitle text-muted">
                                            {{$video->category->name}}
                                            {{$video->comments_count}}
                                            {{Str::plural('comentario',$video->comments_count)}}
                                        </h6>
                                        <p  class="card-text small">
                                            @foreach ($video->tags as $tag )
                                            <span class="badge badge-light bg-dark">#{{$tag->name}}</span>
                                            @endforeach
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                @endforeach
                </div>
            </div>
            
        </div>
    </body>
</html>