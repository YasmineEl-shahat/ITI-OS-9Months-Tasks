/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package solution;

/**
 *
 * @author JEDiver
 */
public class PrintAdapter {

    PrintService printService = new PrintService();

    public void print(UserDTO user) {
        UserEntity userEntity = new UserEntity();
        userEntity.setId(user.getId());
        userEntity.setFullName(user.getFirstName() + " " + user.getMiddleName()
                + " " + user.getLastName());
        userEntity.setNetSalary(user.getSalary() + user.getBonus() - user.getDeduction());

        printService.print(userEntity);
    }
}
