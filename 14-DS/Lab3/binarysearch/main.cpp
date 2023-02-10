#include <iostream>
#include <string.h>
using namespace std;
int sortChar(char a, char b)
{
    return a < b;
}
int strSmaller(char a[], char b[])
{
    int i = 0;
    while(a[i] != '\0' && b[i] != '\0')
    {
        if (sortChar(a[i], b[i])) return 1;
        i++;
    }
    return 0;
}
/*
void sortStrArr(int size,char* a[])
{
    char* temp = a[0];
    for(int i = 1; i < size; i++)
    {
        if(a[i] < )
    }
}
*/
int bsearchStr(char* arr[], char* key, int size)
{
    int start = 0;
    int end = size - 1;
    int mid;
    while(start <= end)
    {
        mid = (start + end) / 2;
        if(strcmp(key, arr[mid])==0 ) return mid;
        else if(strSmaller(key, arr[mid])) end = mid - 1;
        else start = mid + 1;
    }
    return -1;
}
int bsearch(int arr[], int key, int size)
{
    int start = 0;
    int end = size - 1;
    int mid;
    while(start <= end)
    {
        mid = (start + end) / 2;
        if(key == arr[mid]) return mid;
        else if(key < arr[mid]) end = mid - 1;
        else start = mid + 1;
    }
    return -1;
}
int recursiveBsearch(int arr[], int key, int start, int end, int mid)
{

    if(start > end) return -1;
    else if(key == arr[mid]) return mid;
    else {
         mid = (start + end) / 2;
         if(key < arr[mid]) end = mid - 1;
         else  start = mid + 1;
        return recursiveBsearch(arr, key, start, end, mid);
    }
}
int main()
{
    int arr [] = {10, 20, 30, 40, 50};
    cout << bsearch(arr, 30, 5) << endl;
    cout << bsearch(arr, 3, 5) << endl;
    cout << recursiveBsearch(arr, 30, 0, 4, 2) << endl;
    cout << recursiveBsearch(arr, 4, 0, 4, 2) << endl;
    char* str [] = {"ali", "ola", "yasmine"};
    cout << bsearchStr(str,"ola",3 );
    return 0;
}
