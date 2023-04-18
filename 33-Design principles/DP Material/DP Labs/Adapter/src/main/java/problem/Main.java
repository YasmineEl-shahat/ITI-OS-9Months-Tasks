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
public class Main {

    public static void main(String[] args) {
        ViewService viewService = new ViewService();
        UserDTO userDto = viewService.getUser();

        UserEntity userEntity = new UserEntity();
        userEntity.setId(userDto.getId());
        userEntity.setFullName(userDto.getFirstName() + " " + userDto.getMiddleName()
                + " " + userDto.getLastName());
        userEntity.setNetSalary(userDto.getSalary() + userDto.getBonus() - userDto.getDeduction());

        PersistService persistService = new PersistService();
        persistService.persist(userEntity);

        PrintService printService = new PrintService();
        printService.print(userEntity);
    }

}
