#include <stdio.h>
#include <stdlib.h>

int main()
{

    int n;
    printf("enter number of elements:");
    scanf("%d", &n);
    int* ptr = (int*)malloc(n*sizeof(int));
    for(int i = 0; i < n; i++)
    {
        printf("enter element%d:", i+1);
        scanf("%d", ptr+i);
    }
    for(int i = 0; i < n; i++)
    {
        printf("%d\t", *(ptr+i));
    }
    return 0;
}
