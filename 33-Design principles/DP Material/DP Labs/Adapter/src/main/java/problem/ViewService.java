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
public class ViewService {

    public UserDTO getUser() {
        UserDTO userDto = new UserDTO();
        userDto.setId(10);
        userDto.setFirstName("Ahmed");
        userDto.setMiddleName("Medhat");
        userDto.setLastName("Yousif");
        userDto.setSalary(1000f);
        userDto.setBonus(200f);
        userDto.setDeduction(100f);
        return userDto;
    }
}
