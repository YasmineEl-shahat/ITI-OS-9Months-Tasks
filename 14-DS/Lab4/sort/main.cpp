#include <iostream>
#include <stdio.h>
using namespace std;

void print (int arr[], int size)
{
    for(int i = 0; i < size ; i++) cout << arr[i] <<endl;
}
void bubble (int arr [], int size)
{
    int counter = 0;
    for(int i = 0; i < size -1 ; i++)
    {

        int notSwapped = 0;
        for(int j = 0; j < size - 1 - i; j++)
        {
            counter++;
            if(arr[j] > arr[j+1]) {
                    swap(arr[j], arr[j+1]);
                    notSwapped = 1;
            }
        }
        if(notSwapped == 0) break;
    }
    cout << "looping times=" << counter << endl;
}
void selection (int arr [], int size)
{
    int counter = 0;int min;
    for(int i = 0; i < size -1 ; i++)
    {
        min = i;

        for(int j = i+1; j < size; j++)
        {
            counter++;
            if(arr[min] > arr[j]) {
                    min = j;
            }
        }
        swap(arr[i], arr[min]);

    }
    cout << "looping times=" << counter << endl;
}
void insertion (int arr [], int size)
{
    int counter = 0;
    for(int i = 1; i < size; i++)
    {
       int j = i;
       while(j > 0 && arr[j] < arr[j-1])
       {
            swap(arr[j], arr[j-1]);
            j--;
            counter++;
       }
    }
    cout << "looping times=" << counter << endl;
}
int Partition(int arr[], int start, int end)
{

    int pivot = arr[end];
    int i = start - 1;
    for(int j = start; j < end; j++)
    {
        if(arr[j] < pivot)
        {
            i++;
            swap(arr[i], arr[j]);
        }
    }
    swap(arr[i+1], arr[end]);
    return i+1;
}
int PartitionStart(int arr[], int start, int end)
{

    int pivot = arr[start];
    int i = end+1;
    for(int j = end; j > start; j--)
    {
        if(arr[j] > pivot)
        {
            i--;
            swap(arr[i], arr[j]);
        }
    }
    swap(arr[i-1], arr[start]);
    return i-1;
}
void quick (int arr [], int start, int end)
{

    if(start >= end) return;
    //int pivot = Partition(arr, start, end);
    int pivot = PartitionStart(arr, start, end);
    quick(arr, start, pivot - 1);
    quick(arr, pivot + 1, end);


}
int main()
{
    /*
    int arr[] = {5,4,3,2,1};
    quick(arr, 0, 4);
    //selection(arr, 5);
    print(arr, 5);
    */


    return 0;
}
