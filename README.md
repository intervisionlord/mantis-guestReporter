[![Coverage Status](https://coveralls.io/repos/github/intervisionlord/mantis-guestReporter/badge.svg?branch=master)](https://coveralls.io/github/intervisionlord/mantis-guestReporter?branch=master)

# Mantis Guest Reporter
Инструмент, позволяющий пользователям анонимно отправлять баг-репорты в систему баг-треккинга Mantis.
Использует Soap API Mantis

### Системные требования
 * Расширения php
  * intl (с корректно настроенной локалью)

### Установка
 * Разместите файлы в директории веб-сервера
 * Укажите логин и пароль от учетной записи Mantis в файле `conf/auth.conf.php`

 Для работы скрипта требуется учетная запись от Mantis с уровнем доступа **редактор** и выше.
 Рекомендуется создать отдельную учетную запись для скрипта.

### Локализация
Скрипт пытается оперделить локаль, заданную в php_intl, а затем, найти соответствующий файл локализации в директории **L10n**
