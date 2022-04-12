<?php
namespace library\Mail;

class Mail {
	public $subject = 'По умолчанию';
	public $from = 'admin@tim-btr.school-php.com';
	public $to = 'kido_koiin@mail.ru';
	public $text = 'Шаблонное письмо';
	public $headers = '';
	
	//в эту ф-ю вставляем полностью англоязычный текст
	public function testMail() {
		if(mail($this->to, 'English Text', 'English Text')) {
			echo 'Письмо отправлено';
		} else {
			echo 'Письмо не отправлено';
		}
		exit();
	}
	
	//первые две строки исправляют проблему с кодировкой русскоязычного текста.
	//третья строка(From) - это тоже частая проблема, когда не совпадают домены(?)
	//последняя строка говорит о том что это типовое рассылочное письмо и его не стоит расценивать как спам. 
	public function send() {

		$this->subject = '=?utf-8?b?'. base64_encode($this->subject) .'?=';
		$this->headers = "Content-type: text/html; charset=\"utf-8\"\r\n";

		$this->headers .= "From: ".$this->from."\r\n";
		$this->headers .= "MIME-Version: 1.0\r\n";
		$this->headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";

		$this->headers .= "Precedence: bulk\r\n";
		
		return mail($this->to, $this->subject, $this->text, $this->headers);
	}
}