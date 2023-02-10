#include <stdio.h>
#include <stdlib.h>

int main()
{
    char string [] = "ffffkkl";
    int count = 0, i = 0;
    while(string[i] != '\0')
    {
        if(string[i] == 'f') count++;
        i++;
    }
    printf("frequency of \'f\' in the string = %d", count);
    return 0;
}
