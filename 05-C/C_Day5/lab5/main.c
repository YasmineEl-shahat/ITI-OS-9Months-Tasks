#include <stdio.h>
#include <stdlib.h>

int largestNum (int num1, int num2, int num3);
int factorial(int num);
int power(int x,int y);
int main()
{
    printf("%d", largestNum(3, 1, 2));
    printf("\n%d",factorial(5));
    printf("\n%d",power(5, 3));
    return 0;
}
int largestNum (int num1, int num2, int num3){
    int arr [3] = {num1, num2, num3};
    int max = arr[0];
    for(int i = 1; i < 3; i ++){
       if(arr[i] > max) max= arr[i];
    }
    return max;
}
int factorial(int num){
    int fact = 1;
    for(int i = num; i > 1; i-- )
    {
        fact *= i;
    }
    return fact;
}
int power(int x,int y) {
    int pow = x;
    for(int i = 1; i < y; i++){
        pow *= x;
    }
    return pow;
}
