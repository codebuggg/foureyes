<!DOCTYPE html>
<html class="h-full bg-gray-100">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{csrf_token()}}">
      <title>Big Store</title>
      <link href=" {{ mix('css/app.css') }}" rel="stylesheet">
  </head>
  <body class="h-full">
    <div id="app">
      <app></app>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
    @env('local')
    <script id="__bs_script__">//<![CDATA[
    document.write("<script async src='http://HOST:3000/browser-sync/browser-sync-client.js?v=2.24.4'><\/script>".replace("HOST", location.hostname));
    //]]></script>
    @endenv
  </body>
</html>
