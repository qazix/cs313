<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>The Comments</title>
</head>
<body>
	<h1>Here's what's going on</h1>
	<input type="button" onClick="parent.location='/webForum/newComment.jsp'" value="Add new Comment"/>

	<table>
      <c:forEach items="${mComments}" var="comment">
         <tr>
            <td><c:out value="${comment}"/></td>
         </tr>   
	   </c:forEach>
	</table>
</body>
</html>