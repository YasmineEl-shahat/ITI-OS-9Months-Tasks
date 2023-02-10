public class NumOfOccurance {
	static int countOccurrences(String line, String word)
	{
		// split the string by spaces in a
		String words[] = line.split(" ");

		// search for word in array
		int count = 0;
		for (int i = 0; i < words.length; i++)
		{
	
		if (word.equals(words[i]))
			count++;
		}

		return count;
	}
	static int countOccurancesUsingCharAt(String line, String word) {
		int count = 0;
		String currentword="";

		for (int i = 0; i < line.length(); i++)
		{
		
			char ch = line.charAt(i);
			if(i == (line.length()-1))
			{
				currentword+=ch;
				if(currentword.equals(word)) count++;
				currentword="";
			}
			else if(ch == ' ') {
				
				if(currentword.equals(word)) count++;
				currentword="";
			}else currentword+=ch;
		}
		return count;
	}
	public static void main(String[] args) {
		
		String line = "I am an iti student I love iti hello from iti";
		String word = "iti";
		System.out.println(countOccurancesUsingCharAt(line, word));
	}

}