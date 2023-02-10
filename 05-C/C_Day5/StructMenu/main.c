#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <conio.h>
#include <windows.h>


struct Emp {
    int id;
    char name [10];
    float salary;
    float bonus;
    float deduction;
};

int n;

bool string_compare(char string1 [10], char string2 [10]);
void newEmp (struct Emp* arr );
int SearchById (struct Emp* arr, int id);
int SearchByName (struct Emp* arr, char name [10]);
void Display(struct Emp element);
void DisplayAll( struct Emp* arr);
void textattr(int i);
void gotoxy(int x,int y);


int main()
{


    char arr [5][20] = {"New", "SearchById", "SearchByName", "Display", "Exit"};
    int index, id, current = 0, flag = 0;
    char ch, name [10];
    printf("enter number of elements:\n");
    scanf("%d", &n);
    struct Emp* Emps  = malloc(n * sizeof(struct Emp));
    for(int i = 0; i < n; i++)
    {
        Emps[i].id = 0;
        strcpy(Emps[i].name, "hello");
        Emps[i].salary = 2000;
        Emps[i].bonus = 25.5;
        Emps[i].deduction = 12.2;
    }

    do{
        system("cls");
        for(int i = 0; i < 5; i++){
            if(i == current) textattr(0x70);
            else textattr(0x07);
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
                    if(current < 0) current = 4;
                    break;
                case 80:
                    ++current;
                    if(current > 4) current = 0;
                    break;
                case 71:
                    current = 0;
                    break;
                case 79:
                    current = 4;
                    break;
             }
            break;
            case 27:
                 flag = 1;
                 break;
            case 13:
                system("cls");
                printf("%s,,,,,,\n", arr[current]);
                switch(current){
                    case 0:
                        newEmp(Emps);
                        break;
                    case 1:
                        printf("id:");
                        scanf("%d", &id);
                        index = SearchById(Emps, id);
                        Display(Emps[index]);
                        break;
                    case 2:
                        printf("name:");
                        _flushall();
                        scanf("%s", name);
                        index = SearchByName(Emps, name);
                        Display(Emps[index]);
                        break;
                    case 3:
                        DisplayAll(Emps);
                        break;
                    case 4:
                        flag = 1;
                        break;
                }
                getch();
                break;
        }

    }while(!flag);
    return 0;
}

bool string_compare(char string1 [10], char string2 [10])
{
    int i = 0;
    while(string1[i] != '\0')
    {
        if(string1[i] != string2[i]) return false;
        i++;
    }
    return true;
}

void newEmp (struct Emp* arr){
    int index, id;
    char name [10];
    float salary;
    float bonus;
    float deduction;
    printf("index[0-%d]:", n-1);
    scanf("%d", &index);
    printf("id:");
    scanf("%d", &id);
    printf("name:");
    scanf("%s", &name);
    printf("salary:");
    scanf("%f", &salary);
    printf("bonus:");
    scanf("%f", &bonus);
    printf("deduction:");
    scanf("%f", &deduction);
    arr[index].id = id;
    strcpy(arr[index].name, name);
    arr[index].salary = salary;
    arr[index].bonus = bonus;
    arr[index].deduction = deduction;
}

int SearchById (struct Emp* arr, int id){
    for(int i = 0; i < n; i ++){
        if(arr[i].id == id)
        {return i;}
    }
    return -1;
}

int SearchByName (struct Emp* arr, char name [10])
{
    for(int i = 0; i < n; i ++){
        if(string_compare(arr[i].name, name)) return i;
    }
    return -1;
}

void Display(struct Emp element){
    printf("id: %d, name: %s, NetSalary: %f\n", element.id, element.name, element.salary + element.bonus - element.deduction);
}
void DisplayAll(struct Emp* arr){
    for(int i = 0; i < n; i++)
    {
        Display(arr[i]);
    }
}
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
