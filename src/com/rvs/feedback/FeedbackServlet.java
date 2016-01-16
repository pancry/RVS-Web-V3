package com.rvs.feedback;

import java.io.IOException;

import javax.servlet.RequestDispatcher;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.hibernate.Session;
import org.hibernate.SessionFactory;
import org.hibernate.Transaction;

public class FeedbackServlet extends HttpServlet {
	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
		resp.setContentType("text/html");
		String phone = (String) req.getParameter("phone");
		String mail = (String) req.getParameter("mail");
		String name = (String) req.getParameter("name");
		String company = (String) req.getParameter("company");
		String message = (String) req.getParameter("comment");
		String[] aoi = (String[]) req.getParameterValues("aoi");

		SessionFactory factory = DBUtil.getInstance().getFactory();
		Session session = factory.openSession();

		// creating transaction object
		Transaction t = session.beginTransaction();

		Feedback feedback = new Feedback();
		feedback.setMessage(message);
		feedback.setMail(mail);
		feedback.setName(name);
		feedback.setCompany(company);
		feedback.setPhone(phone);
		session.saveOrUpdate(feedback);
		int id = feedback.getId();
		t.commit();// transaction is committed
		session.close();

		
		if(aoi != null)
		{
			
			for(int i=0; i<aoi.length; i++)
			{
				Session session1 = factory.openSession();
				Transaction t1 = session1.beginTransaction();
				
				AreaOfInterest areaOfInterest = new AreaOfInterest();
				areaOfInterest.setId(id);
				areaOfInterest.setAoi(Integer.valueOf(aoi[i]));
				System.out.println("FeedbackServlet.doPost()" + areaOfInterest);
				session1.save(areaOfInterest);
				t1.commit();// transaction is committed
				session1.close();
			}
			
		}


		String nextJSP = "/contact.html";
		RequestDispatcher dispatcher = getServletContext().getRequestDispatcher(nextJSP);
		dispatcher.forward(req, resp);

	}

}