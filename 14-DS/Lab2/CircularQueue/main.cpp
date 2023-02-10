#include <iostream>

using namespace std;


class Queue{
    int* arr;
    int Size;
    int rear;
    int Front;
public:
    Queue(int _size = 5)
    {
        rear=Front=-1;
        Size=_size;
        arr=new int [Size];
    }
    //copy cotr needed because of dynamic allocated memory
    Queue (Queue& q)
    {
        cout << "in copy constructor" << endl;
        Size = q.Size;
        arr = new int [Size];
        rear = q.rear;
        Front = q.Front;
        for(int i = 0; i <= Size; i++)
        {
            arr[i] = q.arr[i];
        }
    }

    int isFull()
    {
        return (Front==0 && rear==Size-1 || Front == rear+1);
    }
    void enqueue(int data)
    {
        if(isFull())
        {
            cout <<"queue is full\n";
            return;
        }
        else
        {
            if(rear == -1)
            {
                rear = Front = 0;
            }
            else if(rear == Size - 1)
            {
                rear = 0;
            }
            else{
                rear++;
            }
            arr[rear] = data;
        }
    }
    // if 0 return dont do anything, if 1 use data
    int dequeue(int& data)
    {
        if(Front == -1)
        {
            cout << "queue is empty";
            return 0;
        }
        data=arr[Front];
        if(Front == rear)
        {
            Front=rear=-1;
        }
        else if(Front == Size - 1)
        {
            Front = 0;
        } else Front++;
        return 1;
    }
};
int main()
{
    Queue q1;
    q1.enqueue(10);
    q1.enqueue(20);
    q1.enqueue(30);
    q1.enqueue(40);
    q1.enqueue(50);
    q1.enqueue(60);
    q1.enqueue(70);
    int x;
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    q1.enqueue(60);
    q1.enqueue(70);
    q1.enqueue(60);
    q1.enqueue(70);

    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    if(q1.dequeue(x) == 1)
    {
        cout << x <<endl;
    }
    return 0;
}
