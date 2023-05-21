<?php
//** function to view data */
function dd($vlaue)
{
    echo "<pre>";
    // r($vlaue);
    var_dump($vlaue);
    echo "</pre>";
    die();
};


class Furniture
{
    private  $width;
    private  $length;
    private  $height;
    private bool $is_for_seating;
    private bool $is_for_sleeping;

    public function __construct(int $length, int $width, int $height)
    {
        $this->width
            = $width;
        $this->length
            = $length;
        $this->height
            = $height;
    }
    public function getIs_for_seating()
    {
        return $this->is_for_seating;
    }


    public function getIs_for_sleeping()
    {
        return $this->is_for_sleeping;
    }


    public function setIs_for_seating(bool $value)
    {
        $this->is_for_seating = $value;
    }


    public function setIs_for_sleeping(bool $value)
    {
        $this->is_for_sleeping = $value;
    }



    /*  public function getWidth(): int
    {
        return $this->width;
    }
    public function getLength(): int
    {
        return $this->length;
    }
    public function getHeight(): int
    {
        return $this->height;
    }





    public function setWidth($value)
    {
        $this->width = $value;
    }
    public function setLength($value)
    {
        $this->length = $value;;
    }
    public function setHeight($value)
    {
        $this->height = $value;
    } */


    public function area()
    {
        return  $this->width * $this->length;
    }
    public function volume()
    {
        return $this->area() * $this->length;
    }
}


$table = new Furniture(1000, 577, 300);


$table->setIs_for_seating(true);
$table->getIs_for_seating();
$table->setIs_for_sleeping(false);
$table->getIs_for_sleeping();
// echo $table->area();

// dd($table);



echo "<hr/>";


interface Printable
{
    public function print();
    public function sneakpeak();
    public function fullinfo();
};




class Sofa extends Furniture implements Printable
{
    public function __construct($height, $width, $length)

    {
        parent::__construct($height, $width, $length);

        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    // private $height;
    // private $length;
    // private $width;
    public $seats;
    public $armrests;
    public $length_opened;
    // public function __construct($height, $width, $length)

    // {
    //     $this->height = $height;
    //     $this->width = $width;
    //     $this->length = $length;
    // }





    public function print()
    {
        $this->sneakpeak();
        if ($this->getIs_for_sleeping() === true) {
            echo "sleeping only ,";
        } else {
            echo "sitting also ,";
        }
        echo ' Area: ' . $this->area();
        echo "<br/>";
    }
    public function sneakpeak()
    {
        echo get_class($this) . ', ';
    }
    public function fullinfo()
    {

        echo $this->sneakpeak() . 'Width: ' . $this->width  . 'cm Height: ' . $this->height . 'cm Length: ' . $this->length;
        echo "<hr/>";
    }




    public function getSeats(): string


    {
        return $this->seats;
    }

    public function getArmrests(): string
    {
        return $this->armrests;
    }

    public function getLength_opened(): int
    {
        return $this->length_opened;
    }


    public function setSeats($arg)
    {
        $this->seats = $arg;;
    }

    public function setArmrests($arg)
    {
        $this->armrests = $arg;;
    }

    public function setLength_opened($arg)
    {
        $this->length_opened = $arg;
    }
    public function area_opened()
    {
        if ($this->getIs_for_sleeping() === true) {

            return $this->width * $this->length_opened;
        } else {
            return "This sofa is for sitting only, it has X armrests and X seats'";
        }
    }
};




$SofaAvans = new Sofa(300, 300, 800);

$SofaAvans->setIs_for_sleeping(false);
$SofaAvans->setIs_for_seating(true);
$SofaAvans->setLength_opened(139);
$SofaAvans->setArmrests(3);
$SofaAvans->setSeats(31);

$SofaAvans->area();
$SofaAvans->volume();
$SofaAvans->area_opened();


$SofaAvans->setIs_for_sleeping(true);
$SofaAvans->area_opened();
$SofaAvans->print();
$SofaAvans->fullinfo();


// var_dump($SofaAvans);
// dd($SofaAvans);




class Bench extends Sofa implements Printable
{
    // public function __construct($height, $width, $length)

    // {
    //     $this->height = $height;
    //     $this->width = $width;
    //     $this->length = $length;
    // }

}

$bench1 = new Bench(200, 350, 150);

$bench1->setLength_opened(139);
$bench1->setArmrests(3);
$bench1->setSeats(31);
$bench1->setIs_for_sleeping(false);
$bench1->print();
$bench1->fullinfo();

// dd($bench1);


class Chair extends Furniture implements Printable
{
    public function __construct($height, $width, $length)

    {
        parent::__construct($height, $width, $length);

        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    public function print()
    {
        $this->sneakpeak();
        if ($this->getIs_for_sleeping() === true) {
            echo "sleeping only ,";
        } else {
            echo "sitting also ,";
        }
        echo ' Area: ' . $this->area();
        echo "<br/>";
    }
    public function sneakpeak()
    {
        echo get_class($this) . ', ';
    }
    public function fullinfo()
    {

        echo $this->sneakpeak() . 'Width: ' . $this->width  . 'cm Height: ' . $this->height . 'cm Length: ' . $this->length;
        echo "<hr/>";
    }
}


$chair1 = new Chair(300, 150, 50);

$chair1->setIs_for_sleeping(false);
$chair1->print();
$chair1->fullinfo();
// echo $chair1->volume();
// 
// dd($chair1);
