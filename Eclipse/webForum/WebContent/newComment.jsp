<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Post a Comment</title>
</head>
<body>
	<h1>Post a Comment</h1>
	<form action="/webForum/postComment" method="POST">
		<textarea name="comment" rows="4" cols="80"></textarea> <br/>
		<button>Post</button>
		<input type="button" onClick="parent.location='/webForum/viewPosts.jsp'" value="View Posts" />
	</form>
</body>
</html>