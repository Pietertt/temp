<?php
      include_once('database.php');

      use PHPUnit\Framework\TestCase;

      class database_test extends TestCase {
            private $database;

            protected function setUp() : void {
                  $this->database = new Database();
            }
           
            public function test_update(){

                  //$this->assertTrue($this->database->update("UPDATE User SET username = ? WHERE username = ?", array("Tijgertje", "Pietertje")), true);
            }

            protected function tearDown() : void {
                  $this->validation = NULL;
            }
      }
?>