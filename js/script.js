const rangeInputs = document.querySelectorAll('.form-range');
const numberInputs = document.querySelectorAll('.form-number');

rangeInputs.forEach(function (input, index) {
    const skillNumberInput = numberInputs[index];

    input.addEventListener('input', function () {
        skillNumberInput.value = input.value;
        document.getElementById(input.id + '-value').textContent = input.value;
    });

    skillNumberInput.addEventListener('input', function () {
        const inputValue = parseInt(skillNumberInput.value);
        if (inputValue >= parseInt(input.min) && inputValue <= parseInt(input.max)) {
            input.value = inputValue;
            input.dispatchEvent(new Event('input'));
        }
    });
});