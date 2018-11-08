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
                <a type="buttons" class="btn btn-success" href="{{URL::to('resources/create')}}">Create</a>
            @if(Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Desciption</th>
                        <th>Keyword</th>
                        <th>Tag</th>
                        <th>path</th>
                        <th>Lang code</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($resources as $value)
                        <tr>
                            <td>{{$value->resources_title}}</td>
                            <td>{{$value->resources_description}}</td>
                            <td>{{$value->resources_keyword}}</td>
                            <td>{{$value->resources_tags}}</td>
                            <td>{{$value->resources_path}}</td>
                            <td>{{$value->resources_lang_code}}</td>
                            <td>
                                <a href="{{URL::to('/admin/resources/update/' . $value->id)}}" title="update" class="btn btn-info">Update</a>
                                <a href="{{URL::to('/admin/resources/delete/' . $value->id)}}" title="trash" class="btn btn-danger">Trash</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </body>
</html>
