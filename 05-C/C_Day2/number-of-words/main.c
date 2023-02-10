#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>

bool isAlphabet (char ch)
{
    return ((ch > 64 && ch < 91) || (ch > 96 && ch < 123));
}
int main()
{
    int words_count = 1, alphabet_count = 0;

    printf("enter a sentence!\n");
    /*
    char sentence[900];

    gets(sentence);
    for(int i = 0; i < strlen(sentence); i++){
      if(isAlphabet( sentence[i])) alphabet_count++;

      if( i != 0  && sentence[i] == ' ' && sentence[i - 1] != ' ') words_count++;
      if( i == strlen(sentence) - 1 && sentence[i] == ' ' ) words_count--;
    }
    */

    char ch ;
    int i = 1;

    do {

        scanf("%c", &ch);
        if(isAlphabet(ch))
        {
            alphabet_count++;
            i = 0;
        }
        else if(ch == ' ' && i == 0) {
                words_count ++;
                i = 1;
        }

    }while(ch != '\n');
    if(i == 1) words_count --;
    printf("num of alphabets = %d\n", alphabet_count);
    printf("num of words = %d\n", words_count );
    return 0;
}
