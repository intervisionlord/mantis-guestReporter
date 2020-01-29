<?php
/**
* Basic variable localization file
*
* @author Morozov Timofei
* Copyright © 2020 Morozov Timofei
* Copyright © 2020 Intervision
*/

// Основной сайт
define('MAIN_TITLE', 'Mantis Reporter');                                        // Имя ресурса и title-тег
define('MAIN_DESCR', 'Bug-report form');                                        // Описание сайта (для метатега)

// Меню
define('GOTOMANTIS', 'Open Mantis');                                            // Строка для ссылки на мантис в меню
define('ABOUTSTRING', 'About');                                                 // Заголовок "О программе" на странице "about"

// Основная форма запроса
define('FILLTHEFORM', 'Fill the form');                                         // Заголовок формы запроса
define('LANG_SELECT_PROJECT', 'Choose project');                                // Название поля выбора проекта
define('LANG_SELECT_CATEGORY', 'Choose category');                              // Название поля выбора категории
define('LANG_FORM_TITLE', 'Subject');                                           // Название поля темы запроса
define('LANG_FULLTEXT', 'Description');                                         // Название поля ввода основного текста
define('LANG_EMAIL', 'e-mail');                                                 // Название поля ввода email'а
define('LANG_EMAIL_DESCR', 'In case we need to contact you');                   // Описание поля ввода email'а
define('LANG_EMAIL_PLACEHOLDER', 'email@example.com');                          // Заполнитель поля ввода email'а
define('LANG_REQURED', 'Required fields.');                                     // Поясняющий текст к полям, отмеченным звездочкой
define('LANG_SUBMITBTN', 'Send');                                               // Текст кнопки "Отправить"
define('LANG_REQFLD_EMPTY', 'Some fields are not filled');                      // Текст, отображаемый в случае, если не заполнены обязательные поля
define('LANG_REQFLD_DSCR', 'Required fields must be filled');                   // Пояснения к тексту по обязательным полям

//Работа с тасками
define('LANG_ISSUE_CREATED', 'Sent. Task №:');                                  // Строка успешного добавления задачи
define('LANG_ISSUE_DETAILS', 'Task details');                                   // Заголовок "Подробности задачи"
define('LANG_ISSUE_CATEGORY', 'Category');                                      // Строка "Категория" в выводе подробностей задачи
define('LANG_ISSUE_TITLE', 'Subject');                                          // Строка "Заголовок" в выводе подробностей задачи
define('LANG_ISSUE_DESCRIPTION', 'Description');                                // Строка "Описание" в выводе подробностей задачи
define('LANG_REPORTER_EMAIL', 'Contact e-mail');                                // Строка "Обратный адрес" для вставки в задачу, если указан email
define('LANG_REPORTER_EMAIL_NOTDEFINED', 'Not specified');                      // Если email не указан - выводим эту строку в выводе подробностей задачи

// Локализация в таблице "О программе"
define('LANG_VERSION', '0.2');                                                  // Версия файла локализации (назначается автором локализации)
define('LANGSTRING', 'Localization');                                           // Строка "Локализация"
define('LANGVSTR', 'Localization ver.');                                        // Строка "Версия локализации"
define('LANGTYPE', 'Localization type');                                        // Строка настройки локализации
define('LOCALEFORCED', 'Language defined manually');                            // Локаль выставлена принудительно в настройках
define('LOCALENOTFORCED', 'Language detected automatically');                   // Локаль определа автоматически

// Интеграция с Mantis
define('INTEGRATION', 'Integration');                                           // Строка "Интеграция" в таблице "О программе"
define('MANTISVERSION', 'Mantis ver.');                                         // Строка "Версия Mantis" в таблице "О программе"

// Captcha
define('LANG_CAPTCHA_REQUIRED', 'You did not pass the test');                   // Текст при отсутствии галочки в каптче
define('LANG_CAPTCHA_NOTPASSED', 'You did not pass captcha');                   // Текст при непройденной каптче

// Прочее
define('WEONGITHUB', 'GitHub page');                                            // Описание ссылки на страницу на гитхабе (alt)
define('ABTVERSIONPARAM', 'ver.');                                              // Строка "Версия" в таблице "О программе"
