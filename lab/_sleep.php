<?php
//student.class.php
class Student{
    private $full_name = '';
    private $score = 0;
    private $grades = array();
    
    public function __construct($full_name, $score, $grades)
    {
        $this->full_name = $full_name;
        $this->grades = $grades;
        $this->score = $score;
    }
    
    public function show()
    {
        echo $this->full_name;
    }
    
    function __sleep()
    {
        echo 'Going to sleep...';
        return array('full_name', 'grades', 'score');
    }
    
    function __wakeup()
    {
        echo 'Waking up...';
    }
}
?>

<?php
//a.php

$student = new Student('bla bla', 'a', array('a' => 90, 'b' => 100));
$student->show();
echo "<br />\n";
$s = serialize($student);
echo $s ."<br />\n";
$fp = fopen('./session.s', 'w');
fwrite($fp, $s);
fclose($fp);
?>

<?php
//b.php

$s = implode('', file("./session.s"));
echo $s ."<br />\n";
$a = unserialize($s);
$a->show();
?>