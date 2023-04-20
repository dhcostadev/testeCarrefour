<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DESAFIO</title>
    <link rel="stylesheet" href="{{ url('assets/bootstrap/css/bootstrap.min.css') }}">
    <style>
        nav div:nth-child(2) > div:nth-child(2),
        nav div span svg { display: none !important; }
        nav div:nth-child(2) { margin-top: 15px !important }
    </style>
  </head>
  <body>
      @yield('content')

      <script type="text/javascript" src="{{ url('/assets/js/script.js') }}"></script>
  </body>
</html>
