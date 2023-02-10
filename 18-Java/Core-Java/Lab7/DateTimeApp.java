
import java.awt.BorderLayout;


import javax.swing.JFrame;
import javax.swing.JLabel;
import java.util.Date;



public class DateTimeApp extends JFrame implements Runnable{
	Thread th;
	Date d = new Date();

	JLabel timeLabel = new JLabel();
	public DateTimeApp(){
		this.setTitle("Date & Time Frame Application");
		timeLabel.setHorizontalAlignment(JLabel.CENTER);
		timeLabel.setText(d.toString());
		this.add(timeLabel,BorderLayout.CENTER);
		th = new Thread(this);
		th.start();
	}
	public static void main(String[] args){
		DateTimeApp app = new DateTimeApp();
		app.setBounds(50,50,600,400);
		app.setVisible(true);
	}
	public void run(){
		while(true){
			d= new Date();
			timeLabel.setText(d.toString());
			try {
				Thread.sleep(1000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} 
			}
	} // End of run
} // End of class