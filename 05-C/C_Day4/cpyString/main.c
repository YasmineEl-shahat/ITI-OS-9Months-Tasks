#include <stdio.h>
#include <stdlib.h>

int main()
{
    int i = 0;
    char string1 [10], string2 [10];
    strcpy(string1, "ahmed");
    strcpy(string2, "mohamed");
    printf("strings before copying: %s, %s\n", string1, string2);
    while(string2[i] != '\0')
    {
        string2[i] = string1[i];
        i++;
    }
    printf("strings after copying: %s, %s\n", string1, string2);
    return 0;
}
