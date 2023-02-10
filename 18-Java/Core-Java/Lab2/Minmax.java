import java.util.Arrays;
import java.util.Random;

public class Minmax {

	
	
	public static void main(String[] args) {
		// TODO Auto-generated method stub
		int [] numarr = new int [1000];
		Random random_num = new Random();
		for(int i = 0; i < numarr.length; i++) numarr[i] = random_num.nextInt(100);
		int min = numarr[0];
        int max = numarr[0];
       
        long timeBeforeSearch = System.nanoTime();
        for(int i=0;i<numarr.length;i++){
        	min = numarr[i] < min ? numarr[i] : min;
        	max = numarr[i] > max ? numarr[i] : max;
        }  
        
        long timeAfterSearch = System.nanoTime();
        System.out.println("minim number of the array = "+ min);
        System.out.println("maximum number of the array = "+ max);
        System.out.println("Time taken to reach min and max = "+ (timeAfterSearch - timeBeforeSearch) + "nano seconds");
        Arrays.sort(numarr);
        min = numarr[0];
        max = numarr[0];
      
        //binary search implementation
        int start = 0;
        int end = numarr.length-1;
        int mid;
        while(start <= end)
        {
            mid = (start + end) / 2;
            if(numarr[mid] < min)  min= numarr[mid];
            end = mid - 1;
        }
        long timeAfterBinarySearch = System.nanoTime();
        start  = 0;
        end = numarr.length-1;
        while(start <= end)
        {
            mid = (start + end) / 2;
            if(numarr[mid] > max)  max= numarr[mid];
            start = mid + 1;
        }
        
        System.out.println("After binary search");
        System.out.println("minim number of the array = "+ min);
        System.out.println("maximum number of the array = "+ max);
        System.out.println("Time taken to reach min and max = "+ ( timeAfterBinarySearch- timeAfterSearch) + "nano seconds");
	}

}
