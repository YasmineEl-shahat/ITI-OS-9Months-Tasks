
/*
#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <windows.h>

#define size 50
void print(char* ptr, int num);
void gotoxy(int x,int y);
void textattr(int i);
int main()
{
    int arr [size + 1];
    int flag = 1;
    char *cur_ptr, *end_ptr;
    cur_ptr = end_ptr = arr;
    int x = 40, y = 5;
    gotoxy(x, y);
    for(int i = 0; i < size; i++)
    {
        textattr(0x70);
        printf(" ");
    }
    textattr(0x07);
    int current = x, end = x, i = 0;
    char key;
    do{
        fflush(stdin);
        key = getch();
        if(key == -32)
        {
            key = getch();
            switch(key)
            {
                // up
                case 72:
                    printf("%c", toupper(*cur_ptr));
                // down
                case 80:
                    printf("%c", tolower(*cur_ptr));
                // right
                case 77:
                    if(current == end)
                    {
                        cur_ptr = end_ptr;
                    }else
                    {
                        current++;
                        cur_ptr++;
                    }
                    break;
                // left
                case 75:
                    if(current == x)
                    {
                        cur_ptr = arr;
                    }else
                    {
                        current--;
                        cur_ptr--;
                    }
                    break;
                // end
                case 79:
                    current = end;
                    cur_ptr = end_ptr;
                    break;
                // home
                case 71:
                    current = x;
                    cur_ptr = arr;
                    break;
            }
            gotoxy(current, y);
        }
        else{
            switch(key){
                case 13:
                    print(arr, i);
                    break;
                case 27:
                    if(current == 89) end_ptr++;
                    *end_ptr = '\0';
                    flag = 0;
                    break;
                default:
                    printf("%c", key);
                    *cur_ptr = key;
                    arr[i] = key;
                    i++;
                    if(end < 89 && current == end)
                    {
                        end++;
                        end_ptr++;
                        current++;
                        cur_ptr++;
                    }
                    gotoxy(cur_ptr, y);
                    break;
            }
        }
    }while(flag);

    return 0;
}

void print(char* ptr, int num)
{
    printf("\n");
    for(int i = 0; i< num; i++)
    {
        printf("%c", ptr[i]);
    }
}

void gotoxy(int x,int y)
{
    COORD coord = {0,0};
    coord.X=x;
    coord.Y=y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}

void textattr(int i)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),i);
}
*/



#include <stdio.h>
#include <stdlib.h>
#include <conio.h>
#include <windows.h>


void textattr(int i)
{
    SetConsoleTextAttribute(GetStdHandle(STD_OUTPUT_HANDLE),i);
}

COORD coord= {0,0};
void gotoxy(int x,int y)
{
    coord.X=x;
    coord.Y=y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}
void changeLocation(int newLoaction,int oldLocation,char ch[])
{
    gotoxy(oldLocation,0);
    textattr(0x47);
    printf("%c",ch[oldLocation]);
    gotoxy(newLoaction,0);
    textattr(0x07);
    printf("%c",ch[newLoaction]);
}
void printInLocation(int location,char ch[],char c)
{
    gotoxy(location,0);
    if(c==1)
    textattr(0x07);
    else
    textattr(0x47);
    printf("%c",ch[location]);
}

void deleteChar(int location, int len, char ch[]){
    ch[location]=ch[location+1];
    printInLocation(location,ch,1);
    for(int i=location+1;i<len-1;i++){
        ch[i]=ch[i+1];
        printInLocation(i,ch,0);
    }
    ch[len-1]='_';
    printInLocation(len-1,ch,0);
}

void hide(){
    HANDLE  consolehandle = GetStdHandle(STD_OUTPUT_HANDLE);
    CONSOLE_CURSOR_INFO info;
    info.dwSize=100;
    info.bVisible = FALSE;
    SetConsoleCursorInfo(consolehandle, &info);
}

void task()
{
    int len, location=0, flag=0;
    printf("enter length: ");
    scanf("%d",&len);
    char *ch = malloc(len*sizeof(char)),c;
    for(int i=0; i<len; i++)
    {
        ch[i]='_';
    }
    system("cls");
    textattr(0x07);
    printf("%c",ch[0]);
    textattr(0x47);
    for(int i=1; i<len; i++)
    {
        printf("%c",ch[i]);
    }
    hide();
    while(flag==0)
    {
        c = getch();
        if((c>='a'&&c<='z')||(c>='A'&&c<='Z')||c==32){
            ch[location]=c;
            if(location!=len-1)
            location++;
            changeLocation(location,location-1,ch);
        }
        switch(c)
        {
        case -32:
        {
            c=getch();
            switch(c)
            {
            case 77:
                if(location>=len-1)
                {
                    location=0;
                    changeLocation(location,len-1,ch);
                }
                else
                {
                    location++;
                    changeLocation(location,location-1,ch);
                }
                break;
            case 75:
                if(location<=0)
                {
                    location=len-1;
                    changeLocation(location,0,ch);
                }
                else
                {
                    location--;
                    changeLocation(location,location+1,ch);
                }
                break;
            case 72:
            {
                if(ch[location]>='a'&&ch[location]<='z')
                    ch[location]-=32;
                    printInLocation(location,ch,1);
                break;
            }
            case 80:
            {
                if(ch[location]>='A'&&ch[location]<='Z')
                    ch[location]+=32;
                    printInLocation(location,ch,1);
                break;
            }
            }
            break;
        }
            case 8:
                deleteChar(location,len,ch);
        }
    }
    }


int main()
{
    task();
}
