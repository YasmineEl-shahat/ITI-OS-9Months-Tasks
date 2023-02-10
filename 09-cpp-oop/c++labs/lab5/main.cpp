#include <iostream>

using namespace std;

class shape{
    protected:
        float dim1;
        float dim2;
        float area;
    public:
        shape()
        {
            dim1 = 0;
            dim2 = 0;
            area = 0;
        }
        shape(float _dim1 = 0, float _dim2 = 0)
        {
            dim1 = _dim1;
            dim2 = _dim2;
        }
        void setDim1(float _dim1)
        {
            dim1 = _dim1;
        }
        float getDim1()
        {
            return dim1;
        }
        void setDim2(float _dim2)
        {
            dim2 = _dim2;
        }
        float getDim2()
        {
            return dim2;
        }
        void setArea(float _area)
        {
            area = _area;
        }
        float getArea()
        {
            return area;
        }
        float virtual calcArea() = 0; // pure virtual function
};

class rectangle: public shape{
    public:
    rectangle(float _dim1,float _dim2):shape(_dim1, _dim2)
    {

    }
    float calcArea()
    {
        return dim1 * dim2;
    }
};
class triangle: public shape{
    public:
    triangle(float _dim1,float _dim2):shape(_dim1, _dim2)
    {

    }
    float calcArea()
    {
        return 0.5 * dim1 * dim2;
    }
};

void myfun(shape* s)
{
    cout << "\narea="<< s->calcArea();
}
int main()
{
    rectangle r1(10, 20);
    triangle t1(10, 20);
    shape** arr = new shape*[3];
    arr[0] = &r1;
    arr[1] = &t1;
    arr[2] = new triangle(10, 2);
    for(int i = 0; i < 3; i++)
    {
        myfun(arr[i]);
    }
    float sum = 0;
    for(int i = 0; i < 3; i++)
    {
        sum += arr[i] -> calcArea();
    }
    cout << "\nsum= " << sum;
    return 0;
}
