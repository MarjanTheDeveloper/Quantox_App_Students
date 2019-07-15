<?php 
	class StudentsController {
		public function index() {
			$students = Student::all();
			require_once('views/students/index.php');
		}

		public function show() {
			
			$student = self::getStudent();

			$average = self::averageGrades($student->mathematics,$student->english,$student->programing,$student->art);
			

			switch ($student->school_board) {
				case 'CSM':
					$pass = self::csm($average);

					$format_desc = 'JSON Format';

					$format = '<textarea style="border:none; width:100%; height:50px;">'.json_encode($student).'</textarea>';
					break;
				
				case 'CSMB':
					$pass = self::csmb($student->mathematics,$student->english,$student->programing,$student->art);

					$format_desc = 'XML Format';

					$format = '<textarea style="border:none; width:100%; height:500px;">
								<?xml version="1.0" encoding="utf-8"?>
								<students>
								    <student>
										<student_id>'.$student->student_id.'</student_id>
										<student_name>'.$student->student_name.'</student_name>
										<mathematics>'.$student->mathematics.'</mathematics>
										<english>'.$student->english.'</english>
										<programing>'.$student->programing.'</programing>
										<art>'.$student->art.'</art>
									</student>
								</students>
								</textarea>';
					break;
			}

			require_once('views/students/show.php');
		}


		public static function getStudent() {
				//ocekujemo url koji ima formu >controller=posts&action=show&id=x
				//bez id-a redirektujemo na error stranu zato sto nam student_id treba da bi ga pronasli u bazi
				if (!isset($_GET['student_id'])) {
					return call('pages','error');
				}
				//koristimo student_id da prikazemo pravog studenta
				return $student = Student::find($_GET['student_id']); 
		}

		public static function averageGrades($mathematics,$english,$programing,$art) {
			
			$sum = $mathematics + $english + $programing + $art;
			$count = 4;

			$average = $sum/$count;

			return $average;
		}

		public static function csm($average) {
			if ($average >= 7) {
				$pass = 'Pass.';
				return $pass;
			} else {
				$pass = 'Failed.';
				return $pass;
			}
		}

		public static function csmb($mathematics,$english,$programing,$art) {

			$subjects = [
							$mathematics,
							$english,
							$programing,
							$art 
						];

			$max_grade = $subjects[0];
			$counter = 0;

			foreach ($subjects as $subject) {
				if (!is_null($subject)) {
					$counter++;
					
					if ($subject > $max_grade) {
						$max_grade = $subject;
					}
				}
			}

			if ($counter >= 2) {
				if ($max_grade > 8) {
					$pass = 'Pass.';
				} else {
					$pass = 'Failed.';
				}
			} else {
				$pass = 'Failed.';
			}

			return $pass;
		}
		

	}