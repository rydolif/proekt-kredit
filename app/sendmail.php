<?php
	$SITE_TITLE = 'Proekt-Kredit';
	$SITE_DESCR = '';

	if ( isset($_POST) ) {
		$name = htmlspecialchars(trim($_POST['name']));
		$phone = htmlspecialchars(trim($_POST['phone']));
		$email = htmlspecialchars(trim($_POST['email']));
		$date = htmlspecialchars(trim($_POST['date']));
		$inn = htmlspecialchars(trim($_POST['inn']));
		$citizenship = htmlspecialchars(trim($_POST['citizenship']));
		$addres = htmlspecialchars(trim($_POST['addres']));
		$addresfact = htmlspecialchars(trim($_POST['addresfact']));
		$passport = htmlspecialchars(trim($_POST['passport']));
		$education = htmlspecialchars(trim($_POST['education']));
		$specialty = htmlspecialchars(trim($_POST['specialty']));
		$desired = htmlspecialchars(trim($_POST['desired']));
		$salary = htmlspecialchars(trim($_POST['salary']));
		$employment = htmlspecialchars(trim($_POST['employment']));
		$children = htmlspecialchars(trim($_POST['children']));
		$changedthename = htmlspecialchars(trim($_POST['changedthename']));

		$comment = isset($_POST['comment']) ? htmlspecialchars(trim($_POST['comment'])) : '';
		$to = 'realgelik@gmail.com';

		$headers = "From: $SITE_TITLE \r\n";
		$headers .= "Reply-To: ". $email . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";

		$data = '<h1>'.$subject."</h1>";
		$data .= 'Имя: '.$name."<br>";
		$data .= 'Телефон: '.$phone."<br>";
		$data .= 'Почта: '.$email."<br>";


		if ( $date != '' ) {
			$data .= 'Дата рождения: ' . $date ."<br>";
		}

		if ( $inn != '' ) {
			$data .= 'ИНН: ' . $inn ."<br>";
		}

		if ( $citizenship != '' ) {
			$data .= 'Гражданство: ' . $citizenship ."<br>";
		}

		if ( $addres != '' ) {
			$data .= 'Адрес прописки по паспорту, индекс: ' . $addres ."<br>";
		}

		if ( $addresfact != '' ) {
			$data .= 'Адрес фактического проживания, индекс: ' . $addresfact ."<br>";
		}

		if ( $passport != '' ) {
			$data .= 'Серия и номер паспорта: ' . $passport ."<br>";
		}
		
		if ( $education != '' ) {
			$data .= 'Образование: ' . $education ."<br>";
		}
		
		if ( $specialty != '' ) {
			$data .= 'Специальность по образованию: ' . $specialty ."<br>";
		}

		if ( $desired != '' ) {
			$data .= 'Желаемая профессия: ' . $desired ."<br>";
		}
		
		if ( $salary != '' ) {
			$data .= 'Желаемая заработная плата: ' . $salary ."<br>";
		}
		
		if ( $employment != '' ) {
			$data .= 'Желаемая дата трудоустройства: ' . $employment ."<br>";
		}

		if ( $children != '' ) {
			$data .= 'Есть ли несовершеннолетние дети: ' . $children ."<br>";
		}

		if ( $changedthename != '' ) {
			$data .= 'Если вы меняли фамилию, укажите дату ее изменения: ' . $changedthename ."<br>";
		}

		$message = "<div style='background:#ccc;border-radius:10px;padding:20px;'>
				".$data."
				<br>\n
				<hr>\n
				<br>\n
				<small>это сообщение было отправлено с сайта ".$SITE_TITLE." - ".$SITE_DESCR.", отвечать на него не надо</small>\n</div>";
		$send = mail($to, $subject, $message, $headers);

		if ( $send ) {
			echo '';
		} else {
				echo '<div class="error">Ошибка отправки формы</div>';
		}

	}
	else {
			echo '<div class="error">Ошибка, данные формы не переданы.</div>';
	}
	die();
?>