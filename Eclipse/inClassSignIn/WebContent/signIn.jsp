<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Sign in</title>
</head>
<body>
	<span style="color: red">${bad}</span>
	<h1>Please Sign in</h1>
	<form method="POST" action="/inClassSignIn/servlet">
		<input placeholder="Username" type="text" name="username"/><br/>
		<input placeholder="Password" type="password" name="pass"/><br/>
		<button>Submit</button>		
	</form>
</body>
</html>