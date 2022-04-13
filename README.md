<h2>Общие замечания</h2>
Попытался поставить функционал на MVC каркас, прикрутить веб-версию (с действиями по аяксу), но в спешке не успел, т.к. на момент написания ридми уже подходит срок к сдаче ТЗ на проверку. К сожалению, не успел с тестами.<br>
Также по вышеозначенной причине могут попадаться недоработанные кусочки в коде и вёрстке.


<h2>О задании</h2>
Основной функционал ТЗ - это папка 
```/modules/api``` 

Структура:

+ actions (папка с файлами где обрабатываются действия)
    + user (папка с действиями для пользователей)
+ models
    + User (папка с файлом-моделью для юзера)
    + Access.php (модель для доступов)
+ static
    + main.php (это index файл, куда проваливается запрос, в нём все и происходит)

Вспомогательные файлы - это 
```/library/Db.php```
в нём находится подключение к базе данных. А также 
```/library/Helper.php``` - вспомогательный класс в основном, для обработки строк. 
```/config/config.php``` - здесь находятся файлы конфигурации БД

Также есть 2 файла:
- rest-crud.http - файл, в котором записаны команды для rest-запросов (для VScode rest-client)
- CURL.txt - там команды для курла, они имеют отличный от rest-client синтаксис (не проверял их все, некоторые могут не работать). 

Есть дамб базы в _database, на тот случай, если будете развёртываеть на локалке, хотя 1-го пользователя можно создать также и через веб-интерфейс.

Если нужно будет ответить на вопросы по ТЗ, пишите в телеграм. 




