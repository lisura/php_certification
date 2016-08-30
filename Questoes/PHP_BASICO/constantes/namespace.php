<?php 
 
 // Set namespace (works only with PHP 5.3)
namespace TestProject\Test
{
// Really simple class for testing magic constants
 class TestMagicConstants {
 // Prints class name
 public function printClassName() {
 echo "This is " . __CLASS__ . " class.\n";
 }
 
 // Prints class and method name
 public function printMethodName() {
 echo "This is " . __METHOD__ . " method.\n";
 }
 
 // Prints function name
 public function printFunction() {
 echo "This is function '" . __FUNCTION__ . "' inside class.\n";
 }
 
 // Prints namespace name (works only with PHP 5.3)
 public function printNamespace() {
 echo "Namespace name is '" . __NAMESPACE__ . "'.\n";
 }
 }
}
 
namespace Outro

{
	
		use TestProject\Test as Abc;
 // Create new TestMagicConstants class
 $test_magic_constants = new Abc\TestMagicConstants;
 
 // This prints class name and used namespace
$test_magic_constants->printClassName();
 
 // This prints method name and used namespace
$test_magic_constants->printMethodName();
 
 // This prints function name inside class and used namespace
 // same as method name, but without class
$test_magic_constants->printFunction();
 
 // This prints namespace name (works only with PHP 5.3)
$test_magic_constants->printNamespace();
}
