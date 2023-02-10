#include <stdio.h>
#include <stdlib.h>

int main()
{
    char arr [10];
    int i;
    for(i = 0; i < 10; i++)
    {
        char ch;
        ch = getch();

        if(ch ==  13)
        {
            arr[i] ='\0';
            break;
        }
        else arr[i] = ch;
    }
    i = 0;
    while(arr[i] != '\0')
    {
        printf("%c", *(arr+i));
        i++;
    }
    return 0;
}
