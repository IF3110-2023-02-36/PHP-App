const debounceDelay = 2000;

function submitForm() {
    form.submit();
}

function addDropdownListener(id) {
    const element = document.getElementById(id);
    element.addEventListener('change', () => submitForm());
}

function addDebounceListener(id) {
    const element = document.getElementById(id);
    element.addEventListener('keyup',
                            debounce(() => submitForm(), debounceDelay));
}

const dropdownElement = ["sort", "order", "category"];
const debounceElement = ["search", "min-price", "max-price"];

dropdownElement.forEach(addDropdownListener);
debounceElement.forEach(addDebounceListener);
