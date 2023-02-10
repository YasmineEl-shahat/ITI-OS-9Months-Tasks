#include <iostream>

using namespace std;

struct Node {
    int data;
    // Data Here Could Be One Thing of Many things ,
    // But We assume it is an int  , For Simplicity
    Node* next;
};

class CicularLinkendList
{
public:
    Node* last = new Node;
    // Last Will Be used in Many things   ;
    CicularLinkendList()
    {

        last->next = NULL ;
        // Last Refer to the First Element ,
        // When We Start  , No elements at All and Hence Last is null
        // Also All What we need is Use this "Last" For All Of Our Operations
    }

    void insertFromTop(int _data)
    {
        // This is a Single Circular List , We Can ONLY insert From One Direction
        // If We Have Next and Previous We Can insert From BOTH directions
    }

    void insertFromTail(int _data)
    {
        Node* newNode = new Node ;
        newNode->data = _data ;
        newNode->next = NULL ;
        if ( last->next == NULL)
        {
            // LL is Empty
            last->next = newNode  ;
        }
        else
        {
            Node* firstNode = new Node ; // We Make in With "new KeyWord " To keep it
            firstNode = last->next ;
            newNode->next = firstNode ;
            last->next = newNode ;
        }
    }


    void printCicle()
    {
        Node* lastAndStart = new Node ;
        lastAndStart = last ;
        while(lastAndStart->next != last )
        {
            lastAndStart = lastAndStart->next  ;
            if (lastAndStart == NULL)
                break;
            cout<<lastAndStart->data<<endl ;
        }
           cout<<"Printed From Last To Start and Reached Last Again"<<endl ;

    }
};


int main()
{
    CicularLinkendList CLL ;
    CLL.insertFromTail(5) ;
    CLL.insertFromTail(89) ;

    CLL.printCicle() ;

    return 0;
}
