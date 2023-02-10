#include <stdio.h>
#include <stdlib.h>

int main()
{
    char check;

    check = getch();
    if(check == -32)
    {
        printf("extended char\n");
        check = getch();
        printf("the ascii value = %d , the char  value = %c\n", check, check);
    }
    else {
        printf("normal char\n");
        printf("the ascii value = %d , the char  value = %c\n", check, check);
    }


    return 0;
}
