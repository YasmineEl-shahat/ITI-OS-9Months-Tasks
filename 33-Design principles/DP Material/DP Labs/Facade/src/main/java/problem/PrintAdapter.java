/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package problem;

/**
 *
 * @author JEDiver
 */
public class PrintAdapter extends Adapter {

	PrintService printService = new PrintService();

	public void print(UserDTO user) {
		UserEntity userEntity = adapte(user);
		printService.print(userEntity);
	}
}
