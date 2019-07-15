<?php 
	function call($controller, $action) {
		//zahtevamo file koje odgovara imenu controller-a
		require_once('controllers/' . $controller . '_controller.php');

		//kreiramo novu instance potrebnog controller-a
		switch ($controller) {
			case 'pages':
				$controller = new PagesController();
				break;
			case 'students':
				//treba nam model da query-ujemo bazu kasnije u controller-u
				require_once('models/student.php');
				$controller = new StudentsController();
				break;
		}

		//pozivamo action
		$controller->{ $action }();
	}

	//lista controller-a koje imamo i njihove actions
	//razmatramo "dozvoljene" promenljive
	//dodajemo ulaz za novi controller i njegovu akciju
	$controllers = array(
		'pages' => ['home', 'error'],
		'students' => ['index', 'show']
	);

	//proveravamo da li su zahtevani controller i action "dozvoljeni"
	//ako neko proba da pristupi necemu drugom redirektovacemo ga ka error action
	if (array_key_exists($controller, $controllers)) {
		if (in_array($action, $controllers[$controller])) {
			call($controller, $action);
		} else {
			call('pages', 'error');
		}
	} else {
		call('pages', 'error');
	}