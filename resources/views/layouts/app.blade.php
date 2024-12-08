<!DOCTYPE html>
<html lang="en">
      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>PT. Samudra Mandiri Sentosa</title>
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <link rel="icon" href="{{ asset('logo.png') }}" type="image/x-icon">
            <script src="https://cdn.jsdelivr.net/npm/alpinejs" defer></script>
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      </head>
      <body>
            <div class="app"> @include('layouts.header') <div class="main-layout"> @include('layouts.sidebar') <div class="content">
                              <div class="collapse-icon" onclick="toggleSidebar()">
                                    <i class="fas fa-bars"></i>
                              </div> @if (session('success') || session('error')) <div id="alertBox" class="alert {{ session('success') ? 'alert-success' : 'alert-error' }}">
                                    <span class="alert-message">
                                          {{ session('success') ?? session('error') }}
                                    </span>
                                    <span class="alert-close" onclick="closeAlert()">×</span>
                              </div> @endif @if ($errors->any()) <div class="alert alert-danger">
                                    <ul> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>
                              </div> @endif @yield('content')
                        </div>
                  </div>
            </div>
      </body>
      <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
      <script src="{{ asset('js/dropdown.js') }}"></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>