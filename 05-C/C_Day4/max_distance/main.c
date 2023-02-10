#include <stdio.h>
#include <stdlib.h>

int main()
{
    char arr[] = "laalal";
    int i = 0, max = 0;

    while(arr[i] != '\0')
    {
        int j = i + 1;
        while(arr[j] != '\0')
        {
            if(arr[i] == arr[j] && j - i > max) max = j-i;
            j++;
        }

        i++;
    }
    printf("max distance between the same data = %d ", max);
    return 0;
}
