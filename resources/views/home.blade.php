<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <meta charset="utf-8">


        <!-- Fonts -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">

        <script>
            window.Laravel = '{!! json_encode(['csrfToken' => csrf_token()]) !!}';
        </script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="md:container lg:h-screen mx-auto bg-grey-lighter">
        <div id="app" class="md:min-h-screen md:felx md:flex-col bg-brand-lightest">
            <app></app>
        </div>

        <script src="js/app.js"></script>
    </body>
</html>
