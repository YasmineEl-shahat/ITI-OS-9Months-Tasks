
#include <iostream>

using namespace std;


class Stack
{
    int tos;
    int Size;
    int *arr;
    public:
    Stack()
    {
        tos=-1;
        Size=5;
        arr=new int[Size];
        cout<<"constructor"<<endl;
    }
    Stack(int _size)
    {
      tos = -1;
      Size = _size;
      arr = new int [Size];
      cout << "in constructor" << endl;
    }
    Stack (Stack& s)
    {
        cout << "in copy constructor" << endl;
        tos = s.tos;
        Size = s.Size;
        arr = new int [Size];
        for(int i = 0; i <= tos; i++)
        {
            arr[i] = s.arr[i];
        }
    }
    void push(int element)
    {
        if(tos == Size - 1)
        {
            cout << "Stack is full" << endl;
        }
        else{
            tos ++;
            arr[tos] = element;
        }
    }
    int pop()
    {
        if(tos == -1)
        {
            cout << "stack is empty" << endl;
        }
        else{
            int element = arr[tos];
            tos --;
            return element;
        }
    }
    int isEmpty(){
        return tos == -1;
    }
    Stack operator=(const Stack& s)
    {
        tos = s.tos;
        Size = s.Size;
        delete arr;
        arr = new int [Size];
        for(int i = 0; i <= tos; i++)
        {
            arr[i] = s.arr[i];
        }
        return *this;
    }

    Stack operator+(Stack s)
    {
        Stack result;
        result.tos = tos + s.tos;
        result.Size = Size + s.Size;
        result.arr = new int [result.Size];
        for(int i = 0; i <= tos; i++)
        {
            result.arr[i] = arr [i];
        }
        for(int i = 0; i<= s.tos; i++)
        {
            result.arr[i+tos+1] = s.arr[i];
        }
        return result;
    }

    void print()
    {
        for(int i=0; i<=tos; i++)
        {
            cout<<arr[i]<<endl;
        }
    }
    ~Stack(){
        delete arr;
        cout << "in destructor" << endl;
    }
};

void fun(Stack s) {
    cout << "In fun\n" ;
}
int main()
{
    Stack s2(5);
    fun(s2);
    Stack s3(s2);
    Stack s4 = s2;
    Stack s5(5);
    s5 = s2;
    s2.push(1);
    s2.push(2);
    s2.push(3);
    s2.push(1);
    s2.push(5);
    s2.push(4);
    Stack s6(3);
    s6.push(7);
    s6.push(8);
    s6.push(9);
    Stack s7;
    s7 = s6+s2;
    cout << "\nsumbittion result\n";
    s7.print();
    cout << "\nsumbittion result\n";
    while(!s2.isEmpty())
    {
        cout << s2.pop() <<endl;
    }


    return 0;
}

