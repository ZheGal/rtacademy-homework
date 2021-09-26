    document.getElementById('formSubmit').onclick = () => calc();

    function calc() {
        cleanErrors();

        let error = false;
        let result = 0;

        let actions = ['+', '-', '*', '/', '%', '**']; 

        let operandOne = document.getElementById('operandOne');
        let operandTwo = document.getElementById('operandTwo');
        let action = document.getElementById('formAction');
        let resultInput = document.getElementById('result');

        if (operandOne.value == '') {
            error = true;
            operandOne.classList.add("error");
        }

        if (operandTwo.value == '') {
            error = true;
            operandTwo.classList.add("error");
        }

        if (!actions.includes(action.value)) {
            error = true;
            action.classList.add("error");
        }

        if (error) {
            return error;
        }

        switch (action.value) {
            case '+':
                result = Number(operandOne.value) + Number(operandTwo.value);
                resultInput.value = result;
                break;
            case '-':
                result = Number(operandOne.value) - Number(operandTwo.value);
                resultInput.value = result;
                break;
            case '*':
                result = Number(operandOne.value) * Number(operandTwo.value);
                resultInput.value = result;
                break;
            case '/':
                result = Number(operandOne.value) / Number(operandTwo.value);
                resultInput.value = result;
                break;
            case '%':
                result = Number(operandOne.value) % Number(operandTwo.value);
                resultInput.value = result;
                break;
            case '**':
                result = Number(operandOne.value) ** Number(operandTwo.value);
                resultInput.value = result;
                break;
        }
    }

    function cleanErrors() {
        let items = document.querySelectorAll('.error');
        Array.from(items).forEach(item => {
            item.classList.remove('error');
        })
    }