#include <stdio.h>
#include <stdlib.h>

int main()
{
    // variables declaration
    float number;
    int first_num, second_num;


    printf("Hello world!\n");

    printf("ASCII number of a: %d \n", 'a');

    printf("Enter a float number: ");
    scanf("%f", &number);

    printf("Your float number  is : %f \n", number);

    printf("Hexa of 100 is : %x \n", 100);

    printf("Enter first number: ");
    scanf("%d", &first_num);

    printf("Enter second number: ");
    scanf("%d", &second_num);
    int sum = first_num + second_num;
    int sub = first_num - second_num;
    int multiply = first_num * second_num;
    int quotient = first_num / second_num;
    int remainder = first_num % second_num;
    printf("%d + %d = %d \n", first_num, second_num, sum);
    printf("%d - %d = %d \n", first_num, second_num, sub);
    printf("%d * %d = %d \n", first_num, second_num, multiply);
    printf("%d / %d = %d \n", first_num, second_num, quotient);
    printf("%d %% %d = %d \n", first_num, second_num, remainder);
    return 0;
}
