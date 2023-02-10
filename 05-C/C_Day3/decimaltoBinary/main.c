#include <stdio.h>
#include <stdlib.h>

int main()
{
    int n;
    printf("enter decimal number:");
    scanf("%d", &n);

    int arr[3000];
    int i = 0;
    while(n > 0)
    {
        arr[i] = n % 2;
        i++;
        n = n / 2;
    }
     printf("binary: ");
    for (int j = i - 1; j >= 0; j--)
    {
        printf("%d", arr[j]);
    }
    return 0;
}
