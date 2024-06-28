<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Example</title>

	<meta name="csrf-token" content="{{ csrf_token() }}"> 

</head>
<body>
	<div style="padding: 20px">
		{!! $output !!}
	</div>

	@foreach ($js_files as $js_file)
    	<script src="{{ $js_file }}"></script>
	@endforeach
</body>
</html>