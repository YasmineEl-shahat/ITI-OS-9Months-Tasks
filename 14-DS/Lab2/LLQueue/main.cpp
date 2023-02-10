#include <iostream>
#include <string.h>
using namespace std;

struct node{
    int id;
    char name[30];
    node* next;
};
class Queue{
    node* rear;
    node* front;
public:
    Queue()
    {
        rear=front=NULL;
    }
    void enqueue(int id, char name [])
    {
        node* temp = new node;
        if(temp == NULL)
        {
            cout << "memory is full\n";
            return;
        }
        temp->id = id;
        strcpy(temp->name, name);
        temp->next=NULL;
        if(front==NULL)
        {
            front = rear = temp;
        }
        else{
            rear->next=temp;
            rear=temp;
        }
    }
    int dequeue(node& data)
    {
        if(front == NULL)
        {
            rear = NULL;
            cout <<"\nqueue is empty\n";
            return 0;
        }
        data.id = front->id;
        strcpy(data.name, front->name);
        data.next=NULL;
        node* temp = front;
        front = front->next;
        delete temp;
        return 1;
    }
};
int main()
{
    Queue q1;
    node x;
    if(q1.dequeue(x))
    {
        cout << "\n"<<x.id << ":"<<x.name;
    }
    q1.enqueue(10, "adele");
    if(q1.dequeue(x))
    {
        cout << "\n"<<x.id << ":"<<x.name;
    }
    q1.enqueue(20, "Yasmine");
    q1.enqueue(30, "Rawan");
        if(q1.dequeue(x))
    {
        cout << "\n"<<x.id << ":"<<x.name;
    }
        if(q1.dequeue(x))
    {
        cout << "\n"<<x.id << ":"<<x.name;
    }
        if(q1.dequeue(x))
    {
        cout << "\n"<<x.id << ":"<<x.name;
    }

    return 0;
}
