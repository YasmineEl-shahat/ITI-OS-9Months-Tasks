import java.util.StringTokenizer;
public class TokenizerTask {

	public static void main(String[] args) {
		String line = "iti:is:a:great:community";
		String delimiter=":";
		
		StringTokenizer tokenizer = new StringTokenizer(line,delimiter);
        while (tokenizer.hasMoreTokens())
        {
            System.out.println(tokenizer.nextToken());
        }
	}

}
