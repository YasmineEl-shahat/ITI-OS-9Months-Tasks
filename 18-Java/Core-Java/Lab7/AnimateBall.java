import java.awt.BorderLayout;
import java.awt.FlowLayout;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JLabel;

public class AnimateBall extends JFrame implements Runnable {
	Thread th;
	
	ImageIcon icon = new ImageIcon("ball.png");
	JLabel label = new JLabel();
	public AnimateBall(){
		this.setLayout(null);
		this.setTitle("Banner Application");
		label.setIcon(icon);
		this.add(label);
		this.setLayout(new FlowLayout());
		th = new Thread(this);
		th.start();
	}
	public static void main(String[] args){
		AnimateBall app = new AnimateBall ();
		app.setBounds(50,50,600,400);
		app.setVisible(true);
	}
	public void run(){
		int x = 0;
		int y = 0;
		boolean xflag = true; 
		boolean yflag = true;
		while(true){
			if(x >= (this.getWidth() - label.getWidth())) xflag = false;
			if(x <= 0) xflag = true;
			if(xflag) x+=10;
			else x -= 10;
 			
			if(y >= (this.getHeight() - label.getHeight())) yflag = false;
			if(y <= 0) yflag = true;
			if(yflag) y+=10;
			else y -= 10;
			label.setLocation(x, y);
			try {
				Thread.sleep(30);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			} 
			}
	} // End of run
}
