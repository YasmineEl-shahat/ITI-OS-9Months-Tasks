class MainException extends Exception  {

	
	MainException(String s)
	{
		super(s);
	}

}
class Throw {
	int fact(int n) throws MainException
	{ 
		if(n<0) throw new MainException("can't calculate fact of negative number");
		if(n==1) return 1;
		return n*fact(n-1);
	}
	int Divide(int den, int divisor) throws MainException
	{ 
		if(divisor<0) throw new MainException("/ by zero");
		return den/divisor;
	}
	void PrintString(String s) throws MainException
	{
		if(s.equals("")) throw new MainException("empty string");
		System.out.println(s);
	}
}
 public class TestException {

	
	public static void main(String []args)
	{

		Throw exception = new Throw();
		try {
			exception.fact(-5);
		}
		catch(Exception e){
			e.printStackTrace();
		}finally {
			System.out.println("done");
		}
		try {
			exception.Divide(-5,0);
		}
		catch(Exception e){
			e.printStackTrace();
		}finally {
			System.out.println("done");
		}
		try {
			exception.PrintString("");
		}
		catch(Exception e){
			e.printStackTrace();
		}finally {
			System.out.println("done");
		}
	}
}



