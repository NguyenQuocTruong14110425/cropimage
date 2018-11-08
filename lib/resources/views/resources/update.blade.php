<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <!-- Styles -->
    </head>
    <body>
        <div class="container">
                <a type="buttons" class="btn btn-info" href="{{URL::to('/admin/resources')}}">Back</a>
            @if(Session::has('$messageQuery'))
                <p class="alert alert-danger">{{ Session::get('$messageQuery') }}</p>
            @endif
            @if(Session::has('error'))
                @foreach(Session::get('error') as $mssage)
                    @foreach($mssage as $key=>$value)
                    <p class="alert alert-danger"><span>Error {{$key}}: </span>{{$value}}</p>
                    @endforeach
                @endforeach
            @endif
                <form method="post" action="{{URL::to('admin/resources/update/' . $resources_destail->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="title" class="col-2">title:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{$resources_destail->resources_title}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-2">description:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="description" name="description"  value="{{$resources_destail->resources_description}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keyword" class="col-2">path:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="path" name="path"  value="{{$resources_destail->resources_path}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags" class="col-2">thumb:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="thumb" name="thumb"  value="{{$resources_destail->resources_thumb}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags" class="col-2">thumb:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="type" name="type"  value="{{$resources_destail->resources_type}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lang_code" class="col-2">lang code:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="lang_code" name="lang_code"  value="{{$resources_destail->resources_lang_code}}">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
            </div>
    </body>
</html>
