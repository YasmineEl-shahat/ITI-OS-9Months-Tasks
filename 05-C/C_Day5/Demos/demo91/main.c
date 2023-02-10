#include <stdio.h>
#include <stdlib.h>

void Swap(int a,int b)
{
    int temp=a;
    int g=90;
    a=b;
    b=temp;
    printf("\n swap  g=%d",g);
}

int calcSum(int deg[],int s){
    int sum=0,i;
    for(i=0;i<s;i++){
        sum+=deg[i];
    }
    deg[0]=2000;
    return sum;
}

int main()
{
    int arr[]={10,20,30,40};
    int n=calcSum(arr,4);
    printf("\n%d",arr[0]);
    printf("\n sum= %d",n);

    int x=10,y=20;


   // int x=50;
    Swap(x,y);

    printf("\n x=%d and y=%d",x,y);

    return 0;
}
