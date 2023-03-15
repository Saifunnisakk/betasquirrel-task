const display = document.querySelector('.display');
const buttons = document.querySelectorAll('.btn');
let firstOperand = '';
let operator = '';
let secondOperand = '';
let result = '';

function updateDisplay(value) {
  display.textContent = value;
}

function clear() {
  firstOperand = '';
  operator = '';
  secondOperand = '';
  result = '';
  updateDisplay('');
}

function calculate() {
  let num1 = parseFloat(firstOperand);
  let num2 = parseFloat(secondOperand);
  if (operator === '+') {
    result = num1 + num2;
  } else if (operator === '-') {
    result = num1 - num2;
  } else if (operator === '*') {
    result = num1 * num2;
  } else if (operator === '/') {
    result = num1 / num2;
  }
  updateDisplay(result);
  firstOperand = result;
  operator = '';
  secondOperand = '';
}

buttons.forEach(button => {
  button.addEventListener('click', () => {
    const value = button.getAttribute('value');
    if (value === 'C') {
      clear();
    } else if (value === '+' || value === '-' || value === '*' || value === '/') {
      operator = value;
      updateDisplay('');
    } else if (value === '=') {
      calculate();
    } else {
      if (!operator) {
        firstOperand += value;
        updateDisplay(firstOperand);
      } else {
        secondOperand += value;
        updateDisplay(secondOperand);
      }
    }
  });
});