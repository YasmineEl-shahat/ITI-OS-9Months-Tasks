
import java.util.TreeMap;
import java.util.TreeSet;

public class Dictionary {
	  public static void printAll( TreeMap<Character, TreeSet<String>> dictionary){
	         for(char i='a' ; i <= 'z' ;i++ ){
	        	 System.out.println(i);
	        	 dictionary.get(i).forEach(value -> System.out.print(value+" "));
	        	 System.out.println("");
	         }
	    }
	  public static void printWordsOFKey( TreeMap<Character, TreeSet<String>> dictionary , char c){
		dictionary.get(c).forEach(value -> System.out.print(value+" "));
          System.out.println();
}

	public static void main(String[] args) {
		TreeMap<Character, TreeSet<String>> dictionary = new TreeMap<>();
        for(char i='a' ; i <= 'z' ;i++ ){
        	TreeSet<String> set = new TreeSet<>();
            set.add(i+"sama");
            set.add(i+"hamed");
            set.add(i+"abeer");
            dictionary.put(i, set);
        }
      
        System.out.println("All dictionary elements:");
        Dictionary.printAll(dictionary);
        System.out.println("Search for character \"a\" words");
        Dictionary.printWordsOFKey(dictionary,'a');
	}

}
