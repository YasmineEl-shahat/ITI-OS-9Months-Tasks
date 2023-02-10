#include <iostream>

using namespace std;

class complex_
{
    int real;
    int img;
    static int counter;
    public:
    complex_()
    {
        real = 0;
        img = 0;
        counter++;
    }
    complex_(int _real, int _img)
    {
        real = _real;
        img = _img;
        counter++;
    }

    complex_(const complex_& r)
    {
        real = r.real;
        img = r.img;
        counter ++;
    }

    void setReal(int _real)
    {
        real = _real;
    }
    int getReal()
    {
        return real;
    }
    void setImg(int _img)
    {
        img = _img;
    }
    int getImg()
    {
        return img;
    }
    static int getCounter()
    {
        return counter;
    }
    void print()
    {
        cout << real << "+i*"  << img <<endl;
    }
    complex_ add(complex_ num)
    {
        /*
        complex_ res;
        res.real = real + num.real;
        res.img = img + num.img;
        */
        complex_ res(real + num.real, img + num.img);
        return res;
    }
    //operator overload
     complex_ operator+(complex_ num)
    {
        complex_ res(real + num.real, img + num.img);
        return res;
    }
     complex_ operator+(int num)
    {
        complex_ res(real + num, img);
        return res;
    }
    complex_ operator++()
    {
        real++;
        return *this;
    }
    complex_ operator++(int)
    {
        complex_ res(real, img);
        real++;
        return res;
    }
    // return reference so not to call default copy constructor (improve performance)
    //operator overloading perform shallow copy
     complex_& operator+=(complex_ num)
    {
        real = real + num.real;
        img = img + num.img;
        return *this;
    }
    int operator== (complex_ c){
        // this is a pointer to caller object
        return (c.real == this -> real && img == c.img);
    }
    // prevent the method from calling copy constructor when creating parameter object
    //by taking reference parameter
    // const reference prevent us from changing data in the method , just read it
    complex_ operator=(const complex_& c)
    {
        real = c.real;
        img = c.img;
        return *this;
    }
    friend complex_ operator+(int x, complex_ c);
    ~complex_()
    {
        counter--;
    }
};

// friend function : function can reach class's private member
// friend function, stand alone function  violate roles of oop because of accessing private members
complex_ operator+(int x, complex_ c)
{
    complex_ res(c.real + x, c.img);

    /*
    res.setReal(c.getReal() + x);
    res.setImg(c.getImg());
    */
    return res;
}

//operators that can not be overloaded
//.
// ::
// ->
// ?:
int complex_::counter = 0;


int main()
{
    complex_ cmp;
    cout << "counter: "<< complex_::getCounter() << endl;
    cmp.setReal(20);
    cmp.setImg(-50);
    cmp.print();
    complex_ num2;
    cout << "counter: "<< complex_::getCounter() << endl;

    num2.setReal(10);
    num2.setImg(-10);
    num2.print();
    complex_ c1 (10, 20);
    cout << "counter: "<< complex_::getCounter() << endl;

    complex_ res = (cmp.add(num2)).add(c1);
    cout << "counter: "<< complex_::getCounter() << endl;

    res.print();
    res = cmp.operator+(num2);
    res.print();
    res = cmp + num2 + c1;
    res.print();
    res = cmp + 10;
    res.print();
    res = 1 + cmp;
    res.print();
    if(cmp == c1) cout << "equal\n";
    else cout << "not equal\n";
    res += c1;

    res.print();
    c1++.print();
    c1.print();
    res = c1 = num2;
    cout << "\nresss:";
    res.print();
    cout << "counter: "<< complex_::getCounter() << endl;

    return 0;
}
