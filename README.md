# ТЕСТОВОЕ ЗАДАНИЕ на позицию PHP - разработчика

## Разработан простой файловый менеджер.

### Технологии, которые были использованы: фреймворк Laravel 5.4, SQLite, JS фреймворки – JQuery, AJAX, Twitter Bootstrap.

### Дизайн простой, произвольный с использованием Twitter Bootstrap.

### Придерживался всех описанных требований, то что не описано или не однозначно – на мое усмотрение.

**ОПИСАНИЕ ФУНКЦИОНАЛА:** cделана регистрация пользователей.

Поля формы: email * name * info< * password *confirm password * captcha.

На почту отправляется письмо со ссылкой для подтверждения регистрации, подтверждение админа не требуется.

Валидация на стороне сервера должна быть реализована средствами Laravel.

**ФОРМЫ:** login / logout

Гость видит только homepage, наполненный произвольным контентом + пункты меню login/register. Авторизированный пользователь видит еще пункт Manage files.

**СТРАНИЦА MANAGE FILES:**

Здесь имеется кнопка Upload file, при нажатии на которую открывается форма для загрузки файла (реализация произвольная, AJAX по желанию).

**ФОРМА ДЛЯ UPLOAD FILE:**

кнопка для выбора файла;

title (это имя файла с которым этот файл можно будет скачать, если поле не указано – взять оригинальное имя файла. Файлы не должны перезаписываться, каждый файл должен быть сохранен, как уникальный);

description (это поле с произвольным содержимым, можно вставлять HTML теги, поэтому можно использовать произвольный WYSIWYG редактор).

Файлы можно загружать размером до 200 Mb.

Ограничения по типам файлов: doc, docx, xls, xlsx, pdf, jpg, png, rar, zip.

**ТЕПЕРЬ СНОВА СТРАНИЦА MANAGE FILES:** кроме кнопки Upload File она содержит таблицу с pagination (AJAX).
		

Структура таблицы:

| # | Title | Extention | Size | Upload time | Downloaded | Description | Actions |

| 1 | name |text or pic| 12 Mb| 12.04.2013 10:05 | 186 times |This file is very... | Download / Edit / Delete | Все поля кроме Actions – sortable.

**ПОЯСНЕНИЕ К НЕКОТОРЫМ ПОЛЯМ:**

Description – это предположительно страница с большим контентом, поэтому берем небольшое начало текста, а остальное отрезаем, текст делаем в виде ссылки, при наведении выводим pop up окно и в него AJAX-ом загружаем всю страницу description.
		

Download – кнопка скачивания файла. При нажатии на кнопку download увеличивается счетчик скачиваний файла на единицу, что отражается в столбце Downloaded.
		

Пользователь не должен иметь доступа к чужим файлам, только к своим.

Edit – редактирование Title и Description (AJAX по желанию).
		

Delete – удаление.
		
