<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Search Movies</title>
</head>
<body>
   <h1>Search for movies</h1>
   <form action="/inClassAPI/getMovies" method="GET">
      <p>Search for: <input type="text" name="title"/></p>
      <button>Submit</button>
   </form>
</body>
</html>