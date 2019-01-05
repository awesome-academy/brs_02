<!DOCTYPE html>
<html>
<head>

    <!-- start: Meta -->
    <meta charset="utf-8">
    <title>Bootstrap Metro</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <!-- end: Meta -->

    <!-- start: Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- end: Mobile Specific -->

    <!-- start: CSS -->
    {{ Html::style('/templates/admin/css/bootstrap.min.css') }}
    {{ Html::style('/templates/admin/css/bootstrap-responsive.min.css') }}
    {{ Html::style('/templates/admin/css/style.css') }}
    {{ Html::style('/templates/admin/css/style-responsive.css') }}
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->


    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    {{ Html::style('/templates/admin/css/ie.css') }}
    <![endif]-->

    <!--[if IE 9]>
    {{ Html::style('/templates/admin/css/ie9.css') }}
    <![endif]-->

    <!-- start: Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- end: Favicon -->
</head>

<body>
<div class="container-fluid-full">
    <div class="row-fluid">
        @include('common.admin.error')
        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="index.html"><i class="halflings-icon home"></i></a>
                    <a href="#"><i class="halflings-icon cog"></i></a>
                </div>
                <h2>@lang('lable.Login_to_your_account')</h2>
                {!! Form::open(['method'=> 'POST', 'route'=> ['admin.login.index'] ]) !!}

                <div class="input-prepend" title="Username">
                    {!! Form::text( 'username', old('username'), ['class'=>'input-large span10', 'placeholder'=> trans('lable.username')]) !!}
                </div>

                <div class="clearfix"></div>

                <div class="input-prepend" title="Password">
                    {!! Form::password( 'password', ['class'=>'input-large span10', 'placeholder'=> trans('lable.password')]) !!}
                </div>

                <div class="clearfix"></div>

                <div class="button-login">
                    {!! Form::submit( trans('lable.login'), ['class'=>'btn btn-primary']) !!}
                </div>

                <div class="clearfix"></div>
                {!! Form::close() !!}
                <hr>
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/.fluid-container-->
</div><!--/fluid-row-->

{{ Html::script('/templates/admin/js/jquery-1.9.1.min.js') }}

{{ Html::script('/templates/admin/js/jquery-migrate-1.0.0.min.js') }}

{{ Html::script('/templates/admin/js/jquery-ui-1.10.0.custom.min.js') }}

{{ Html::script('/templates/admin/js/jquery.ui.touch-punch.js') }}

{{ Html::script('/templates/admin/js/modernizr.js') }}

{{ Html::script('/templates/admin/js/bootstrap.min.js') }}

{{ Html::script('/templates/admin/js/jquery.cookie.js') }}

{{ Html::script('/templates/admin/js/fullcalendar.min.js') }}

{{ Html::script('/templates/admin/js/jquery.dataTables.min.js') }}

{{ Html::script('/templates/admin/js/excanvas.js') }}

{{ Html::script('/templates/admin/js/jquery.flot.js') }}

{{ Html::script('/templates/admin/js/jquery.flot.pie.js') }}

{{ Html::script('/templates/admin/js/jquery.flot.stack.js') }}

{{ Html::script('/templates/admin/js/jquery.flot.resize.min.js') }}

{{ Html::script('/templates/admin/js/jquery.chosen.min.js') }}

{{ Html::script('/templates/admin/js/jquery.uniform.min.js') }}

{{ Html::script('/templates/admin/js/jquery.cleditor.min.js') }}

{{ Html::script('/templates/admin/js/jquery.noty.js') }}

{{ Html::script('/templates/admin/js/jquery.elfinder.min.js') }}

{{ Html::script('/templates/admin/js/jquery.raty.min.js') }}

{{ Html::script('/templates/admin/js/jquery.iphone.toggle.js') }}

{{ Html::script('/templates/admin/js/jquery.uploadify-3.1.min.js') }}

{{ Html::script('/templates/admin/js/jquery.gritter.min.js') }}

{{ Html::script('/templates/admin/js/jquery.imagesloaded.js') }}

{{ Html::script('/templates/admin/js/jquery.masonry.min.js') }}

{{ Html::script('/templates/admin/js/jquery.knob.modified.js') }}

{{ Html::script('/templates/admin/js/jquery.sparkline.min.js') }}

{{ Html::script('/templates/admin/js/counter.js') }}

{{ Html::script('/templates/admin/js/retina.js') }}

{{ Html::script('/templates/admin/js/custom.js') }}

<!-- end: JavaScript-->

</body>
</html>
