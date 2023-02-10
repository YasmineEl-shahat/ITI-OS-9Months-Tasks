import java.util.function.*;
public class TempuratureFunInterface {
	// function interface implementation 
	static Function <Integer,Float> convertToFah= (Integer celsuis) -> {
		return   (float) ( 1.8 * celsuis + 32);
	};
	static float celToFah(int cel, Function  <Integer,Float> convertToFah) {
		return convertToFah.apply(cel);
	}
	public static void main(String[] args) {
		System.out.println(celToFah(5, convertToFah));
	}

}
