<p align="center">
<img src="https://i.imgur.com/DhbBXnb.png" width="150" height="150" align="center">
</p>

# Mantis Reporter
[![License: GPL v3](https://img.shields.io/badge/License-GPLv3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/intervisionlord/mantis-reporter)](https://github.com/intervisionlord/mantis-reporter/releases/latest)
[![Build Status](https://travis-ci.org/intervisionlord/mantis-reporter.svg?branch=master)](https://travis-ci.org/intervisionlord/mantis-reporter)
![W3C Validation](https://img.shields.io/w3c-validation/default?targetUrl=https%3A%2F%2Fother.su%2FmantisReporter)

Инструмент, позволяющий пользователям анонимно отправлять баг-репорты в систему баг-трекинга Mantis.
Использует Soap API.

### **[Загрузить последнюю версию](https://github.com/intervisionlord/mantis-reporter/releases/latest)**

## Ключевые особенности
 * Простой интерфейс с минимумом полей, понятный конечному пользователю.
 * Не требует подключения к БД (запросы обратываются через API).
 * Возможно использование Google ReCaptcha для защиты от спама.
 * Автоматическое определение локали сервера и выбор пакета локализации (при его наличии).
 * Настраиваемые ссылки в заголовке

### Скриншоты
#### Общий вид
![MainPage](https://i.imgur.com/zKTrss6.png)

#### Основная форма
![MainForm](https://i.imgur.com/iqtqC5p.png)

#### Информация о скрипте
![AboutPage](https://i.imgur.com/lnEHwZR.png)

## Системные требования
 * PHP 5.6+ (предпочтительно 7.3)
   * Параметры php
     * allow_url_fopen = On
   * Расширения php
     * intl (с корректно настроенной локалью)
     * SOAP

## Установка
 * Разместите файлы в директории веб-сервера.
 * Укажите логин и пароль от учетной записи Mantis в файле `conf/conf.php`.
 * Заполните прочие параметры в переменных, находящихся в файле настроек `conf/conf.php`. (Подробнее см. в разделе "Настройка скрипта").

_Для работы скрипта требуется учетная запись от Mantis с уровнем доступа "**автор**" и выше. Рекомендуется создать отдельную учетную запись для скрипта._

## Настройка
#### Настройка Mantis
 * Создайте отдельного пользователя с уровнем доступа не ниже "**автор**".
 * Добавьте созданного пользователя к тем проектам, по которым должен осуществляться сбор заявок через форму "Mantis Reporter".

#### Настройки скрипта
**Описание переменных в файле настроек `conf/conf.php`**
 * **MAIN_TITLE** - _(по-умолчанию: "Mantis Reporter")_ - Заголовок страницы (название сайта)
 * **FORCE_LOCALE** - _(Значения: "0" или "1". По-умолчанию: "0")_ - Принудительное определение локали (подробнее см. в разделе "Локализация")
 * **USERNAME** - Логин пользователя, от которого будут создаваться задачи
 * **PASSWORD** - Пароль пользователя
 * **USERID** - ID пользователя от которого будут создаваться задачи
 * **MANTISURL** - URL mantis для подстановки в ссылку для перехода
 * **WSDL_POINT** - URL до API mantis (https://%MANTIS_URL%/api/soap/mantisconnect.php?wsdl)
 * **PROJECT_ID** - ID проекта из которого будет взят список типов задач. (Временное решение)
 * **USECAPTCHA** - _(Значения: "0" или "1". По-умолчанию: "0")_ - Включить/отключить использование Google ReCaptcha.
 * **CAPTCHA_SITEKEY** - Ключ сайта Google ReCaptcha.
 * **CAPTCHA_SECRET** - Secret Key Google ReCaptcha.

#### Настройка персональных ссылок
Скрипт поддерживает настройку персональных ссылок с выводом в заголовке. Для того, чтобы задать собственные ссылки, необходимо отредактировать файл `conf/custom_links.php`.

Ссылки добавляются в массив построчно с увеличением порядкового номера элемента.
Примеры персональных ссылок находятся непосредственно в файле **custom_links.php**.

## Локализация
Скрипт пытается определить локаль, заданную в php_intl, а затем, найти соответствующий файл локализации в директории **l10n**

Локаль можно выставить принудительно в файле `conf/conf.php` в переменной **$FORCE_LOCALE**.
Значение по-умолчанию - `$FORCE_LOCALE="0"`. Это означает, что скрипт будет пытаться определить локаль.
В случае, если определенная локаль не соответствует имеющимся локалям, будет выставлена локаль по-умолчанию *(на данный момент ru_RU)*
