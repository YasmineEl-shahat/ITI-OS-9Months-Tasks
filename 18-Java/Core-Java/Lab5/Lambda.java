import java.util.function.BiPredicate;

class StringUtils {
	 static String betterString (String str1, String str2,BiPredicate <String, String> Bip1) {
		return Bip1.test(str1, str2)? str1 : str2;
	 }
	 static boolean onlyAlphabets(String str) {
	        for (int i = 0; i < str.length(); i++) {
	            if (!Character.isLetter(str.charAt(i))) 
	                return false; 
	        }
	        return true;
	    }
}
class UsingStringUtils {

	public static void main(String[] args) {

		String longest = StringUtils.betterString("sssRs","dddsd33gdgsss", (String str1, String str2) ->  str1.length() > str2.length());
		System.out.println(longest);
		System.out.println(StringUtils.onlyAlphabets(longest));
	}

}
