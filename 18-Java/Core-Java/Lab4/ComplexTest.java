import java.math.BigDecimal;

class Complex <R extends BigDecimal, I extends BigDecimal>  {
private R  real;
private I img;
	Complex()
	{
	}
	Complex(R _real, I _img)
    {
        real = _real;
        img = _img;
    }
	Complex<BigDecimal, BigDecimal> addComp(Complex<BigDecimal, BigDecimal>  C1)
    {
        Complex<BigDecimal, BigDecimal> temp = new Complex<BigDecimal, BigDecimal>();
        temp.real = C1.real.add(real);
        temp.img = C1.img.add(img);
        return temp;
    }
	Complex<BigDecimal, BigDecimal> subComp(Complex<BigDecimal, BigDecimal>  C1)
    {
        Complex<BigDecimal, BigDecimal> temp = new Complex<BigDecimal, BigDecimal>();
        temp.real =  real.subtract( C1.real);
        temp.img = img.subtract(C1.img);
        return temp;
    }
	void print()
	{
		System.out.println(real +"+i*"+ img);
	}
	
}


public class ComplexTest {

	public static void main(String[] args) {
		
		Complex<BigDecimal, BigDecimal> cmp1 = new Complex<BigDecimal, BigDecimal> (new BigDecimal(1), new BigDecimal(5));
		Complex<BigDecimal, BigDecimal> cmp2 = new Complex<BigDecimal, BigDecimal> (new BigDecimal(5), new BigDecimal(8));
		Complex<?, ?> addRes = cmp1.addComp(cmp2);
		Complex<?, ?> subRes = cmp1.subComp(cmp2);
		addRes.print();
		subRes.print();
		
	}

}

