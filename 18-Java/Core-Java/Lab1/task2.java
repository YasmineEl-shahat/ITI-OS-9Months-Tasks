import java.util.Scanner;
class PrintString{
	public static void main(String args[]) {
		/*
		Scanner myObj = new Scanner(System.in);  // Create a Scanner object
		int number = myObj.nextInt(); // Read user input
		String enteredString = myObj.nextLine();
		for(int iterator = 0; iterator < number; iterator++)
			System.out.println(enteredString);
		*/
		if(args.length == 2){
		int number = Integer.parseInt(args[0]); // Read user input
		String enteredString = args[1];
		for(int iterator = 0; iterator < number; iterator++)
			System.out.println(enteredString);

		}else {
			System.out.println("invalid num of args");
		}
	}
}