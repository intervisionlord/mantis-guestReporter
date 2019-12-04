# Mantis Guest Reporter
Инструмент, позволяющий пользователям анонимно отправлять баг-репорты в систему баг-треккинга Mantis.
Использует Soap API Mantis

### Системные требования
 * Расширения php
   * intl (с корректно настроенной локалью)
   * SOAP

### Установка
 * Разместите файлы в директории веб-сервера
 * Укажите логин и пароль от учетной записи Mantis в файле `conf/auth.conf.php`

 Для работы скрипта требуется учетная запись от Mantis с уровнем доступа **редактор** и выше.
 Рекомендуется создать отдельную учетную запись для скрипта.

### Локализация
Скрипт пытается оперделить локаль, заданную в php_intl, а затем, найти соответствующий файл локализации в директории **L10n**

Локаль можно выставить принудительно в файле `system.conf.php` в переменной **$FORCE_LOCALE**.
Значение по-умолчанию `$FORCE_LOCALE="0"`. Это означает, что скрипт будет пытаться определить локаль.
В случае, если определенная локаль не соответствует имеющимся локалям, будет выставлена локаль по-умолчанию *(на данный момент ru_RU)*
