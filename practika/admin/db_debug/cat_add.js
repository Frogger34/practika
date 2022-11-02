// Функция проверки на заполнение полей
(() => {
                      
    // Получает все формы с классом "needs-validation"
    const forms = document.querySelectorAll('.needs-validation')
  
    // Циклически проверяет их и предотвращает отправку формы,
    // если условие выполнено
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        } 
        form.classList.add('was-validated')
      }, false)
    })
})()

$(document).ready(function () {
    $('#cat_form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'db_debug/add_cat.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1") {
                    location.href = 'categories.php';
                }
                else {
                    $('#catError').text("Что-то пошло не так");
                    $('#catError').show();
                }
            }
        });
    });
})