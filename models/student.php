<?php 
	class Student {
		public $student_id;
		public $student_name;
		public $student_lastname;
		public $school_board;
		public $mathematics;
		public $english;
		public $programing;
		public $art;

		public function __construct( $student_id, $student_name, $student_lastname, $school_board, $mathematics, $english, $programing, $art) {
			$this->student_id       = $student_id;
			$this->student_name     = $student_name;
			$this->student_lastname = $student_lastname;
			$this->school_board     = $school_board;
			$this->mathematics      = $mathematics;
			$this->english          = $english;
			$this->programing       = $programing;
			$this->art              = $art;
		}

		public static function all() {
			$list = [];
			$db = Db::getInstance();
			$req = $db->query( 'SELECT b.student_id, 
									   b.student_name, 
								       b.student_lastname,
								       a.school_board,
								       a.mathematics,
								       a.english,
								       a.programing,
								       a.art
								FROM grades a 
								JOIN students b
								ON a.student_id = b.student_id');

			foreach ($req->fetchAll() as $student) {
				$list[] = new Student(
										$student['student_id'], 
										$student['student_name'], 
										$student['student_lastname'],
										$student['school_board'],
										$student['mathematics'],
										$student['english'],
										$student['programing'],
										$student['art']
									 );
			}

			return $list;
		}

		public static function find($student_id) {
			$db = Db::getInstance();
			//pobrinemo se da je $id integer
			$id = intval($student_id);
			$req = $db->prepare('SELECT b.student_id, 
									   b.student_name, 
								       b.student_lastname,
								       a.school_board,
								       a.mathematics,
								       a.english,
								       a.programing,
								       a.art
								FROM grades a 
								JOIN students b
								ON a.student_id = b.student_id
								WHERE b.student_id = :id');
			//query je pripremljen, sada menjamo :id sa pravom $id vrednoscu
			$req->execute(array('id' => $id));
			$student = $req -> fetch();



			return new Student(
								$student['student_id'], 
								$student['student_name'], 
								$student['student_lastname'],
								$student['school_board'],
								$student['mathematics'],
								$student['english'],
								$student['programing'],
								$student['art'] 
							  );
		}
	}