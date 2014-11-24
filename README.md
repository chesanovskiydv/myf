myf
===
Структура основных папок фреймворка:
```
myf/
├──  application/		- рабочая папка
│   ├── config/			- конфиги
│   ├── controllers/		- контроллеры
│   ├── localize/		- локализация
│   ├── models/			- модели
│   ├── views/			- виевсы
│   └── parse/			- компонент для парсинга
├── core/			- ядро фреймворка
│   ├── auth/			- класс для аутентификации
│   ├── cache/			- классы для работы с кэшем
│   ├── config/			- класс для обработки конфигов
│   ├── db/			- классы для работы с БД
│   ├── localization/	- класс для локализации
│   ├──  validate/		- классы для валидации данных и регистрации ошибок
│   └── widgets/		- виджеты
└── sql/ 			- sql запросы таблиц необходимых для авторизации и кэширование через БД.
```

1. Работа с фреймворком
--------------------
1. В файле конфигураций (application/config/main.php) необходимо указать все необходимые настройки (подключение к БД, локаль и т.д)
2. Фреймворк организован на основании MVC модели, для создании страницы необходимо создать:

* В папке application/controllers контроллер, который должен именоватся как controllers_ИмяКонтроллера и наследоватся от класса Controller.
* В папке application/models модель, которой необходимо присвоить в качестве названия ИмяКонтроллера, к которому она относится и наследовать ее от класса Model.
* В папке application/views представление.
2. Контроллер
--------------------
Содержит массивы:
* access - массив вида "действие" => "Список тех ролей, кому разрешен доступ\\*(всем)"
* denied - массив вида "действие" => "Список тех ролей, кому запрощен доступ".

Действия необходимо называть actionИмяДействия (если в запросе действие указано не будет то выполнится actionIndex).
Для отображения страницы используется метод generate($content_view, $template_view, $data = null),класса View, где:
* $content_file — виды отображающие контент страниц;
* $template_file — общий для всех страниц шаблон;
* $data — массив, содержащий элементы контента страницы.

Для редиректа используется статический метод redirect($controllerAction) класса Route, который принимает строку вида "контроллер\действие".
3. Модель
--------------------
Содержит массивы:
* data - массив для данных.

Методы: 
* setData($array,$push=false) 
* getData(), 
* validationRules() - описывает правила валидации
* validate()	- проводит валидацию данных из data на основании правил из validationRules().
4. View
--------------------
Содержит массивы:
* info - массив содержащий данные о текущем controller и action.

Методы:
* jsScripts($packageName=null) 
* cssScripts($packageName=null), $packageName - имя "пакета" файлов, которое записано в конфигах.

Класс View унаследован от класса Widget(который предоставляет интерфейс для всех виджетов), что позволяет создавать виджеты в файле отображения вызовом $this->названиеВиджета(Параметры/Данные)
5. Валидация
--------------------
Для валидации используется класс Validate, который содержит статические методы.
Если валидация происходит на основании правил, записанных в validationRules()(тоесть с помощью метода validate()), то для тех методов, которым необходимо больше 1 параметра, правило записывается в виде "НазваниеМетода[<|>|=]Параметр".
Если после валидации через метод validate() возникает ошибка, то она регестрируется с помощью класса ErrorRegistry, и ее можно вывести с помощью виджета для отображения ошибок (ErrorLabelWidget).
6. Локализация
--------------------
Для локализации используется класс Localize, в котором существуют 4 статических метода. setLocal($loc) и getLocal() предназначены для установки и получения текущей локали.
t($var) и echoT($var=null) для получения текста для текущей локали. t($var) - просто возвращает перевод, а echoT($var) - сразу отображает.

Локализация происходит по принципу: в папке application/localize необходимо создать папку с названием локали, в ней создается файл с именем translate.json.
В этом файле в json формате вида "переменная" : "перевод" указывается перевод. Далее при вызове методов t или echoT аргументом передается переменная, и на основании текущей локали
возвращается перевод.
7. Кэширование
--------------------
Имеется 2 способа кэширования: БД и memcache. Для кэширования через БД необходимо наличие таблицы (команда для создания находится в папке sql).

Все системы кэширования реализовуют интерфейс iCache, в котором описаны 2 метода getCache($var) и setCache($var_name, $var_value, $liveTime=null). 
Для использования определенной системы кэширования ее необходимо зарегестрировать (регистрация происходит на основе конфига, массива "registry").
8. Аутентификация
--------------------
Для аутентификации необходимо наличие таблицы в БД (команда для создания находится в папке sql). 

С аутентификацией работает класс Auth, в котором содержатся методы для:
* регистрации - registration($login, $password, $password_confirm, $role='user')
* аутентификации - authentication($login, $password)
* проверки залогинен ли пользователь 
* логаута


