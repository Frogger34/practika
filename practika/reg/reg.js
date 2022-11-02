/*
    Код вывода
    0 = Не успешно
    1 = Успех
    2 = Введен с запрещенными символами

*/

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

// Вывод ошибок без обновления страницы путем использования AJAX
$(document).ready(function () {
    $('#reg_form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'reg/reg.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1") {
                    location.href = '../index.php';
                }
                else if (jsonData.success == '2') {
                    $('#overallError').text("У вас где-то ошибка в заполненом(ых) поле(ях)");
                    $('#overallError').show();
                }
            }
        });
    });
});

