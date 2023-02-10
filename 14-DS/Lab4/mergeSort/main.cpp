#include <iostream>

using namespace std;
static void Merge(int arr [], int start,int mid ,int end){
    int leftLen = (mid - start) + 1 ;
    int rightLen = end - mid ;
    int* leftArr = new int[leftLen];
    int* rightArr = new int[rightLen];
    for(int i = 0 ;i < leftLen;i++){
        leftArr[i] = arr[start+i];
    }
    for(int j = 0 ;j < rightLen;j++){
        rightArr[j] = arr[mid+1+j];
    }
    int i , j , k;
    i = j =0;
    k=start;
    while( i < leftLen && j < rightLen){
        if(leftArr[i] <= rightArr[j]){
            arr[k] = leftArr[i];
            i++;
        }else{
             arr[k] = rightArr[j];
              j++;
        }
        k++;
    }
    while( i < leftLen){
        arr[k] = leftArr[i];
        i++;
        k++;
    }
    while(j < rightLen){
        arr[k] = rightArr[j];
        j++;
        k++;
    }
}
static void mergeSort(int arr[] ,int start,int end){
    if(end <= start) return;
    int mid = (end  + start) / 2;
    mergeSort(arr,start,mid);
    mergeSort(arr,mid+1,end);
    Merge(arr,start,mid,end);

}
int main()
{

    return 0;
}
