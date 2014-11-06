<?php
 /**
  * @param int 'numberOfRetries' - количество попыток законектится
  * @param bool 'showContent'	 - показывать спарсеное
  * @param bool 'showError'		 - показывать ошибки
  * @param bool 'showHTTPcode'	 - показывать HTTP код
  */
return array(
	'numberOfRetries' => 1,
	'showContent' => false,
	'showError' => true,
	'showInfo' => true,
	'info' => array(
		CURLINFO_EFFECTIVE_URL =>array(false, ' URL: ', ";\n"),
		CURLINFO_HTTP_CODE => array (false, ' HTTP: ', ";\n"),
		CURLINFO_FILETIME => array (false, ' FILETIME: ', ";\n"),
		CURLINFO_TOTAL_TIME => array (false, ' TOTAL TIME: ', "s;\n"),
		CURLINFO_NAMELOOKUP_TIME => array (false, ' NAMELOOKUP UP: ', "s;\n"),
		CURLINFO_CONNECT_TIME => array (false, ' CONNECT TIME: ', "s;\n"),
		CURLINFO_PRETRANSFER_TIME => array (false, ' PRETRANSFER TIME: ', "s;\n"),
		CURLINFO_STARTTRANSFER_TIME => array (false, ' STARTTRANSFER TIME: ', "s;\n"),
		CURLINFO_REDIRECT_TIME => array (false, ' REDIRECT TIME: ', "s;\n"),
		CURLINFO_SIZE_UPLOAD => array (false, ' SIZE UPLOAD: ', " byte;\n"),
		CURLINFO_SIZE_DOWNLOAD => array (false, ' SIZE DOWNLOAD: ', " byte;\n"),
		CURLINFO_SPEED_DOWNLOAD => array (false, ' SPEED DOWNLOAD: ', ";\n"),
		CURLINFO_SPEED_UPLOAD => array (false, ' SPEED UPLOAD: ', ";\n"),
		CURLINFO_HEADER_SIZE => array (false, ' HEADER SIZE: ', ";\n"),
		CURLINFO_REQUEST_SIZE => array (false, ' REQUEST SIZE: ', ";\n"),
		CURLINFO_SSL_VERIFYRESULT => array (false, ' SSL VERIFYRESULT: ', ";\n"),
		CURLINFO_CONTENT_LENGTH_DOWNLOAD => array (false, ' CONTENT LENGTH DOWNLOAD: ', ";\n"),
		CURLINFO_CONTENT_LENGTH_UPLOAD => array (false, ' CONTENT LENGTH UPLOAD: ', ";\n"),
		CURLINFO_CONTENT_TYPE => array (false, ' CONTENT TYPE: ', ";\n"),
	),
	'returnPageHTTP' => array(200)
);
/*

    CURLINFO_EFFECTIVE_URL - Последний использованный URL
    CURLINFO_HTTP_CODE - Последний полученный код HTTP
    CURLINFO_FILETIME - Дата модификации загруженного документа, если она неизвестна, возвращается -1.
    CURLINFO_TOTAL_TIME - Полное время выполнения операции в секундах.
    CURLINFO_NAMELOOKUP_TIME - Время разрешения имени сервера в секундах.
    CURLINFO_CONNECT_TIME - Время, затраченное на установку соединения, в секундах
    CURLINFO_PRETRANSFER_TIME - Время, прошедшее от начала операции до готовности к фактической передаче данных, в секундах
    CURLINFO_STARTTRANSFER_TIME - Время, прошедшее от начала операции до момента передачи первого байта данных, в секундах
    CURLINFO_REDIRECT_TIME - Общее время, затраченное на перенапрвления, в секундах
    CURLINFO_SIZE_UPLOAD - Количество байт при закачке
    CURLINFO_SIZE_DOWNLOAD - Количество байт при загрузке
    CURLINFO_SPEED_DOWNLOAD - Средняя скорость закачки
    CURLINFO_SPEED_UPLOAD - Средняя скорость загрузки
    CURLINFO_HEADER_SIZE - Суммарный размер всех полученных заголовков
    CURLINFO_REQUEST_SIZE - Суммарный размер всех отправленных запросов, в настоящее время используется только для HTTP запросов
    CURLINFO_SSL_VERIFYRESULT - Результат проверки SSL сертификата, запрошенной с помощью установки параметра CURLOPT_SSL_VERIFYPEER
    CURLINFO_CONTENT_LENGTH_DOWNLOAD - размер загруженного документа, прочитанный из заголовка Content-Length
    CURLINFO_CONTENT_LENGTH_UPLOAD - Размер закачиваемых данных
    CURLINFO_CONTENT_TYPE - Содержимое полученного заголовка Content-type, или NULL в случае, когда этот заголовок не был получен
*/