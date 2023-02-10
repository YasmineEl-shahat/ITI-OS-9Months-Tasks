#include <stdio.h>
#include <stdlib.h>

int main()
{
    int arr[4][5] = {{0, 1, 2},{6, 4},{1, 7, 6, 8, 9},{5}};
    int size [4] = {3, 2, 5, 1};
    for(int i = 0; i < 4;i++)
    {

        for(int j = 0; j < size[i]; j++)
        {
            printf("%d ", arr[i][j]);
        }
        printf("\n");
    }
    return 0;
}
