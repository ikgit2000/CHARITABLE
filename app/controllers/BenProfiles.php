<?php
class BenProfiles extends Contoller
{
    public function __construct()
    {
        $this->benProfileModel = $this->model('BenProfile');
    }
    public function index()
    {

        $this->view('benProfiles/index');
    }
}