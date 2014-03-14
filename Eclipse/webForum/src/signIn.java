

import java.io.*;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class signIn
 */
@WebServlet("/signIn")
public class signIn extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public signIn() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String name = request.getParameter("user");
		String pass = request.getParameter("pass");
		
		if (!checkPass(name, pass))
		{
			request.getSession().setAttribute("bad", "Incorrect password or username");
			response.sendRedirect("signIn.jsp");
		}
		else
		{
			request.getSession().setAttribute("user", name);
			request.getSession().setAttribute("pass", pass);
			request.getSession().removeAttribute("bad");
			response.sendRedirect("newComment.jsp");
		}
	}
	
	private boolean checkPass(String pName, String pPass)
	{
		String user;
		try
		{
			//If the file doesn't yet exist and give it a universal login
			String root = "D:\\Documents\\School work\\2014\\Winter 2014\\CS313\\cs313\\Eclipse\\webForum";
			File resources = new File(root + File.separator + 
					"WFresources" + File.separator + "users.txt");
//			System.out.println(resources.toString());
			if (!resources.exists())
			{
				resources.getParentFile().mkdirs();
				resources.createNewFile();
				
				BufferedWriter bw = new BufferedWriter(new FileWriter(resources));
				bw.write("Aaron Hanich");
				bw.close();
			}
			
			//read from the file and find the username and pass word
			@SuppressWarnings("resource")
			BufferedReader br = new BufferedReader(
					new FileReader(resources));
			
			while ((user = br.readLine()) != null)
			{
//				System.out.println(pName + pPass);
//				System.out.println(user);
				String line[] = user.split(" ");
				if (line[0].equals(pName) && line[1].equals(pPass))
					return true;
			}
			
			br.close();
		}
		catch (Exception e)
		{
			System.out.println(e);
			return false;
		}
		return false;
	}
}
