#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

int main()
{
   bool isAlphabet = false;
   int max, num;
   for(int i = 0; i < 3; i++){
    printf("enter number%d:", i + 1);
    scanf("%d", &num);
    if ( i == 0) max = num;
    else if (num > max) max = num;
   }
    printf("max num = %d\n", max);

    printf("enter number to generate multiplication table: ");
    scanf("%d", &num);
    for(int i = 1; i < 13; i++){
      printf("%d * %d = %d\n", i, num, i * num);
    }
    char ch;
    printf("enter some char to check if its alphabet: ");
    scanf("%s", &ch);
    if((ch > 64 && ch < 91) || (ch > 96 && ch < 123)) isAlphabet = true;
    if(isAlphabet)  printf("char is alphabet\n");
    else printf("char is not alphabet\n");
    return 0;
}
