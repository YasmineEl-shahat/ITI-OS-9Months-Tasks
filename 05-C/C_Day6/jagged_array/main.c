#include <stdio.h>
#include <stdlib.h>

int main()
{
    int** jagged;
    int* size = (int*) malloc(4 * sizeof(int));
    jagged = (int**) malloc(4 * sizeof(int *));
    for(int i = 0; i < 4; i++)
    {
        printf("Enter size of elements:");
        scanf("%d", size+i);
        jagged[i] = (int*) malloc(size[i] * sizeof(int ));
        printf("Enter %d digits:", size[i]);
        int* ptr = jagged[i];
        for(int j = 0; j < size[i]; j++)
        {
            scanf("%d", ptr);
            ptr++;
        }
    }
    for(int i = 0; i < 4;i++)
    {
        for(int j = 0; j < size[i]; j++)
        {
            printf("%d ", *(jagged[i]+j));
        }
        printf("\n");
    }
    return 0;
}
