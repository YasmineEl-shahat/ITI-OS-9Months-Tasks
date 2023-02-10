#include <stdio.h>
#include <stdlib.h>


struct Emp {
    int id;
    char name [10];
    float salary;
    float bonus;
    float deduction;
};
struct Dept {
    int id;
    char name [20];
    struct Emp emps[5];
};
int main()
{
    struct Dept department= {1, "OperatingSystem", {
                                                     {1, "ahmed", 2000.2, 20.5, 10.2},
                                                     {2, "ali", 3000.2, 20.5, 10.2},
                                                     {3, "ola", 5000.2, 20.5, 10.2},
                                                     {4, "hoda", 5000.2, 20.5, 10.2},
                                                     {5, "noha", 9000.2, 20.5, 10.2}
                                                    }
                            };

    printf("dept id: %d\n", department.id);
    printf("dept name: %s\n", department.name);
    for(int i = 0; i < 5; i ++)
    {
        float netSalary = department.emps[i].salary + department.emps[i].bonus - department.emps[i].deduction;
        printf("emp%d: id=%d, name=%s, netSalary=%f\n", i+1,
               department.emps[i].id, department.emps[i].name, netSalary);
    }
    return 0;
}
