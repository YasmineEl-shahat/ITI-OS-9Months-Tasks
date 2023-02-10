#include <iostream>

using namespace std;


class Queue{
    int* arr;
    int Size;
    int rear;
public:
    Queue(int _size = 5)
    {
        rear=-1;
        Size=_size;
        arr=new int [Size];
    }

    // copy cotr needed because of dynamic allocated memory
    Queue (Queue& q)
    {
        cout << "in copy constructor" << endl;
        Size = q.Size;
        arr = new int [Size];
        rear = q.rear;
        for(int i = 0; i <= Size; i++)
        {
            arr[i] = q.arr[i];
        }
    }
    int isFull()
    {
        return (rear==Size-1);
    }
    int isEmpty()
    {
        return (rear == -1);
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
            rear++;
            arr[rear] = data;
        }
    }
    // if 0 return dont do anything, if 1 use data
    int dequeue(int& data)
    {
        if(isEmpty())
        {
            cout << "queue is empty";
            return 0;
        }
        data=arr[0];
        rear --;
        for(int i = 1; i < Size; i++)
        {
            arr[i-1] = arr[i];
        }
        return 1;
    }
    int getSum(int start, int end)
    {
        if(start == end)
            return arr[start];
        return arr[start]+getSum(start+1, end);
    }
};
int main()
{
    Queue q1;
    q1.enqueue(1);
    q1.enqueue(2);
    q1.enqueue(3);
    q1.enqueue(4);
    q1.enqueue(5);
    q1.enqueue(6);
    cout << "sum of elements=" << q1.getSum(0,1) <<endl;
    while(!q1.isEmpty())
    {
        int x;
        q1.dequeue(x);
        cout << x << "\n";
    }
    return 0;
}
