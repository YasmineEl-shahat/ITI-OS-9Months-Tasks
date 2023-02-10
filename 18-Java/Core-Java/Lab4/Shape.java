import java.util.ArrayList;
import java.util.List;

abstract class Shape {
	abstract public void draw();
}
class Rectangle extends Shape {

	@Override
	public void draw() {
		System.out.println("draw rectangle");

	}

}
class Circle extends Shape {

	@Override
	public void draw() {
		System.out.println("draw circle");
	}

}
class DrawClass {
	public void drawPics(List<? extends Shape> items){
		for(Shape s:items){
			//calling method of Shape class
			//by child class instance

			s.draw();

		}

	}
}
class TestShape {

	public static void main(String[] args) {
		Rectangle r =new Rectangle() ;
       
        Circle c =new Circle() ;
   
        List< Shape> items = new ArrayList<Shape>();
        items.add(r);
        items.add(c);
        DrawClass d = new DrawClass();
        d.drawPics(items);
	}

}
