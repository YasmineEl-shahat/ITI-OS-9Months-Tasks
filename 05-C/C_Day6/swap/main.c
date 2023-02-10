#include <stdio.h>
#include <stdlib.h>

void swap(int *ptrx, int *ptry);
int main()
{
    int x = 10, y = 20;
    swap(&x, &y);
    printf("x = %d, y = %d", x, y);
    return 0;
}
void swap(int *ptrx, int *ptry)
{
    int temp = *ptrx;
    *ptrx = *ptry;
    *ptry = temp;
}
