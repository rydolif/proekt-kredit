<?php
$select=Заказ;
$name= $_POST['name'];
$date= $_POST['date'];
$inn= $_POST['inn'];
$graj= $_POST['graj'];
$adres= $_POST['adres'];
$adres_f= $_POST['adres_f'];
$npasport= $_POST['npasport'];
$npasport_k= $_POST['npasport_k'];
$npasport_date= $_POST['npasport_date'];
$gpasport= $_POST['gpasport'];
$gpasport_s= $_POST['gpasport_s'];
$profes= $_POST['profes'];
$pay= $_POST['pay'];
$profes_date= $_POST['profes_date'];
$kinders= $_POST['kinders'];
$changename= $_POST['changename'];
$tell= $_POST['tell'];
$email= $_POST['email'];
$text= $_POST['text'];
$emailTo = 'vipdokmsk@yandex.ru';
$body = "
<p><b>ФИО:</b> $name </p>
<p><b>Дата рождения:</b> $date </p>
<p><b>ИНН:</b> $inn </p>
<p><b>Гражданство:</b> $graj </p>
<p><b>Адрес прописки:</b> $adres </p>
<p><b>Адрес проживания:</b> $adres_f </p>
<p><b>Серия и номер паспорта:</b> $npasport </p>
<p><b>Кем и когда выдан паспорт:</b> $npasport_k </p>
<p><b>Дата выдачи паспорта и код подразделения:</b> $npasport_date </p>
<p><b>Образование:</b> $gpasport </p>
<p><b>Специальность по образованию:</b> $gpasport_s </p>
<p><b>Желаемая профессия:</b> $profes </p>
<p><b>Желаемая заработная плата:</b> $pay </p>
<p><b>Желаемая дата трудоустройства:</b> $profes_date </p>
<p><b>Есть ли несовершеннолетние дети:</b> $kinders </p>
<p><b>Если вы меняли фамилию, укажите дату ее изменения:</b> $changename </p>
<p><b>Телефон:</b> $tell </p>
<p><b>E-mail:</b> $email </p>
<p><b>Комментарий:</b> $text </p>";


if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/

{
$headers = "Content-Type: text/html; charset=utf-8\r\n".'From: zakaz-proekt-kredit@proekt-kredit.ru <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $emailTo;
if (mail($emailTo, $select, $body, $headers)) {
	header('Refresh: 5; URL=http://proekt-kredit.ru/');
	echo '
	<div style="background-color: #eeeeee; border: 1px solid #eeeeee; border-radius: 4px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset; 
	min-height: 20px; padding: 19px; margin: 50px auto; width: 570px; color: #272f3a; font-size: 18px; text-transform: uppercase; font-family: GothamPro,sans-serif; text-align: center;">
	<p style="font-weight: bold;">Спасибо!<br />Заказ отправлен!</p>
	<p style="text-transform: none;">Через 5 секунд вы вернетесь на страницу proekt-kredit.ru</p>
	</div>
	';}
else {
	header('Refresh: 5; URL=http://proekt-kredit.ru/');
	echo 'Письмо не отправлено, через 5 секунд вы вернетесь на страницу proekt-kredit.ru';}
}
exit; /* Выход без сообщения, если поле bezspama чем-то заполнено */

?>