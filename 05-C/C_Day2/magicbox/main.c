#include <stdio.h>
#include <stdlib.h>
#include <windows.h>


void gotoxy (int x, int y){
    COORD coord = {0,0};
    coord.X = x;
    coord.Y = y;
    SetConsoleCursorPosition(GetStdHandle(STD_OUTPUT_HANDLE),coord);
}
int main()
{
    int size_, row = 1, col;
    printf("enter magic box size");
    scanf("%d", &size_);
    if(size_ < 3 || size_ % 2 == 0){
        printf("invalid magic box size");
        return 0;
    }
    col = size_ / 2 + 1;
    gotoxy(col, row);
    printf( "%d", 1);

    for (int i = 2; i <= size_ * size_; i++ ){
        if(((i - 1) % size_ ) == 0){
            row ++;
            if(row > size_) row = 1;
            if(row < 1) row = size_;
        }
        else {
            row --;
            col --;
            if(row > size_) row = 1;
            if(row < 1) row = size_;
            if(col > size_) col = 1;
            if(col < 1) col = size_;
        }
        gotoxy(col, row);
        printf( "%d", i);
    }
    return 0;
}
