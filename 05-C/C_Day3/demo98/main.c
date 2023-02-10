#include <stdio.h>
#include <stdlib.h>
#define size 5

int main()
{
    char name[10];
    gets(name);
    printf("name=%s\n",name);

    int i;
    int arr[size]={0};

    for(i=0;i<5;i++)
    {
            printf("plz enter value for element no %d:",i+1);
          scanf("%d",&arr[i]);
    }
    for(i=0;i<size;i++)
        arr[i]+=5;
    int sum=0;
    for(i=0;i<size;i++)
        sum+=arr[i];


    for(i=0;i<size;i++)
        printf("%d\t",arr[i]);
    printf("=%d",sum);
    int max=arr[0];
    for(i=1;i<size;i++)
    {
        if(arr[i]>max)
            max=arr[i];
    }
    printf("\n max =%d",max);
    return 0;
}
