#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <windows.h>

void textattr(int i)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),i);
}

void gotoxy(int x,int y)
{
    COORD coord = {0,0};
    coord.X=x;
    coord.Y=y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}
int main()
{
    char arr [3][10] = {"New", "Display", "Exit"};
    int current = 0, flag = 0;
    char ch;
    do{

        system("cls");
        for(int i = 0; i < 3; i++){

            if(i == current) textattr(0x70);
             else {textattr(0x07);}
            gotoxy(7, 10 + i);
            printf("%s", arr[i]);
        }
        ch = getch();

        switch(ch) {
        case -32:
            ch = getch();
             switch(ch) {
                case 72:
                    --current;
                    if(current < 0) current = 2;
                    break;
                case 80:
                    ++current;
                    if(current > 2) current = 0;
                    break;
                case 71:
                    current = 0;
                    break;
                case 79:
                    current = 2;
                    break;
             }
            break;
            case 27:
                 flag = 1;
                 break;
            case 13:

                 for(int i = 0; i < 3; i++){
                    if(i == current) textattr(0x70);
                    else textattr(0x07);
                    gotoxy(20, 10 + i);
                    printf("%s", arr[i]);
                }

                  /*
                system("cls");
                printf("%s,,,,,,", arr[current]);
                */
                 if(current == 2) flag = 1;
                getch();
                break;
        }

    }while(!flag);

    return 0;
}
