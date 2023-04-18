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
public class PersistAdapter extends Adapter {

	PersistService persistService = new PersistService();

	public void persist(UserDTO user) {

		UserEntity userEntity = adapte(user);

		persistService.persist(userEntity);
	}
}
