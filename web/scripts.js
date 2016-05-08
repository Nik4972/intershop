    /* Функция cal()
     * 1. Принимает данные из формы ввода
     * 2. Проверяет валидность количества товара
     * 3. Отправляет данные на сервер через Ajax
     * 4. Получает данные от сервера через Ajax
     * 5. Отправляет полученные данные на главную страницу в поле  c id="results"
     * 6. В случае сбоя при обработке данных сервером, отображает полученные ошибки
    */

    function call() {
          var msg = $('#formx').serialize();
          var kol = $('#kol').val();

     //Проверка валидности количества товара
          if( parseInt(kol) != kol || kol == 0) {
           alert('Неверное количество товара!');
         } else {

            $.ajax({
              type: 'POST',
              url: 'server.php',
              data: msg,
              success: function(data) {
                $('#results').html(data);
              },
              error:  function(xhr, str){
              alert('Ошибка обработки: ' + xhr.responseCode);
              }
            });
           }
         }

    /* Функция del()
     * 1. Принимает из главной страницы id товар для удаления из корзины
     * 2. Отправляет данные на сервер через Ajax
     * 3. Получает данные от сервера через Ajax
     * 4. Обновляет без перезагрузки содержимое корзины
     * 5. В случае сбоя при обработке данных сервером, отображает полученные ошибки
    */

    function del(id) {
                var mesg = id;
            $.ajax({
              type: 'POST',
              url: 'server.php',
              data: 'idd=' + mesg,
              success: function(data) {
                $('#results').html(data);
              },
              error:  function(xhr, str){
    alert('Ошибка обработки: ' + xhr.responseCode);
              }
            });
         }

