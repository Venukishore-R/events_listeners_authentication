<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>
	<h1>Design Thinking</h1>
	<form action="{{ route('user.logout') }}" method="POST">
		@csrf
		<button type="submit">Log out</button>
	</form>
	<!-- <a href="{{ route('user.logout') }}">Log Out</a> -->

    {{ test() }}

</body>
</html>



