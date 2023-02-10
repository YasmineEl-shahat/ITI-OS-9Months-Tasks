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
            cout <<"hi"<<endl;
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
};
int main()
{

    LL linked1;
    linked1.append(1, "Adele");

    linked1.append(2, "Yasmine");
    linked1.append(3, "Maro");

    linked1.display();
     cout << "number of nodes = " << linked1.Count() << endl;
    linked1.Insert(3, 30, "Rawan");
    linked1.display();
   // linked1.deleteById(1);
    //linked1.display();
     //cout << "number of nodes = " << linked1.Count() << endl;
     /*
    linked1.deleteById(1);
    linked1.display();
    cout << "number of nodes = " << linked1.Count() << endl;
    */
/*
    cout << "search for id 1's name" <<endl;
    cout << linked1.searchById2(1).name<<endl;
    cout << "search for Adele's id" <<endl;
    cout << linked1.searchByName2("Yasmine").id<<endl;
*/
    return 0;
}
