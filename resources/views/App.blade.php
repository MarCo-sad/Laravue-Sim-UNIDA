<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Vue SPA</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="icon" href="<%= BASE_URL %>favicon.ico">
    <title>Sistem Informasi Manajemen UNIDA Gontor</title>

     <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}"> 
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">    
     <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            font-family: sans-serif;
            margin: 15%;
        }
    </style>
</head>

<body>
    <div id="app">
        <header-component></header-component>
        <sidebar-component></sidebar-component>
        <router-view></router-view>
        <footer-component></footer-component>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>