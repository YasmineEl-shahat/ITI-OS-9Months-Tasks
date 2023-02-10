#include <iostream>

using namespace std;

void swap_(int &x,int &y);
int main()
{
    int x = 20;
    int y = 30;

    cout << "before swap" << endl;
    cout << "x = " << x << ", y = " << y << endl;
    swap_(x, y);
    cout << "after swap" << endl;
    cout << "x = " << x << ", y = " << y;
    return 0;
}

void swap_(int &x,int &y)
{
    int temp = x;
    x = y;
    y = temp;
}

