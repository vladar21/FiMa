ТЕСТОВОЕ ЗАДАНИЕ

на позицию PHP разработчика

Необходимо разработать простой файловый менеджер.

# Технологии для использования: PHP не ниже 5.3, MySQL5.5, JS фреймворк – JQuery, AJAX, Twitter Bootstrap (или аналог). # (style=undefined)

# Требования по дизайну: дизайн простой, произвольный с использованием Twitter Bootstrap. # (style=undefined)

# Использование php-фреймворков: по желанию. # (style=undefined)

Придеживаться всех описанных требований, то что не описано или не однозначно – на свое усмотрение.

# ОПИСАНИЕ ФУНКЦИОНАЛА: cделать регистрацию пользователей. # (style=undefined)

# Поля формы: email * name * info< * password *confirm password * captcha. # (style=undefined)

Должно отправляться на почту письмо со ссылкой для подтверждения регистрации, подтверждение админа не требуется.

Валидация на стороне сервера должна быть реализована обязательно по AJAX (это так же касается формы login).

# ФОРМЫ: login / logout # (style=undefined)

Гость видит только homepage, наполненный произвольным контентом + пункты меню login/register. Авторизированный пользователь видит еще пункт Manage files.

# СТРАНИЦА MANAGE FILES: # (style=undefined)

Тут имеется кнопка Upload file, при нажатии на которую открывается форма для загрузки файла (реализация произвольная, AJAX по желанию).

# ФОРМА ДЛЯ UPLOAD FILE: # (style=undefined)

кнопка для выбора файла;

title (это имя файла с которым этот файл можно будет скачать, если поле не указано – взять оригинальное имя файла. Файлы не должны перезаписываться, каждый файл должен быть сохранен, как уникальный);

description (это поле с произвольным содержимым, можно вставлять HTML теги, поэтому можно использовать произвольный WYSIWYG редактор).

Файлы можно загружать размером до 200 Mb.

Ограничения по типам файлов: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip.

# ТЕПЕРЬ СНОВА СТРАНИЦА MANAGE FILES: кроме кнопки Upload File она содержит таблицу с pagination (AJAX по желанию). # (style=undefined)

Структура таблицы:

| # | Title | Extention | Size | Upload time | Downloaded | Description | Actions |

| 1 | name |text or pic| 12 Mb| 12.04.2013 10:05 | 186 times |This file is very... | Download / Edit / Delete | Все поля кроме Actions – sortable.

# ПОЯСНЕНИЕ К НЕКОТОРЫМ ПОЛЯМ: # (style=undefined)

# Description – это предположительно страница с большим контентом, поэтому берем небольшое начало текста, а остальное отрезаем, текст делаем в виде ссылки, при наведении выводим pop up окно и в него AJAX-ом загружаем всю страницу description. # (style=undefined)

# Download – кнопка скачивания файла. При нажатии на кнопку download увеличивается счетчик скачиваний файла на единицу, что отражается в столбце Downloaded. # (style=undefined)

Пользователь не должен иметь доступа к чужим файлам, только к своим.

# Edit – редактирование Title и Description (AJAX по желанию). # (style=undefined)

# Delete – удаление. # (style=undefined)
