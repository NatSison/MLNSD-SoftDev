<?php

class  Reports extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        $title = $this->reportModel->getTitle();
        $data=[
            "title" => "hi"
        ];
        $this->view("test/index", $data);
    }

}