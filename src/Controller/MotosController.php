<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Motos Controller
 *
 * @property \App\Model\Table\MotosTable $Motos
 */
class MotosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        
        if(isset($_GET['s'])){
            switch ($_GET['s']) {
                case 'vendidas':
                    $queryMotos = $this->Motos->find()
                            ->contain(['Negocios', 'Modelos'])
                            ->innerJoinWith('Negocios', function ($q) {
                                return $q->where(['Negocios.tipo' => 'venda']);
                                });
                    $this->set('motos', $this->paginate($queryMotos));
                    break;
                case 'todas':
                    $this->paginate = [
                        'contain' => ['Modelos', 'Negocios']
                        ];
                        $queryMotos = $this->Motos->find()
                            ->contain(['Negocios', 'Modelos']);
                    $motosVendidas = [];
                    foreach ($queryMotos->toArray() as $mot) {
                        foreach ($mot['negocios'] as $neg) {
                            if ($neg['tipo'] == 'venda') {
                               array_push($motosVendidas, $mot['id']);
                            }
                        }
                    }
                    $this->set('motos', $this->paginate($this->Motos));
                    $this->set('motosVendidas', $motosVendidas);
                    break;
                default:  
                    break;
            }
        }else{
            $queryMotos = $this->Motos->find()
                        ->contain(['Negocios', 'Modelos'])
                        ->notMatching('Negocios', function ($q) {
                                return $q->where(['tipo' => 'venda']);
                                });
                        $motosVendidas = [];
            $this->set('motos', $this->paginate($queryMotos));
            $this->set('motosVendidas', $motosVendidas);
        }       
        $this->set('_serialize', ['motos']);
    }

    /**
     * View method
     *
     * @param string|null $id Moto id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $moto = $this->Motos->get($id, [
            'contain' => ['Modelos', 'Negocios', 'Negocios.Clientes']
        ]);
        $this->set('moto', $moto);
        $this->set('_serialize', ['moto']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $moto = $this->Motos->newEntity();
        if ($this->request->is('post')) {
            $moto = $this->Motos->patchEntity($moto, $this->request->data['Moto']);
            $moto->placa = strtoupper($moto->placa);
            $result = $this->Motos->save($moto);
            if ($result) {
                $this->request->data['Negocio']['moto_id'] = $result->id;
                $this->request->data['Negocio']['tipo'] = 'compra';
                $negocio = $this->Motos->Negocios->newEntity();
                $negocio = $this->Motos->Negocios->patchEntity($negocio, $this->request->data['Negocio']);
                $result = $this->Motos->Negocios->save($negocio);
                    $this->Flash->success(__('A moto foi adicionada ao estoque.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The moto could not be saved. Please, try again.'));
            }
        }
        $clientes = $this->Motos->Negocios->Clientes->find('list', ['limit' => 200]);
        $modelos = $this->Motos->Modelos->find('list', ['limit' => 200]);
        $this->set(compact('moto', 'modelos', 'clientes'));
        $this->set('_serialize', ['moto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Moto id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $moto = $this->Motos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $moto = $this->Motos->patchEntity($moto, $this->request->data);
            $moto->placa = strtoupper($moto->placa);
            if ($this->Motos->save($moto)) {
                $this->Flash->success(__('The moto has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The moto could not be saved. Please, try again.'));
            }
        }
        $modelos = $this->Motos->Modelos->find('list', ['limit' => 200]);
        $this->set(compact('moto', 'modelos'));
        $this->set('_serialize', ['moto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Moto id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $moto = $this->Motos->get($id);
        if ($this->Motos->delete($moto)) {
            $this->Flash->success(__('The moto has been deleted.'));
        } else {
            $this->Flash->error(__('The moto could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function relatorio(){
        $this->viewBuilder()->layout('relatorio');
        if(isset($_GET['s'])){
            switch ($_GET['s']) {
                case 'vendidas':
                    $queryMotos = $this->Motos->find()
                            ->contain(['Negocios', 'Modelos'])
                            ->innerJoinWith('Negocios', function ($q) {
                                return $q->where(['Negocios.tipo' => 'venda']);
                                });
                    $this->set('motos', $this->paginate($queryMotos));
                    break;
                case 'todas':
                    $this->paginate = [
                        'contain' => ['Modelos', 'Negocios']
                        ];
                        $queryMotos = $this->Motos->find()
                            ->contain(['Negocios', 'Modelos']);
                    $motosVendidas = [];
                    foreach ($queryMotos->toArray() as $mot) {
                        foreach ($mot['negocios'] as $neg) {
                            if ($neg['tipo'] == 'venda') {
                               array_push($motosVendidas, $mot['id']);
                            }
                        }
                    }
                    $this->set('motos', $this->paginate($this->Motos));
                    $this->set('motosVendidas', $motosVendidas);
                    break;
                default:  
                    break;
            }
        }else{
            $queryMotos = $this->Motos->find()
                        ->contain(['Negocios', 'Modelos'])
                        ->notMatching('Negocios', function ($q) {
                                return $q->where(['tipo' => 'venda']);
                                });
                        $motosVendidas = [];
            $this->set('motos', $queryMotos->all());
            $this->set('motosVendidas', $motosVendidas);
        }
    }
}
