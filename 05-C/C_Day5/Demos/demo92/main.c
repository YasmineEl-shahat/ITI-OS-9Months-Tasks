#include <stdio.h>
#include <stdlib.h>
struct emp {
    int id;
    char name[10];
    int age;
} ;
void Print(struct emp e){
    printf("\n %d:%s:%d",e.id,e.name,e.age);

}

int main()
{
    int i=0;
    struct emp arr[3];
    for(i=0;i<3;i++){
        printf("plz enter id for emp %d",i+1);
        scanf("%d",&arr[i].id);
        printf("plz enter name for emp %d",i+1);
        _flushall();
        scanf("%s",arr[i].name);
        printf("plz enter age for emp %d",i+1);
        scanf("%d",&arr[i].age);
    }
    for(int i=0;i<3;i++){
        Print(arr[i]);
    }
    //struct emp e1={10,"aly",30};
    //struct emp e2={30,"ahmed",40};
    //e1=e2;
    //e2.id=6000;
    //Print(e1);
    //Print(e2);

    //scanf("%d",&e1.id);
   // e1.id=20;
    //e1.age=30;
    //strcpy(e1.name,"aly");

    //printf("\n %d:%s:%d",e1.id,e1.name,e1.age);
    return 0;
}
