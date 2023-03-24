
/*
this is a function that returns greeting message
line 2
line 3
*/

/**
 * this is a function that returns greeting message
 * @param person this is a parameter that appends on the message
 */
function greeter(person: string) {
    return 'Hello, ' + person;
}

const user = 'John'; // this is a declaration of the user

document.body.textContent = greeter(user);

// We will use this line in the code
