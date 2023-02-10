#include <stdio.h>
#include <stdlib.h>

int main()
{
    int arr1 [3][3] = {{1,1,1}, {1,1,1}, {1,1,1}},
        arr2 [3][3] = {{2,2,2}, {2,2,2}, {2,2,2}}, sum [3][3];

    for(int i = 0; i < 3; i++)
    {
        for(int j = 0; j < 3; j++)
        {
            sum[i][j] = arr1[i][j] + arr2[i][j];
            printf("%d ", sum[i][j]);
        }
        printf("\n");
    }

    return 0;
}
