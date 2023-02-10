import java.util.regex.*;

public class Ip {

	
	public static boolean isValidIPAddress(String ip)
	{

	
		String zeroTo255
			= "(\\d{1,2}|(0|1)\\"
			+ "d{2}|2[0-4]\\d|25[0-5])";

		
		String regex
			= zeroTo255 + "\\."
			+ zeroTo255 + "\\."
			+ zeroTo255 + "\\."
			+ zeroTo255;


		Pattern p = Pattern.compile(regex);

		
		if (ip == null) {
			return false;
		}

	
		Matcher m = p.matcher(ip);

	
		return m.matches();
	}

	public static void main(String args[])
	{
		
		
		String str1 = "000.12.12.034";
		
		System.out.println(isValidIPAddress(str1));
		String IPNums[] = str1.split("\\.");
		for(int i = 0; i < IPNums.length; i++) System.out.println(IPNums[i]);
		String str2 = "121.234.52.32";
	
		System.out.println(isValidIPAddress(str2));

	
		String str3 = "3.56.34.23.23";
	
		System.out.println(isValidIPAddress(str3));


		String str4 = "dsfsdfdfsdff";
		System.out.println(isValidIPAddress(str4));
	}
}
