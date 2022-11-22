<?php
namespace App\Controllers;
use App\Models\Visitor;

class Home extends BaseController
{

    public function __construct()
    {
        $this->visitor = new Visitor();
    }

    public function index()
    {
        return view('scanner');
        
    }
    

    public function saveUser(){
        try {
            $this->visitor->insert([
                'email' => $this->request->getPost('text'),
            ]);

            return redirect()->route('/');
            
        } catch (\Exception $e) {
            session()->setFlashdata('error', $e->getMessage());
        }
    }
}
