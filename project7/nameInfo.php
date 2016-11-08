<?php
    class nameInfo {
        var $name; 
        var $text;
        
        public function __construct($name, $text) {
            $this->name = $name;
            $this->text = $text;
        }
        
		private function set_name($new_name) { 
			$this->name = $new_name;  
 		}
        
   		public function get_name() {
			return $this->name;
		}
        
        private function set_text($new_text) { 
			$this->text = $new_text;  
 		}
        
   		public function get_text() {
			return $this->text;
		}   
    }
?>