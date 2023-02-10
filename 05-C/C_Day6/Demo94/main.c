#include <stdio.h>
#include <stdlib.h>

int main()
{
    int x=10;
    double d=30.5;
    x=d;
    printf("%d\n",x);
    int i=0;
    int arr1[]={2,3,4};
    int arr2[]={10,20,30};
    printf("\n %p",&arr1[0]);
    int* ptr=arr1;
    int* ptr2=arr2;
    //ptr=ptr2;
    for(i=0;i<3;i++){
        //scanf("%d",&arr1[i]);
        //scanf("%d",arr1+i);
        //scanf("%d",ptr+i);
        scanf("%d",&ptr[i]);



    }
    for(i=0;i<3;i++)
        printf("\n %d\n",ptr[i]);
    //printf("\n %d\n",*(arr1+1));
    //printf("\n %d\n",*(arr1+2));






    printf("Hello world!\n");
    return 0;
}
