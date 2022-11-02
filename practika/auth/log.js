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
    $('#log_form').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: '../auth/login.php',
            data: $(this).serialize(),
            success: function (response) {
                var jsonData = JSON.parse(response);

                if (jsonData.success == "1") {
                    location.href = '../index.php';
                }
                else if (jsonData.success == "2") {
                    $('#overall1Error').text("Логин или пароль неверный");
                    $('#overall1Error').show();
                }
                else {
                    $('#overall1Error').text("Что-то пошло не так");
                    $('#overall1Error').show();
                }
            }
        });
    });
})