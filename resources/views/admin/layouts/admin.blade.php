<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="{{ENV('DEVELOPER_NAME')}}">
<link rel="shortcut icon" href="images/favicon.png" type="image/png">

<title>{{ENV('DEVELOPER_NAME')}} Admin</title>

@yield('before_styles')
<link href="{{ asset('assets/css/style.default.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap-wysihtml5.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/wysihtml-color.css') }}" rel="stylesheet">
<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.css" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
@yield('after_styles')
</head>
<body>

<!-- Preloader -->
<div id="preloader">
    <div id="status"><i class="fa fa-spinner fa-spin"></i></div>
</div>

<section>

    <div class="leftpanel">
        <div class="logopanel">
            @include('admin.components.admin_logo')
        </div><!-- logopanel -->
            
        <div class="leftpanelinner">    
            @include('admin.components.admin_menu_mobile')
        
            @include('admin.components.admin_navigation')
        </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->

    <div class="mainpanel">
        @include('admin.components.admin_headerbar')
        @include('admin.components.admin_breadcrumb')
        @yield('content')
    </div><!-- mainpanel -->

</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>

<script src="{{ asset('assets/js/wysihtml5-advanced.js') }}"></script>
<script src="{{ asset('assets/js/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-wysihtml5.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>


<script>
    $(document).ready(function(){
         $('.editor').wysihtml5({color: true,html:true, allowObjectResizing: true, parserRules:  wysihtmlParserRules, stylesheets:  "{{asset('assets/css/wysihtml5-editor.css')}}"});
    });
</script>
@yield('javascript')
</body>
</html>

