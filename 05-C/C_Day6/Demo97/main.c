#include <stdio.h>
#include <stdlib.h>

int main()
{
    int** ptr;
    ptr=(int**)malloc(3*sizeof(int*));
    for(int i=0;i<3;i++){
        ptr[i]=(int*)malloc(4*sizeof(int));
    }
    for(int i=0;i<3;i++){
        for(int j=0;j<4;j++)
            scanf("%d",&ptr[i][j]);
    }
    for(int i=0;i<3;i++){
            printf("\n");
        for(int j=0;j<4;j++)
            printf("%d,",ptr[i][j]);
    }
    printf("Hello world!\n");
    return 0;
}
