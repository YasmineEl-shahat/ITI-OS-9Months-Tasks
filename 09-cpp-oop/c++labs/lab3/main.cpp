#include <iostream>
#include <graphics.h>
using namespace std;

class point{
    int x;
    int y;
    public:
    point()
    {
        x = 0;
        y = 0;
    }
    point(int _x)
    {
        x = _x;
        y = 0;
    }
    point(int _x, int _y)
    {
        x = _x;
        y = _y;
        cout << "in point constructor\n";
    }
    void setX(int _x)
    {
        x = _x;
    }
    int getX()
    {
        return x;
    }
    void setY(int _y)
    {
        y = _y;
    }
    int getY()
    {
        return y;
    }

};
class rectangle_ {
    point ul;
    point lr;
    public:
    rectangle_(int x1, int y1, int x2, int y2):ul(x1, y1),lr(x2, y2)
    {
        cout << "in rectangle constructor\n";
    }
    void draw()
    {
        rectangle(ul.getX(), ul.getY(), lr.getX(), lr.getY());
    }
};
class triangle {
    point p1;
    point p2;
    point p3;
    public:
    triangle(int x1, int y1, int x2, int y2, int x3, int y3):p1(x1, y1),p2(x2, y2), p3(x3, y3)
    {
        cout << "in triangle constructor\n";
    }
    void draw()
    {
        line(p1.getX(), p1.getY(), p2.getX(), p2.getY());
        line(p1.getX(), p1.getY(), p3.getX(), p3.getY());
        line(p2.getX(), p2.getY(), p3.getX(), p3.getY());
    }
};
class circle_ {
    point center;
    int radius;
    public:
    circle_(int x1, int y1,int _radius):center(x1, y1)
    {
        radius = _radius;
        cout << "in circle constructor\n";
    }
    void draw()
    {
        circle(center.getX(), center.getY(), radius);
    }
};

class pic{
    rectangle_* ptrr;
    int nr;
    circle_* ptrc;
    int nc;
public:
    pic()
    {
        ptrr = NULL;
        ptrc = NULL;
        nr = nc =  0;
        cout << "default constructor\n" ;
    }
    pic(rectangle_* _ptrr, int _nr, circle_* _ptrc, int _nc)
    {
        ptrr = _ptrr;
        nr = _nr;
        ptrc = _ptrc;
        nc = _nc;
    }
    void paint()
    {
        for(int i = 0; i < nr; i++)
        {
            ptrr[i].draw();
        }
        for(int i = 0; i < nc; i++)
        {
            ptrc[i].draw();
        }
    }
};
int main()
{
    int gdriver = DETECT, gmode, errorcode;
    initgraph(&gdriver,&gmode,"d:\\tc\\bgi");

    /*
    rectangle_ r(20, 20, 100, 200);
    triangle t (150, 150, 300, 300, 450, 150);
    circle_ c (300, 200, 50);
    r.draw();
    t.draw();
    c.draw();
    */

    rectangle_ arr[3] = {rectangle_(40, 80, 50, 25),
                         rectangle_(30, 40, 100, 50),
                         rectangle_(20, 20, 200, 100),
                        };
    int arr2 [3] = {1, 2, 3};
    int* arr1;
    arr1 = arr2;
    cout << "arr[0]" << arr1[0]<<endl;
    circle_ acc[3] = {circle_(300, 200, 50),
                      circle_(300, 200, 70),
                      circle_(300, 200, 90)};
    pic p1(arr, 3, acc, 3);
    p1.paint();
    cout << "before p2\n";
    pic p2;
    getch();
    closegraph();
    return 0;
}
