const display = document.querySelector(".display");
const operators = document.querySelectorAll(".operator");
const numbers = document.querySelectorAll(".number");
const equals = document.querySelector(".equals");
const clear = document.querySelector(".clear");

let firstOperand = "";
let secondOperand = "";
let currentOperator = null;
let shouldResetScreen = false;

function inputNumber(number) {
  if (shouldResetScreen) {
    clearScreen();
  }
  display.textContent += number;
}

function inputOperator(operator) {
  if (currentOperator !== null) {
    calculate();
  }
  firstOperand = display.textContent;
  currentOperator = operator;
  display.textContent += operator;
}

function clearScreen() {
  display.textContent = "";
  firstOperand = "";
  secondOperand = "";
  currentOperator = null;
}

function calculate() {
  if (currentOperator === null || shouldResetScreen) {
    return;
  }
  if (currentOperator === "/" && display.textContent === "0") {
    alert("Cannot divide by zero!");
    clearScreen();
    return;
  }
  secondOperand = display.textContent.slice(firstOperand.length + 1);
  display.textContent = operate(
    currentOperator,
    parseFloat(firstOperand),
    parseFloat(secondOperand)
  );
  currentOperator = null;
}

function operate(operator, a, b) {
  switch (operator) {
    case "+":
      return a + b;
    case "-":
      return a - b;
    case "*":
      return a * b;
    case "/":
      return a / b;
  }
}

numbers.forEach((button) => {
  button.addEventListener("click", () => inputNumber(button.value));
});

operators.forEach((button) => {
  button.addEventListener("click", () => inputOperator(button.value));
});

equals.addEventListener("click", calculate);

clear.addEventListener("click", clearScreen);