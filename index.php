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


$table = new Furniture(1000, 500, 300);


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
    // private $height;
    // private $length;
    // private $width;
    public $seats;
    public $armrests;
    public $length_opened;
    public function __construct($height, $width, $length)

    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }
    public function print()
    {
    }
    public function fullinfo()
    {

        echo "Sofa" . $this->getIs_for_seating() . $this->width . $this->height;
    }
    public function sneakpeak()
    {
        $productName = get_class($this);
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
$SofaAvans->setLength_opened(139);
$SofaAvans->setArmrests(3);
$SofaAvans->setSeats(31);

$SofaAvans->area();
$SofaAvans->volume();
$SofaAvans->area_opened();

$SofaAvans->setIs_for_sleeping(true);
$SofaAvans->area_opened();


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
    public function print()
    {
    }

    public function sneakpeak()
    {
        $productName = get_class($this);
    }
    public function fullinfo()
    {

        echo get_class($this) . $this->getIs_for_seating() . $this->width . $this->height;
    }
}

class Chair extends Furniture implements Printable
{
    // public function __construct($height, $width, $length)
    // {
    // $this->height = $height;
    // $this->width = $width;
    // $this->length = $length;
    // }
    public function print()
    {
        $this->sneakpeak();
        if ($this->getIs_for_sleeping() === true) {
            echo "sleeping only ,";
        } else {
            echo "sitting also ,";
        }
        echo $this->area();
    }
    public function sneakpeak()
    {
        echo get_class($this);
    }
    public function fullinfo()
    {

        echo get_class($this) . $this->getIs_for_seating() . $this->width . $this->height;
    }
}


$chair1 = new Chair(300, 150, 50);
$bench1 = new Bench(200, 350, 150);

// dd($chair1);
// dd($bench1);
