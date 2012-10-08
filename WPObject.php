<?php

	/*
	* WPObject Class
	* This simply wraps a WP_Post object and assigns some getter/setter overrides to point to it
	* It allows the developer to add extra functionality to the Post object
	* Maybe this needs to be an abstract/interface class?
	*/

	abstract class WPObject {
		protected $_post; // This is the actual WP Post object
		
		public function __construct($post_object) {
			$this->setPostObject($post_object); // Save the post object
		}

		protected function setPostObject($post) { // Internal setter
			$this->_post = $post;
		}

		protected function getPostObject() { // Internal getter
			return $this->_post;
		}

		public function __get($key) { // Getter override
			return $this->getPostObject()->$key; // Get whatever we've requested from the Post object rather than this object
		}

		public function __set($key, $value) { // Setter override
			return $this->getPostObject()->$key = $value; // Same as above, only setting!
		}

		public function delete() {
		}

	}
