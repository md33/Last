<?php
interface Templates
{
		public function runQuery($sql);
		public function lasdID();
		public function register($uname,$sisi,$email,$upass,$code);
		public function login($email,$upass);
		public function is_logged_in();
		public function redirect($url);
		public function logout();
}
?>