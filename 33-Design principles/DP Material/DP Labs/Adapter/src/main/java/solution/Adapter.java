package solution;

import problem.UserEntity;

public abstract class Adapter {

	UserEntity adapte(UserDTO user) {
		UserEntity userEntity = new UserEntity();
		userEntity.setId(user.getId());
		userEntity.setFullName(user.getFirstName() + " " + user.getMiddleName() + " " + user.getLastName());
		userEntity.setNetSalary(user.getSalary() + user.getBonus() - user.getDeduction());

		return userEntity;
	}
}
