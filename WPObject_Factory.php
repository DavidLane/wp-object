<?php

	/*
	* WPObjectFactory Class
	* A class that wraps around WP_Query to return instances of objects
	*/

	class WPObjectFactory {
		private $_post_type; // This stores which post type we want to query against
		
		public function __construct($post_type) {
			$this->_post_type = $post_type;
		}

		private function getClassName() {
			$func = create_function('$c', 'return strtoupper($c[1]);'); //camelCase the name of the Class
			return preg_replace_callback('/_([a-z])/', $func, $this->_post_type);
		}

		private function getNewClassInstance($post) {
			return new $this->getClassName($post);
		}

		public function findAll() {
			$return_array = false;
			$query = WP_Query(array("post_type" => $this->_post_type));
			
			if($query->posts) {
				foreach($query->posts as $post) {
					$return_array[] = $this->getNewClassInstance($post);
				}
			}

			return $return_array;
		}

		public function findOneBy($args = array()) {
			if(!empty($args)) {
			}

			return false;
		}

		public function findBy($args = array()) {
			if(!empty($args)) {
			}
			
			return false;			
		}

		public function findByID($id) {
			return $this->findOneBy(array("id" => $id));
		}
	}
?>
