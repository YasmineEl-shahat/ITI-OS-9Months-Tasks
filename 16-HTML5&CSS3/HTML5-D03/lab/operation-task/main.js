// prettier-ignore
document
    .querySelectorAll('.operation')
    .forEach((op) => {
        const operation = op.getAttribute('data-operation');
        const op1 = op.querySelector('.op1');
        const op2 = op.querySelector('.op2');
        const result = op.querySelector('.result');
        const calc = operation === '+' ? (a, b) => +a + +b : (a, b) => +a * +b;
        [op1, op2].forEach((inp) => {
            inp.addEventListener('change', function () {
                result.textContent = calc(op1.value, op2.value);
            });
        });
});
