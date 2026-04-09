# SchoolDB Project

Простой CRUD для управления студентами и расписанием на PHP + PDO

## Структура

- `config.php`  подключение к БД
- `index.php`  список студентов
- `add_student_form.php`  форма добавления
- `add_student.php`  обработчик добавления
- `edit_student_form.php`  форма редактирования
- `update_student.php`  обработчик обновления
- `delete_student.php`  обработчик удаления
- `schedule.php`  расписание с фильтром по группе
- `test_injection.php`  защита от SQL-инъекций

## Установка

1. Импортировать `dump.sql` в MySQL
2. Проверить настройки в `config.php` (хост, логин, пароль)
3. Открыть `index.php`

## База данных

- `groups`  группы
- `teachers`  преподаватели
- `students`  студенты
- `subjects`  предметы
- `enrollments`  связь студент-предмет

## Технологии

- PHP 5.4+(тоесть неважно какая версия)
- PDO (проект как раз-таки демонстрирует работу модуль PDO)
- MySQL (Подходит также для MariaDB)


###Сергей Викторович, тут много денег и кучу классных курсов по пхп

https://rutube.ru/video/c6cc4d620b1d4338901770a44b3e82f4/
