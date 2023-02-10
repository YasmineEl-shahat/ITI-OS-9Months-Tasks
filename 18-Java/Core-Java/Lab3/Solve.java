public class Solve {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		SqRoots.Coefficients cof = new SqRoots.Coefficients(1, -5, 6);
		SqRoots.Roots r= SqRoots.MainClass.SolveEq(cof, SqRoots.MainClass.FindRoot);
		System.out.println(r.r1);
		System.out.println(r.r2);
	}

}
