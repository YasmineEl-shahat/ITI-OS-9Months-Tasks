#include <stdio.h>
#include <stdlib.h>
void printv1();//prototype
void printv2(int end);
void printv3(int end,char ch);
int Add(int,int);
int getMax(int x,int y);


int main()
{

    int y=getFact(5);
    printf("\n res= %d",y);

    /*
    int c=getMax(30,60);
    printf("\n max=%d\n",c);

    printv3(4,'*');
    int a=40,b=20;
    scanf("%d",&a);

    int z=Add(10,20)*3;
    printf("z=%d\n",z);
    z=Add(40,80);
    printf("\n %d",z);
    */
    //Add(a,50);
    /*int x=5;
    //scanf("%d",&x);
    printv3(x,'*');
    printf("\nAhmed");
    printf("\nwael");
    printf("\n");
    printv3(20,'A');
    */


    return 0;
}


int getFact(int x){
    int i;

    int res=1;
    for(i=x;i>0;i--){
        res*=i;
    }
    return res;
}
int getMax(int x,int y)
{
    if(x>y)
        return x;
    else
        return y;
}
//
int Add(int x,int y)
{

    //int y=20;
    //int z=x+y;
   // int a=x-y;
    //printf("%d+%d=%d",x,y,z);
    return x+y;

    //printf("add");

}


void printv3(int end,char ch)//function parameters
{
    int i;
    printf("printv3");
    for(i=0;i<end;i++)
        printf("%c",ch);
}
void printv2(int end)
{
    int i;

    for(i=0;i<end;i++)
        printf("*");
}
void printv1()
{
    int i;
    for(i=0;i<10;i++)
        printf("*");
}


// return datatype functionname()
//{

//}
