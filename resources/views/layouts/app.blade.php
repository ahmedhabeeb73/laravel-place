<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        
        <!-- Scripts -->
        
        
        

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}

                
            </main>
        </div>

        @stack('modals')

        @livewireScripts
        <script src="{{ mix('js/app.js') }}" ></script>
           
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
          $(function(){
             
            $('#address').on('keyup',function(){
                  const address=$(this).val()
                  $('#address-list').fadeIn();
                  $.ajax({
                      url: "{{route('auto')}}",
                      type: "GET",
                      data: {"address":address}
                  }).done(function(data){
                      $('#address-list').html(data);
                  })
              })

              $("#address-list").on('click','li',function(){
                  $('#address').val($(this).text());
                  $('#address-list').fadeOut();
              })
          })
         </script>
      
    </body>
</html>
