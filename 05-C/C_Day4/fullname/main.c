#include <stdio.h>
#include <stdlib.h>

int main()
{
    char fname [25], lname [10];
    printf("enter first name:");
    scanf("%s", &fname);
    printf("enter last name:");
    scanf("%s", &lname);
    strcat(fname, " ");
    strcat(fname, lname);
    printf("full name:%s", fname);

    char name [] = "ahmed";
    int length = 0, i = 0;
    while(name[i] != '\0')
    {
        length++;
        i++;
    }
    printf("\nlength = %d ", length);
    return 0;
}
