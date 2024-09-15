<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Example</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <x-app-layout>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div>
                            {!! $output !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="py-12">
   <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
     <div class="p-6 text-gray-900">
      {{ __("You're logged in!") }}
     </div>
    </div>
   </div>
  </div> -->
    </x-app-layout>

    @foreach ($js_files as $js_file)
        <script src="{{ $js_file }}"></script>
    @endforeach
</body>

</html>
