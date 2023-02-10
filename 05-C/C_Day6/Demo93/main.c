#include <stdio.h>
#include <stdlib.h>

void Swap(int* ptrx,int * ptry)
{
    int temp=*ptrx;
    *ptrx=*ptry;
    *ptry=temp;
}

int main()
{


    int a=10;
    int b=20;
    Swap(&a,&b);
    printf("a= %d and b= %d",a,b);


    //Named location in memory, size , name ,address 0 ->1000,1001,1002
    int x=10;//
    //myfun(&x);//call by address
    printf("\n%d\n",x);


   int y=20;
   int*ptrx =&x;
   int*ptry=&y;

   *ptrx=*ptry;
   printf("\n x= %d",*ptrx);
    printf("\n y= %d",*ptry);
    y=100;
    printf("\n x= %d",*ptrx);










    return 0;
}
