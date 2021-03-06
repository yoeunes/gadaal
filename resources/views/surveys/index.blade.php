<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>NRC Wash APP</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <style type="text/css">
        .gold{
            background-color: gold;
            color: white;
        }
        
        }
    </style>
    
</head>
<body>

    <div id="app">
        <nav class="navbar gold navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    NRC Wash APP
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
               <div class="card-header bg-primary">Nav</div>
                   @include('layouts.nav')
              
            </div>

          </div>
        <div class="col-md-10">
                          
            <table class="table table-bordered table-striped">
                       <thead class="thead-dark">
                           <tr> 
                               <th>ID</th>
                               <th>Water kiosk</th>
                                <th>Status</th>
                                <th>Gender</th>
                                <th>age</th>
                               <th>Created at</th>
                                <th>Action</th>

                           </tr>
                       </thead>
                   @foreach ($surveys as $survey)
                       <tbody>

                           <tr>
                               <td>{{$survey->id}}
                               </td>
                               <td>{{$survey->town->name}}</td>
                               <td>{{$survey->status}}</td>
                               <td>{{$survey->gender}}</td>
                               <td>{{$survey->age}}</td>
                               <td>
                                {{$survey->created_at->format('d/m/Y')}} </td>
                              <td>
                                <a href="{{ route('surveys.show',$survey->id) }}">more info</a>
                              </td>
                           </tr>
                       </tbody>
                     @endforeach

                   </table>
                   <div class="col-md-12 ">
                      {{$surveys->links()}}
                   </div>
                </div>


                  
        </div>
</main>
    </div>
 
</body>
</html>
