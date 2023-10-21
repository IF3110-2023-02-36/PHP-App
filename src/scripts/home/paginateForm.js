const form = document.getElementById('form');

function paginateForm(page) {
    form.action = "/Home/" + page;
    form.submit();
}