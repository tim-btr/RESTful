<?php
/**
 * @param $el
 * @param bool $stop
 * Отладочная функция
 */
function wtf($el, $stop = false) {
	echo '<pre>'.htmlspecialchars(print_r($el, 1)).'</pre>';
	if(!$stop) {
		exit();
	}
}

/*
 * Функции - оболочки для обработки массивов
 * trimAll
 * intAll
 * floatAll
 * hc
 * es
 */
function trimAll($el, $char = ' ') {
	if(!is_array($el)) {
		$el = trim($el, $char);
	} else {
		$el = array_map('trimAll',$el);
	}
	return $el;
}

function intAll($el) {
	if(!is_array($el)) {
		$el = (int)($el);
	} else {
		$el = array_map('intAll',$el);
	}
	return $el;
}

function floatAll($el) {
	if(!is_array($el)) {
		$el = (float)($el);
	} else {
		$el = array_map('floatAll',$el);
	}
	return $el;
}

function hc($el) {
	if(!is_array($el)) {
		$el = htmlspecialchars($el);
	} else {
		$el = array_map('hc',$el);
	}
	return $el;
}

/*
 * Для вставки данных в БД
 */
function es($el,$key = 0) {
	return \DB::_($key)->real_escape_string($el);
}


/*
 * autoload
 */
spl_autoload_register(function($class) {
	$path = str_replace('\\', '/', $class);
	if(file_exists('./'.$path.'.php')) {
		require_once $path.'.php';
	}
});

/*
 * Хэширование (для паролей гл. образом)
 */
function myHash($var, $salt = 'mmorpg', $salt2 = 'wtfiamdhere') {
	return crypt(md5($var.$salt),$salt2);
}


//запрос к базе данных и логирование ошибок.
function q($query, $key = 0) {
	$res = \DB::_($key)->query($query);
	if($res === false) {
		$info = debug_backtrace();
		$date = date("Y-m-d h:m:i");

		$error = "Запрос не был выполнен.\r\n
		ЗАПРОС: ".$query."\r\n".\DB::_($key)->error."\r\n
		Выявлена ошибка в файле: ".$info[0]['file']."\r\n
		Строка: ".$info[0]['line'].', текст запроса: '.$info[0]['args'][0]."\r\n
		Время: ".$date."\r\n
		Ошибка: ".mysqli_error()."\r\n
		=================================";

		file_put_contents('./logs/mysql.log', $error."\r\n \r\n", FILE_APPEND);
		echo '<div style="color:#A5A5A5;">'.nl2br(htmlspecialchars($error)).'</div>';
	}
	return $res;
}

/*
ALIAS:
q(); Запрос
es(); mysqli_real_escape_string

РАБОТА С ОБЪЕКТОМ ВЫБОРКИ
$res = q(); // Запрос с возвратом результата
$res->num_rows; // Количество возвращенных строк - mysqli_num_rows();
$res->fetch_assoc(); // достаём запись - mysqli_fetch_assoc();
$res->close(); // Очищаем результат выборки

РАБОТА С ПОДКЛЮЧЕННОЙ MYSQL
\DB::_()->affected_rows; // Количество изменённых записей
\DB::_()->insert_id; // Последний ID вставки
\DB::_()->real_escape_string(); // аналог es();
\DB::_()->query(); // аналог q
\DB::_()->multi_ query(); // Множественные запросы

\DB::close(); // Закрываем соединение с БД
*/

class DB {
	static public $mysqli  = []; //наши соединения
	static public $connect = []; //идентификаторы

	static public function _($key = 0){
		//если отсутствует дефаултное соединение, то создаем его
		if(!isset(self::$mysqli[$key])){
			//подтягиваем идентификаторы из Core, если специально не прописаны
			if(!isset(self::$connect['dbhost'])){
				self::$connect['dbhost'] = Core::$dbhost;
			}
			if(!isset(self::$connect['dbuser'])){
				self::$connect['dbuser'] = Core::$dbuser;
			}
			if(!isset(self::$connect['dbpass'])){
				self::$connect['dbpass'] = Core::$dbpass;
			}
			if(!isset(self::$connect['db'])){
				self::$connect['db'] = Core::$db;
			}

			//здесь создается соединение
			//эта функция генерирует warning, поэтому нужно поглотить его используя @
			self::$mysqli[$key] = @new mysqli(self::$connect['dbhost'], self::$connect['dbuser'], self::$connect['dbpass'], self::$connect['db']);

			//обрабатываются ошибка соединения
			if(mysqli_connect_errno()){
				echo 'Не удалось подключиться к базе данных';
				exit;
			}

			//обрабатываются ошибка кодировки
			if(!self::$mysqli[$key]->set_charset("utf8")){
				echo 'Ошибка при загрузке символов utf8: '.self::$mysqli[$key]->error;
				exit;
			}
		}
		return 	self::$mysqli[$key];
	}

	static public function close($key = 0) {
		self::$mysqli[$key]->close();
		unset(self::$mysqli[$key]);
	}
}


/*
function isAdmin() {
	if(!empty(User::$role) && User::$role == 'admin') {
		return true;
	}
	return false;
}
 */