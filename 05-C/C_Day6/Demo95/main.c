#include <stdio.h>
#include <stdlib.h>
struct emp{
    int id;
    char name[10];
};

int main()
{
    int n;
    scanf("%d",&n);
    struct emp* ptx=(struct emp*)malloc(n*sizeof(struct emp));
    for(int i=0;i<n;i++){
        scanf("%d",&ptx[i].id);
        scanf("%s",ptx[i].name);
    }
     for(int i=0;i<n;i++){
        printf("\n %d :%s",ptx[i].id,ptx[i].name);
    }

    free(ptx);

    struct emp e1={4,"aly"};
    struct emp* ptr=&e1;
    scanf("%d",&(ptr->id));
    scanf("%s",ptr->name);
    printf("%d",ptr->id);
    printf("%s",ptr->name);


    printf("\nHello world!\n");
    return 0;
}
