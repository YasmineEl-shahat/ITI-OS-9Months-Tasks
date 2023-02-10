#include <iostream>
#include <string.h>
//#include<bits/stdc++.h>
using namespace std;


struct employee {
    int id;
    char name [20];
    int age;
    void  print()
    {
        cout << id << ":" << name << ":" << age << endl;
    }
};

int main()
{
    employee emp;
    emp.id = 13;
    strcpy(emp.name, "Ahmed");
    emp.age = 20;
    emp.print();
    return 0;
}
