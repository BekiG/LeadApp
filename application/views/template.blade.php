<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('title')</title>
    <meta name="description" content="">

    <meta name="viewport" content="width=device-width">
	{{ HTML::style('css/screen.css') }}
    {{ HTML::style('css/ui-lightness/jquery-ui-1.8.18.custom.css') }}
    {{ HTML::script('js/libs/modernizr-2.5.3.min.js') }}
</head>
    <body>
    <!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
    <header>


    </header>
    <nav class="main">
        @section('navigation')
        <ul>
            @yield_section
        </ul>
    </nav>
    <div role="main" id="content">
        @yield('content')
    </div>
    <footer>
        @yield('footer')
    </footer>

    <!--
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    -->
    {{ HTML::script('js/libs/jquery-1.7.1.min.js') }}
    {{ HTML::script('js/libs/jquery-ui-1.8.18.custom.min.js') }}
    {{ HTML::script('js/jquery.tablesorter.min.js') }}
    {{ HTML::script('js/jquery.validate.min.js') }}
    {{ HTML::script('js/jquery.timePicker.min.js') }}
    <script>
        $(document).ready(function()
            {
                $("#leadList").tablesorter();
                // Datepicker
                $('#appointment_date').datepicker({
                    inline: true
                });

                //hover states on the static widgets
                $('#dialog_link, ul#icons li').hover(
                    function() { $(this).addClass('ui-state-hover'); },
                    function() { $(this).removeClass('ui-state-hover'); }
                );

                $("#appointment_time").timePicker({
                    show24Hours: true,
                    startTime: "08:00",
                    endTime: "19:00",
                    step: 30
                });

                $("#leadform").validate();
            }
        );
    </script>

    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>
</body>
</html>
