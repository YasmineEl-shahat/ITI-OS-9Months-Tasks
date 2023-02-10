#include <stdio.h>
#include <stdlib.h>
struct emp {
    int id;
    char name [10];
};

int main()
{
    struct emp employee = {1, "ahmed"};
    struct emp* ptr = &employee;

    (*ptr).id = 2;
    strcpy(ptr -> name, "hoda");
    printf("employees id: %d, employees name:%s", employee.id, employee.name);
    return 0;
}
