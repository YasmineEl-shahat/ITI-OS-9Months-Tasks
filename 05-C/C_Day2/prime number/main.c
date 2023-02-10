#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>

bool isPrime(int num) {
  for (int i = 2; (i * i ) <= num; i++)
    {
        if(num % i == 0) {
            return false;
        }
    }
    return true;
}
int main()
{
    int num;

    printf("enter some number:");
    scanf("%d", &num);
    bool prime = isPrime(num);
    if(prime) printf("the number is prime\n");
    else printf("the number is not prime\n");

    // check if prime numbers before it
    printf("Prime numbers before it: ");
    for(int i = 1; i < num; i++)
    {
        if(isPrime(i)) printf("%d is prime\n", i);
        else printf("%d is not prime\n", i);
    }
    return 0;
}
