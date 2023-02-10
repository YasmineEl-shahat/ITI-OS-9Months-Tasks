#include <iostream>
#include <string.h>
//#include<bits/stdc++.h>
using namespace std;


class employee {
    private:
        int id;
        char name [20];
        int age;
    public:
        void setId(int _id)
        {
            if(_id < 1) cout << "invalid id" << endl;
            else id = _id;

        }
        int getId()
        {
            return id;
        }
        void setName(char _name [20])
        {
            strcpy(name, _name);
        }
        char* getName()
        {
            return name;
        }
         void setAge(int _age)
        {
            if(_age < 1) cout << "invalid age" << endl;
            else age = _age;

        }
        int getAge()
        {
            return age;
        }
        void  print()
        {
            cout << id << ":" << name << ":" << age << endl;
        }
};

int main()
{
    employee emp;
    emp.setId(50);
    cout << emp.getId() << endl;
    emp.setName("ola");
    cout << emp.getName() << endl;
    emp.setAge(20);
    cout << emp.getAge() << endl;
    //emp.print();
    return 0;
}
