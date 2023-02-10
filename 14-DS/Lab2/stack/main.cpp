#include <iostream>
#include <string.h>

using namespace std;
struct node{
    int id;
    char name[20];
    node* prev;
    node* next;
};
class LL {
    node* head;
    node* tail;

    node* searchById (int _id)
    {
        node* temp = head;
        while(temp != NULL){
             if (temp -> id == _id)
             {
                 return temp;
             }
            temp = temp -> next;
        }
        return temp;
    }
    node* searchByName (char _name [20])
    {
        node* temp = head;
        while(temp != NULL){
             if (strcmp(temp->name, _name) == 0)
             {
                 return temp;
             }
            temp = temp -> next;
        }
        return temp;
    }
public:
    LL()
    {
        head=tail=NULL;
    }
    void append(int _id, char _name[20])
    {
        node* temp = new node;
        temp -> id = _id;
        strcpy(temp -> name, _name);
        temp -> prev = NULL;
        temp -> next = NULL;
        if(head == NULL)
        {
            head = tail = temp;
        }else {
            tail -> next = temp;
            temp -> prev = tail;
            tail = temp;
        }
    }
    void display()
    {
        node* temp = head;
        while(temp != NULL)
        {
            cout << "id: " << temp -> id << ",name: " << temp -> name << endl;
            temp = temp -> next;
        }
    }
    int Count()
    {
        int counter = 0;
        node* temp = head;
        while(temp != NULL){
             counter++;
             temp = temp -> next;
        }
        return counter;
    }

    node copyNode(node* node1)
    {
        node newNode;
        newNode.id = node1 -> id;
        strcpy(newNode.name ,node1 -> name);
        newNode.prev = NULL;
        newNode.next = NULL;
        return newNode;
    }
    node searchById2 (int _id)
    {
        node* node1 = searchById(_id);
        return copyNode(node1);
    }
    node searchByName2(char _name[20])
    {
        node* node1 = searchByName(_name);
        return copyNode(node1);
    }
    void deleteNode(node* selectedNode)
    {
        node* previousNode = selectedNode->prev;
        node* nextNode = selectedNode->next;
        int counter = Count();
        if(counter == 1)
        {
           head=tail=NULL;
        }
        else if(selectedNode == tail)
        {
            previousNode->next= NULL;
            tail=previousNode;
        }
        else if(selectedNode == head)
        {
            nextNode->prev = NULL;
            head=nextNode;
        }
        else{
            previousNode->next = nextNode;
            nextNode->prev = previousNode;
        }
        delete selectedNode;
    }
    void deleteById(int _id)
    {
        node* selectedNode = searchById(_id);
        deleteNode(selectedNode);
    }
    void deleteByName(char _name [20]){
        node* selectedNode = searchByName(_name);
        deleteNode(selectedNode);
    }
    void Insert(int position, int _id, char _name[20])
    {
        int counter=0;
        node* temp = head;
        node* insertedNode = new node;
        insertedNode->id = _id;
        strcpy(insertedNode->name, _name);
        insertedNode->next = NULL;
        insertedNode->prev = NULL;
        //case 1 insert head
        if(position == 0)
        {
            insertedNode->next = temp;
            temp -> prev = insertedNode;
            head=insertedNode;
        }
        else{

            while(counter<=position)
            {
                if(counter == position) break;
                temp = temp->next;
                counter ++;
            }
            //case 2 insert tail
            if(temp == NULL)
            {
                append(_id, _name);
            }else {

                node* previousNode = temp->prev;

                //case 3 insert في النص
                previousNode->next = insertedNode;
                insertedNode->prev = previousNode;
                temp->prev = insertedNode;
                insertedNode->next = temp;
            }
        }

    }
    node tailData()
    {
        if (tail != NULL)
        {
            node data;
            data.id = tail->id;
            strcpy(data.name, tail->name);
            return data;
        }
    }
};
class Stack{
    LL l1;
public:
    void push(int _id, char _name [20])
    {
        l1.append(_id, _name);
    }
    node pop()
    {
        node data = l1.tailData();
        l1.deleteById(data.id);
        return data;
    }
};
int main()
{
    Stack s1;
    s1.push(1,"Adele");
    s1.push(2,"Yasmine");
    s1.push(3,"Rawan");
    int i = 3;
    while(i--)
    {
        node n = s1.pop();
        cout << n.id << ":" << n.name <<"\n";
    }
    return 0;
}
