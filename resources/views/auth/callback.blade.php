<html>
<head>
  <meta charset="utf-8">
  <title>{{ $token }}</title>
  <script>
    window.opener.postMessage({ token: "{{ $token }}" }, "http://localhost:3000/auth/profile")
    window.close()
  </script>
</head>
<body>
	Redirecting....
</body>
</html>
