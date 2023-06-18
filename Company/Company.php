<?php

namespace Company;

require_once  './Database/Connection.php';



use \Database\Connection;

class Company
{

    protected $lastID;

    public function __construct(
        protected $coverImg,
        protected $mainPageTitle,
        protected $subtitleOfPage,
        protected $about,
        protected $telNumber,
        protected $Location,
        protected $servicesOrProducts,
        protected $imgUrl1,
        protected $descService1,
        protected $imgUrl2,
        protected $descService2,
        protected $imgUrl3,
        protected $descService3,
        protected $linkedin,
        protected $facebook,
        protected $twitter,
        protected $instagram,
    ) {
    }



    public function create()
    {
        $databaseObject = new Connection();
        $connection = $databaseObject->getConnection();
        $statement = $connection->prepare('insert into temp(coverImg,mainPageTitle,subtitleOfPage,about,telNumber,Location,servicesOrProducts,imgUrl1,descService1,imgUrl2,descService2,imgUrl3,descService3,linkedin,facebook,twitter,instagram) 
        values(:coverImg, :mainPageTitle, :subtitleOfPage, :about, :telNumber, :Location, :servicesOrProducts, :imgUrl1, :descService1, :imgUrl2, :descService2, :imgUrl3, :descService3, :linkedin, :facebook, :twitter, :instagram)');
        $data = [
            'coverImg' => $this->coverImg,
            'mainPageTitle' => $this->mainPageTitle,
            'subtitleOfPage' => $this->subtitleOfPage,
            'about' => $this->about,
            'telNumber' => $this->telNumber,
            'Location' => $this->Location,
            'servicesOrProducts' => $this->servicesOrProducts,
            'imgUrl1' => $this->imgUrl1,
            'descService1' => $this->descService1,
            'imgUrl2' => $this->imgUrl2,
            'descService2' => $this->descService2,
            'imgUrl3' => $this->imgUrl3,
            'descService3' => $this->descService3,
            'linkedin' => $this->linkedin,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'instagram' => $this->instagram,
        ];
        $statement->execute($data);
        $this->lastID = $connection->lastInsertId();
        $databaseObject->destroy();
    }
    public function getLastId()
    {
        return $this->lastID;
    }
    static function getCompany($id)
    {
        $databaseObject =   new Connection();
        $connection = $databaseObject->getConnection();
        $statement = $connection->prepare('select * from temp where id = :id');
        $statement->execute(['id' => $id]);
        $data = $statement->fetch();
        return $data;
    }
}
