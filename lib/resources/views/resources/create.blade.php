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
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Styles -->
        <link  href="{{URL::asset('public/css/cropper.css')}}" rel="stylesheet">
        <script src="{{URL::asset('public/js/cropper.js')}}"></script>
        <style>
            .drag_upload
            {
                position: relative;
                width: 100%;
                min-height: 300px;
                border-radius: 20px;
                border: 2px dotted #5a6268;
                cursor: pointer;
            }
            .drag_upload.highlight {
                border-color: #b91d19;
            }
            .drag_upload:hover,
            .drag_upload:focus
            {
                border-color: #f6993f;
                -webkit-box-shadow: 1px 1px 20px 0px rgba(212,165,123,1);
                -moz-box-shadow: 1px 1px 20px 0px rgba(212,165,123,1);
                box-shadow: 1px 1px 20px 0px rgba(212,165,123,1);
            }
            .highlight .info
            {
                display: none;
            }
            .drag_upload:hover .info,
            .drag_upload:focus .info
            {
                color: #f6993f;
            }
            .drag_upload .info
            {
                position: absolute;
                z-index: 999;
                left: 50%;
                top: 50%;
                transform: translate(-50%,-50%);
                color: #5a6268;
                text-align: center;
            }
            .drag_upload .info i
            {
                font-size: 70px;
            }
            .drag_upload .info p
            {
                font-size: 20px;
                font-weight: 600;
                margin-top: 15px;
            }
            #gallery img {
                position: relative;
                width: 150px;
                margin-bottom: 10px;
                margin-right: 10px;
                vertical-align: middle;
            }
            .input_upload
            {
                position: absolute;
                z-index: 9;
                width: 100%;
            }
            .image-crop
            {
                position: relative;
                width: 500px;
                height: 500px;
                border: 2px solid #5a6268;
                overflow: hidden;
            }
            /*.image-crop::before*/
            /*{*/
                /*content: '';*/
                /*position: absolute;*/
                /*z-index: 999;*/
                /*width: 450px;*/
                /*height: 450px;*/
                /*left: 50%;*/
                /*top: 50%;*/
                /*transform: translate(-50%,-50%);*/
                /*border: 2px solid #1b1e21;*/
            /*}*/
            /*.image-crop::after*/
            /*{*/
                /*content: '';*/
                /*position: absolute;*/
                /*z-index: 999;*/
                /*width: 450px;*/
                /*height: 450px;*/
                /*left: 50%;*/
                /*top: 50%;*/
                /*transform: translate(-50%,-50%);*/
                /*background: #fff;*/
                /*opacity: 0.2;*/
            /*}*/
            .footer
            {
                position: relative;
                width: 100px;
                height: 300px;
            }
            #target
            {
                position: absolute;
                z-index: 999;
            }
        </style>
    </head>
    <body>
        <div class="container">
                <a type="buttons" class="btn btn-info" href="{{URL::to('/resources')}}">Back</a>
            @if(Session::has('messageQuery'))
                <p class="alert alert-danger">{{ Session::get('messageQuery') }}</p>
            @endif
            @if(Session::has('error'))
                @foreach(Session::get('error') as $mssage)
                    @foreach($mssage as $key=>$value)
                    <p class="alert alert-danger"><span>Error {{$key}}: </span>{{$value}}</p>
                    @endforeach
                @endforeach
            @endif
                <form  METHOD="POST" action="{{URL::to('resources/create')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-2">title:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="title" name="title" value="hinh0123">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-2">description:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="description" name="description" value="description image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keyword" class="col-2">file:</label>
                        <div class="col-10">
                            {{--<div id="drag_upload" class="drag_upload">--}}
                                {{--<div id="taget" class="info">--}}
                                    {{--<i class="fas fa-upload"></i>--}}
                                    {{--<p>Drag images</p>--}}
                                {{--</div>--}}
                                {{--<progress id="progress-bar" max=100 value=0></progress>--}}
                                {{--<div id="gallery"></div>--}}
                                {{--<canvas id="myCanvas" width="500" height="300"></canvas>--}}
                            {{--</div>--}}
                            <input type="file" class="form-control input_upload" id="file" name="file">
                            <input type="hidden" class="form-control input_upload" id="x1" name="x1" value="">
                            <input type="hidden" class="form-control input_upload" id="y1" name="y1" value="">
                            <input type="hidden" class="form-control input_upload" id="w" name="w" value="">
                            <input type="hidden" class="form-control input_upload" id="h" name="h" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tags" class="col-2">type:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="type" name="type" value="images">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lang_code" class="col-2">lang code:</label>
                        <div class="col-10">
                            <input type="text" class="form-control" id="lang_code" name="lang_code"  value="en">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </form>
        </div>
        <div class="container">
            <h1>Customize preview for Cropper</h1>
            <button type="button" onclick="showCrop()" class="btn btn-success">Crop</button>
            {{--<label>X <input type="text" size="4" id="x1" name="x1" /></label>--}}
            {{--<label>Y <input type="text" size="4" id="y1" name="y1" /></label>--}}
            {{--<label>W <input type="text" size="4" id="w" name="w" /></label>--}}
            {{--<label>H <input type="text" size="4" id="h" name="h" /></label>--}}
            <input type="range" name="zoom" id="zoom" value="100" min="10" max="100">
            <div class="image-crop" id="image-crop">
                <img src="{{URL::to('logo.png')}}"  id="target" />
            </div>
            <div class="span3" id="interface">
            </div>
        </div>
        <div class="footer">

        </div>
        <script>

            $(document).ready(
                function(){

                    var width = $('#target').width();
                    var height = $('#target').height();
                    var widthScrop =  $('#image-crop').width();
                    var heightScrop =  $('#image-crop').height();
                    $('#zoom').change(function () {
                        var scale = $(this).val();
                        var widthScale = width*(scale/100);
                        var heightScale = height*(scale/100);
                        if( widthScale > widthScrop && heightScale > heightScrop)
                        {
                            widthScale = width*(scale/100);
                            heightScale = height*(scale/100);
                        }
                        else
                        {
                            heightScale = heightScrop;
                            widthScale = $('#target').width();
                        }
                        // $('#target').css({
                        //     width: widthScale,
                        //     height: heightScale
                        // });
                        showCrop();
                    })
                }
            );
            function showCrop() {
                var jcrop_api;
                var width = $('#target').width();
                var height = $('#target').height();
                var scale = $('#zoom').val();
                var boxWidth = (width*scale/100);
                var boxHeight= (height*scale/100);
                          if ($('#target').data('Jcrop'))
                          {
                            $('#target').data('Jcrop').destroy();
                            var this_scale = 0;
                                if(boxHeight<=500)
                                {
                                    boxHeight = 500;
                                    this_scale = (500 * 100)/height;
                                    scale = this_scale;
                                    boxWidth = (width*this_scale/100);
                                }
                                if(boxWidth<=500)
                                {
                                  boxWidth = 500;
                                  this_scale = (500 * 100)/width;
                                    scale = this_scale;
                                    boxHeight = (height*this_scale/100);
                                }
                                var tag = 1/(scale/100);
                              $('#target').Jcrop({
                                aspectRatio: 1,
                                onChange: showCoords,
                                onSelect: showCoords,
                                setSelect: [ 50 * tag, 50 * tag, parseInt(50 * tag) + 400 * tag, parseInt(50 * tag) + 400 * tag],
                                bgOpacity: 0.4,
                                boxWidth: boxWidth,
                                boxHeight: boxHeight,
                            }, function () {
                                jcrop_api = this;

                            });
                              // document.getElementById('image-crop').onmousemove=moveDiv;
                          }
                        if ($('#target').data('Jcrop') == undefined) {
                            $('#target').Jcrop({
                                aspectRatio: 1,
                                onChange: showCoords,
                                onSelect: showCoords,
                                onRelease: clearCoords,
                                setSelect: [50, 50, 450, 450],
                                bgOpacity: 0.4,
                                boxWidth: boxWidth,
                                boxHeight: boxHeight,
                            }, function () {
                                jcrop_api = this;
                            });
                        }
                    $('#coords').on('change','input',function(e){
                        var x1 = $('#x1').val(),
                            x2 = $('#x2').val(),
                            y1 = $('#y1').val(),
                            y2 = $('#y2').val();
                        jcrop_api.setSelect([x1,y1,x2,y2]);
                    });

                    // Define page sections
                    var sections = {
                        anim_buttons: 'Animate Selection'
                    };
                    // Define animation buttons
                    var ac = {
                        anim1: [217,122,382,284],
                        anim2: [20,20,580,380],
                        anim3: [24,24,176,376],
                        anim4: [347,165,550,355],
                        anim5: [136,55,472,183]
                    };
                    // Create fieldset targets for buttons
                    for(i in sections)
                        insertSection(i,sections[i]);

                    function create_btn(c) {
                        var $o = $('<button />').addClass('btn btn-small');
                        if (c) $o.append(c);
                        return $o;
                    }

                    var a_count = 1;
                    // Create animation buttons
                    for(i in ac) {
                        $('#anim_buttons .btn-group')
                            .append(
                                create_btn(a_count++).click(animHandler(ac[i])),
                                ' '
                            );
                    }

                    $('#anim_buttons .btn-group').append(
                        create_btn('Bye!').click(function(e){
                            $(e.target).addClass('active');
                            jcrop_api.animateTo(
                                [300,200,300,200],
                                function(){
                                    this.release();
                                    $(e.target).closest('.btn-group').find('.active').removeClass('active');
                                }
                            );
                            return false;
                        })
                    );


                    // Function to insert named sections into interface
                    function insertSection(k,v) {
                        $('#interface').prepend(
                            $('<fieldset></fieldset>').attr('id',k).append(
                                $('<legend></legend>').append(v),
                                '<div class="btn-toolbar"><div class="btn-group"></div></div>'
                            )
                        );
                    };
                    // Handler for option-setting buttons
                    function setoptHandler(k,v) {
                        return function(e) {
                            $(e.target).closest('.btn-group').find('.active').removeClass('active');
                            $(e.target).addClass('active');
                            var opt = { };
                            opt[k] = v;
                            jcrop_api.setOptions(opt);
                            return false;
                        };
                    };
                    // Handler for animation buttons
                    function animHandler(v) {
                        return function(e) {
                            $(e.target).addClass('active');
                            jcrop_api.animateTo(v,function(){
                                $(e.target).closest('.btn-group').find('.active').removeClass('active');
                            });
                            return false;
                        };
                    };

                    $('#bgo_buttons .btn:first,#bgc_buttons .btn:last').addClass('active');
                    $('#interface').show();

            }

            function showCoords(c)
            {
                $('#x1').val( Math.floor(c.x));
                $('#y1').val( Math.floor(c.y));
                $('#w').val( Math.floor(c.w));
                $('#h').val( Math.floor(c.h));
            };

            function clearCoords()
            {
                $('#coords input').val('');
            };

    </script>
    </body>
</html>
