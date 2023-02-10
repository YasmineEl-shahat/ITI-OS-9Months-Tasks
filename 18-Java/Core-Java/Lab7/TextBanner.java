
import java.awt.BorderLayout;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class TextBanner extends JFrame implements Runnable{
	Thread th;

	JLabel label = new JLabel();
	public TextBanner(){
		this.setTitle("Banner Application");
		label.setText("Java World");
		this.add(label,BorderLayout.CENTER);
		th = new Thread(this);
		th.start();
	}
	public static void main(String[] args){
		TextBanner app = new TextBanner();
		app.setBounds(50,50,600,400);
		app.setVisible(true);
	}
	public void run(){
		int x= -10;
		while(true){
			if(x >= this.getWidth()  ) x = -50;
		        x += 10;
			label.setLocation(x, 0);
			try {
				Thread.sleep(50);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} 
			}
	} // End of run
}
