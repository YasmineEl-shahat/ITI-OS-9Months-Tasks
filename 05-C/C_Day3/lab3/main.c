#include <stdio.h>
#include <stdlib.h>
#define size 5

int main()
{

    // 1 Dim task
    int arr[size], sum = 0, max, min, search, inArray = 0;

    for (int i = 0; i < size; i++)
    {
        printf("enter arr element  %d\n", i + 1);
        scanf("%d", &arr[i]);
        sum += arr[i];
        if (i == 0)
        {
             max = arr[i]; min = arr[i];
        }
        else {
             if (arr[i] > max) max = arr[i];
             if (arr[i] < min) min = arr[i];
        }
    }
    printf("sum = %d\n", sum);
    printf("max = %d\n", max);
    printf("min = %d\n", min);

    printf("enter element to check if it is in array\n");
    scanf("%d", &search);
    for (int i = 0; i < size; i++)
    {
        if(arr[i] == search) {
            inArray = 1;
            break;
        }
    }
    if(inArray)
    {
        printf("it is in array\n");
    }else {
        printf("it is  not in array\n");
    }


    return 0;
}
