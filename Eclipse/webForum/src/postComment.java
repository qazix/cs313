

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Date;
import java.util.List;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class postComment
 */
@WebServlet("/postComment")
public class postComment extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	public List<String> mComments;
	private String mRoot = "D:\\Documents\\School work\\2014\\Winter 2014\\CS313\\cs313\\Eclipse\\webForum";
	
    /**
     * @see HttpServlet#HttpServlet()
     */
   public postComment() {
      super();
      mComments = new ArrayList<String>();
   }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	   getList();
	   
	   request.getRequestDispatcher("/viewPosts.jsp").forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String comment = request.getParameter("comment");
		String user = request.getSession().getAttribute("user").toString();
		
		System.out.println(comment + user);
		
		addComment(comment, user);
		
		response.sendRedirect("postComment");
	}
	
	private void addComment(String pComment, String pUser)
	{
	   String text = "";
	   String line;
	   int index;
	   List<String> comments = new ArrayList<String>();
	   
	   try
		{
			File comment = new File(mRoot + File.separator +
					"WFresources" + File.separator + "comments.txt");
		
			if (!comment.exists())
			{
				comment.getParentFile().mkdirs();
				comment.createNewFile();
			}
			
			BufferedReader br = new BufferedReader(new FileReader(comment));
         
			while ((line = br.readLine()) != null)
			{
			   if ((index = line.indexOf('`')) == -1)
			      text += line;
			   else
			   {
			      text += line.substring(0, index + 1);
			      comments.add(text);
			      text = "";
			   }
			}
         
         br.close();
			
         pComment.replaceAll("`", "\'");
			String time = new Date().toString();
			
         String content = pUser + " \"" + time + "\" " + pComment + "`\n";
         BufferedWriter bw = new BufferedWriter(new FileWriter(comment));
         bw.write(content);
         
         for (String i: comments)
            bw.append(i);
         
         bw.close();
         
		}
	   
		catch(Exception e)
		{
			System.out.println(e);
		}
	}
	
	private void getList()
	{
	   mComments.clear();
	   
	   int index;
	   String line;
	   String text = "";
	   
	   try
	   {
	      File comment = new File(mRoot + File.separator +
	            "WFresources" + File.separator + "comments.txt");
      
	      BufferedReader br = new BufferedReader(new FileReader(comment));
   
	      while ((line = br.readLine()) != null)
	      {
	         if ((index = line.indexOf('`')) == -1)
	            text += line;
	         else
	         {
	            text += line.substring(0, index);
	            mComments.add(text);
	            text = "";
	         }
	      }
	     
	      br.close();
	   }
	   catch(Exception e)
	   {
	      System.out.println(e);
	   }
	}
}
