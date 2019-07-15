<?php 
	class StudentsController {
		public function index() {
			$students = Student::all();
			require_once('views/students/index.php');
		}

		public function show() {
			//ocekujemo url koji ima formu >controller=posts&action=show&id=x
			//bez id-a redirektujemo na error stranu zato sto nam student_id treba da bi ga pronasli u bazi
			if (!isset($_GET['student_id'])) {
				return call('pages','error');
			}
			//koristimo student_id da prikazemo pravog studenta
			$student = Student::find($_GET['student_id']);

			require_once('views/students/show.php');
		}
	}