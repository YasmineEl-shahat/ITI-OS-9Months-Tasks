#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

int main()
{

    int sum = 0;

    do {
        int num;
        scanf("%d", &num);
        sum += num;
    } while(sum < 100);


    bool flag = false;
    char ch;
    do {
        system("cls");
        printf("New | Display | exit\n");
        ch = getch();
        switch(ch){
            case 'n' :
            case 'N' :
                printf("new selected\n");
                break;
            case 'd' :
            case 'D':
                printf("Display selected\n");
                break;
            case 'e' :
            case 'E':
                printf("exit selected\n");
                flag = true;
                break;
        }
        getch();
    }while(!flag);

    printf("enter degree\n");
    int degree;
    scanf("%d", &degree);
    if(degree >= 85){
        printf("Excellent\n");
    }else if(degree >= 75){
        printf("Very good\n");
    }else if(degree >= 65){
        printf("good\n");
    }else if(degree >= 50){
        printf("pass\n");
    }else {
        printf("fail\n");
    }

    int checkodd;
    printf("enter some number\n");
    scanf("%d", &checkodd);
    if(checkodd % 2 == 0) printf("The entered number is even\n");
    else printf("The entered number is odd\n");
    bool exit = false;
    do{
        printf("press \"e\" as operation to exit \n");
        int num1, num2;
        char op;
        printf("enter first number\n");
        scanf("%d", &num1);
        printf("enter second number\n");
        scanf("%d", &num2);
        printf("enter operation to be done\n");
        op = getch();
        switch(op){
            case  '+':
                printf("%d \n", num1 + num2);
                break;
             case  '-':
                printf("%d \n", num1 - num2);
                break;
            case  '*':
                printf("%d \n", num1 * num2);
                break;
            case  '/':
                printf("%d \n", num1 / num2);
                break;
            case  '%':
                printf("%d \n", num1 % num2);
                break;
            case 'e' :
                exit = true;
                break;
            default:
                printf("invalid operation\n");
                break;
        }
    } while(!exit);



    return 0;
}
