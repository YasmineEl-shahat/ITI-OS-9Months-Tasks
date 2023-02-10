#include <stdio.h>
#include <stdlib.h>
#define rows 3
#define cols 4

#include <windows.h>


void gotoxy (int x, int y){
    COORD coord = {0,0};
    coord.X = x;
    coord.Y = y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}
int main()
{


    int arr[rows][cols], rowsSum[rows]={0}, colsAvg[cols]={0};

    for(int i = 0; i < rows; i++){
        for(int j = 0; j < cols; j++){
             printf("enter arr element  [%d][%d] ", i, j);
             scanf("%d", &arr[i][j]);
        }
    }
    system("cls");
    for(int i = 0; i < rows; i++){
        for(int j = 0; j < cols; j++){
            rowsSum[i] += arr[i][j];
            gotoxy(j, i);
            printf("%d", arr[i][j]);
        }
    }
     for(int j = 0; j < cols; j++){
        for(int i = 0; i < rows; i++){
            colsAvg[j] += arr[j][i];
        }
        colsAvg[j] =  colsAvg[j] / cols;
    }
    system("cls");
    printf("sum of rows array :\n");
    for(int i = 0; i < rows; i++){
        printf("%d\n", rowsSum[i]);
    }
     printf("avg of cols array :\n");
    for(int i = 0; i < cols; i++){
        printf("%d\n", colsAvg[i]);
    }


    return 0;
}
