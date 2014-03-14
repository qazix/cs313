

import java.io.IOException;
import java.net.URL;
import java.util.Map;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import com.fasterxml.jackson.databind.ObjectMapper;

/**
 * Servlet implementation class getMovies
 */
@WebServlet("/getMovies")
public class getMovies extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
	private Map<String, Object> mMap;
    /**
     * @see HttpServlet#HttpServlet()
     */
    public getMovies() {
        super();
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String title = request.getParameter("title");
		
		query(title);
	
		request.setAttribute("movies", mMap.get("Search"));
		request.getRequestDispatcher("showMovies.jsp").forward(request, response);
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
	}
	
	private void query(String pTitle)
	{
	   try
	   {
	      String urlString = "http://www.omdbapi.com/?s=" + pTitle;
	      URL url = new URL(urlString);
	      ObjectMapper mapper = new ObjectMapper();
	      @SuppressWarnings("unchecked")
	      Map<String, Object> map = mapper.readValue(url, Map.class);
	      mMap = map;
	      
	      System.out.println(map.get("Search"));
	   }
	   catch(Exception e)
	   {
	      System.out.println(e);
	 	}
	}
}
