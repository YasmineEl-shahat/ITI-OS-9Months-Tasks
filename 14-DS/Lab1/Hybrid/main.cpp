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

struct hybridNode{
    char c;
    LL l;
};
class Hybrid{
    hybridNode arr[26];
    char alphabet[26]={'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'};
public:
    Hybrid()
    {
        for(int i = 0; i< 26; i++)
        {
            arr[i].c= alphabet[i];
        }
    }
    int findIndex(char c)
    {
        for(int i = 0; i< 26; i++)
        {
            if(c==alphabet[i])
                return i;
        }
    }
    void append(int id, char name[20])
    {
        char firstLetter = tolower(name[0]);
        int index = findIndex(firstLetter);
        arr[index].l.append(id,name);
    }
    void display()
    {
         for(int i = 0; i< 26; i++)
        {
            cout << arr[i].c << endl;
            arr[i].l.display();
        }
    }
};
int main()
{
    Hybrid h;
    h.append(1, "Adele");

    h.append(2, "Basma");
    h.append(3, "soad");
    h.display();

    return 0;
}
