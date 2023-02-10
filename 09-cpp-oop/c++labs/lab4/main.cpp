#include <iostream>
#include <string.h>
using namespace std;

class person{
    protected:
        int id;
        char name [10] ;
        int age;
    public:
        person()
        {
            id=1;
            strcpy(name, "no name");
            age = 0;
            cout << "\ndefault constructor";
        }
        person(int _id, char _name[10], int _age)
        {
            id = _id;
            strcpy(name, _name);
            age = _age;
            cout << "\nparameter constructor";
        }
        void setId(int _id)
        {
            id = _id;
        }
        int getId()
        {
            return id;
        }
        void setName(char _name[10])
        {
            strcpy(name, _name);
        }
        string getName()
        {
            return name;
        }
        void setAge(int _age)
        {
            age= _age;
        }
        int getAge()
        {
            return age;
        }
        void print()
        {
            cout << "\n" << id << ":" << name << ":" << age ;
        }
};

class emp:public person{
    int salary;
    public:
        emp(){
            salary = 3000;
            age = 30;
        }
        emp(int _id, char _name[10],int _age,  int _salary = 3000):person(_id, _name, _age)
        {
            salary = _salary;
        }
        void setAge(int _age)
        {
            if(_age >= 30)
                age = _age;
            else
                cout <<"\ninvalid age";
        }
        void setSalary(int _salary)
        {
            salary= _salary;
        }
        int getSalary()
        {
            return salary;
        }
        void print(){
            person::print();
            cout<< ":"<< salary << "\n";
        }

};
class student: public person{
    char grade;
    public:
        student(){
            grade = 'D';
        }
        student(int _id, char _name[10],int _age =30,  char _grade = 'D'):person(_id, _name, _age)
        {
            grade = _grade;
        }
        void setGrade(char _grade)
        {
            grade= _grade;
        }
        char getGrade()
        {
            return grade;
        }
        void print(){
            person::print();
            cout<< ":"<< grade << "\n";
        }

};
void myfun (person* p1)
{

}
int main()
{
    cout << "\nbefore p1";
    person p1;
    p1.print();
    cout << "\nbefore p2";
    person p2(2,"adele", 23);
    p2.print();
    emp e1;
    e1.print();
    //emp* e = &p1;
    person* p = &e1;
    cout << "hello\n";

    p->print();
    p->setAge(1);
    p->print();
    e1.print();
    emp e2(3, "rawan", 32, 5000);
    e2.setAge(20);
    e2.print();
    student s1;
    s1.print();
    s1.person::print();
    s1.setName("somaya");
    s1.setId(4);
    s1.setAge(20);
    s1.setGrade('A');
    s1.print();
    return 0;
}
