<?php
namespace App\Controllers;
use App\Models\Visitor;
use Config\Services;

class Home extends BaseController
{
    protected $helpers = ['form'];

    public function __construct()
    {
        $this->visitor = new Visitor();
    }

    public function index()
    {
        $data = [
            'email' => [
                'type' => 'hidden',
                'name' => 'email',
                'class' => 'form-control form-control-sm',
                'value' => set_value('email'),
                'placeholder' => 'Correo electrónico',
                'id' => 'email',
            ],
            'validation' => Services::validation(),
        ];
        
        if (strtolower($this->request->getMethod()) !== 'post') {
            return view('templates/header') . view('scanner', $data) . view('templates/footer');
        }

        if (!$this->validate([
            'email' => [
                'label' => $data['email']['placeholder'],
                'rules' => 'required|valid_email|is_unique[visitor.email]',
                'errors' => [
                    'required' => '{field} un campo obligatorio',
                    'valid_email' => 'Debe de escanear un codigo valido',
                    'is_unique' => 'El correo ya ha sido usado'
                ]
            ],
            ])) {
                return
                    view('templates/header') .
                    view('scanner', array_merge($data, [
                        'validation' => $this->validator,
                    ])) .
                    view('templates/footer');
            }

            try {
                $this->visitor->insert([
                    'email' => $this->request->getPost('email')
                ]);

                return redirect()->route('/');
    
            } catch (\Exception $e) {
                session()->setFlashdata('error', $e->getMessage());
                return
                    view('templates/header') .
                    view('scanner', array_merge($data, ['error' => $e->getMessage()])) .
                    view('templates/footer');
            }
        
    }
}
