<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modelos Controller
 *
 * @property \App\Model\Table\ModelosTable $Modelos
 */
class ModelosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Marcas']
        ];
        $this->set('modelos', $this->paginate($this->Modelos));
        $this->set('_serialize', ['modelos']);
    }

    /**
     * View method
     *
     * @param string|null $id Modelo id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => ['Marcas', 'Motos']
        ]);
        $this->set('modelo', $modelo);
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $modelo = $this->Modelos->newEntity();
        if ($this->request->is('post')) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->data);
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
            }
        }
        $marcas = $this->Modelos->Marcas->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'marcas'));
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Modelo id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $modelo = $this->Modelos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modelo = $this->Modelos->patchEntity($modelo, $this->request->data);
            if ($this->Modelos->save($modelo)) {
                $this->Flash->success(__('The modelo has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The modelo could not be saved. Please, try again.'));
            }
        }
        $marcas = $this->Modelos->Marcas->find('list', ['limit' => 200]);
        $this->set(compact('modelo', 'marcas'));
        $this->set('_serialize', ['modelo']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Modelo id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modelo = $this->Modelos->get($id);
        if ($this->Modelos->delete($modelo)) {
            $this->Flash->success(__('The modelo has been deleted.'));
        } else {
            $this->Flash->error(__('The modelo could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
